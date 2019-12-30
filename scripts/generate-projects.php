#!/usr/bin/php
<?php
################################################################################
# Generate projects for each supported version of Laravel
################################################################################

declare(strict_types=1);

#===============================================================================
# Settings
#===============================================================================

$packages = [
    'breadcrumbs',
];

$versions = [
    // Version => Composer version (https://packagist.org/packages/laravel/laravel)
    '7.x' => 'dev-develop',
    // Using tagged versions, not 'dev-master', because that may be unstable
    '6.x' => '6.x',
    '5.8' => '5.8',
    '5.7' => '5.7',
    '5.6' => '5.6',
];

#===============================================================================
# Helpers
#===============================================================================

$blue = "\e[94m";
$reset = "\e[0m";

// https://stackoverflow.com/a/3338133/167815
function rmdir_recursive($dir): void
{
    if (!is_dir($dir)) {
        throw new RuntimeException("Not a directory '$dir'");
    }

    foreach (scandir($dir) as $file) {
        if ($file === '.' || $file === '..') {
            continue;
        }

        if (is_dir("$dir/$file") && !is_link("$dir/$file")) {
            rmdir_recursive("$dir/$file");
        } elseif (!unlink("$dir/$file")) {
            throw new RuntimeException("Failed to unlink '$dir/$file'");
        }
    }

    if (!rmdir($dir)) {
        throw new RuntimeException("Failed to delete directory '$dir'");
    }
}

// https://stackoverflow.com/a/2638272/167815
function relpath(string $from, string $to): string
{
    // some compatibility fixes for Windows paths
    $from = is_dir($from) ? rtrim($from, '\/') . '/' : $from;
    $to   = is_dir($to)   ? rtrim($to, '\/') . '/'   : $to;
    $from = str_replace('\\', '/', $from);
    $to   = str_replace('\\', '/', $to);

    $from     = explode('/', $from);
    $to       = explode('/', $to);
    $relPath  = $to;

    foreach($from as $depth => $dir) {
        // find first non-matching dir
        if($dir === $to[$depth]) {
            // ignore this directory
            array_shift($relPath);
        } else {
            // get number of remaining dirs to $from
            $remaining = count($from) - $depth;
            if($remaining > 1) {
                // add traversals up to first matching dir
                $padLength = (count($relPath) + $remaining - 1) * -1;
                $relPath = array_pad($relPath, $padLength, '..');
                break;
            } else {
                $relPath[0] = './' . $relPath[0];
            }
        }
    }
    return implode('/', $relPath);
}

function symlink_recursive(string $target, string $link): void
{
    // Use symlinks so I can edit the source files and directly affect all
    // projects. That way I only need to re-run this script after
    // adding/deleting files, not after every change.
    if (is_file($target)) {
        if (file_exists($link)) {
            unlink($link);
        }
        symlink(relpath($link, $target), $link);
        return;
    }

    // Otherwise it's a directory
    if (!is_dir($link)) {
        mkdir($link);
    }

    foreach (scandir($target) as $file) {
        if ($file === '.' || $file === '..') {
            continue;
        }

        symlink_recursive("$target/$file", "$link/$file");
    }
}

function replace_in_file(string $file, array $replacements): void
{
    $contents = file_get_contents($file);
    strtr($contents, $replacements);
    file_put_contents($file, $contents);
}

#===============================================================================
# Go!
#===============================================================================

chdir(dirname(__DIR__));

// Delete all existing projects
echo "{$blue}Deleting existing projects...{$reset}\n";

foreach (glob('project-*') as $project) {
    if ($project !== 'project-template') {
        echo "- $project\n";
        rmdir_recursive($project);
    }
}

// Remove existing symlinks
foreach (glob('public/*.*/') as $file) {
    if (is_link($file)) {
        unlink($file);
    }
}

// If one or more versions are specified at the command line, only generate those versions
if ($argc > 1) {
    $selected = array_fill_keys(array_slice($argv, 1), true);
    $versions = array_intersect_key($versions, $selected);
}

// Generate new projects
foreach ($versions as $version => $branch) {

    // Generate project from the upstream template
    echo "\n{$blue}Generating Laravel $version project...{$reset}\n";

    passthru(sprintf(
        'composer --ansi --no-install --no-scripts --remove-vcs create-project laravel/laravel %s %s',
        escapeshellarg("project-$version"),
        escapeshellarg($branch)
    ));

    echo "\n";

    // Update the path to ensure sessions don't conflict
    // (Shouldn't be needed in most versions, but occasionally there have been breaking changes)
    replace_in_file("project-$version/config/session.php", [
        "'path' => '/'" => "'path' => '/$version/'"
    ]);

    // Copy other files
    symlink_recursive('project-template', "project-$version");

    // Create a symlink in public/
    symlink("../project-$version/public", "public/$version");

    // Add custom repositories
    $file = "project-$version/composer.json";
    $json = json_decode(file_get_contents($file), true);

    foreach ($packages as $package) {
        $json['repositories'][] = [
            'type' => 'path',
            'url' => "../$package",
            'options' => ['symlink' => true],
        ];
    }

    file_put_contents($file, json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));

    // Install packages
    $requires = [
        'davejamesmiller/laravel-breadcrumbs=@dev'
    ];

    if ($branch !== 'dev-develop') {
        // Not (generally) available for the development version of Laravel
        $requires[] = 'barryvdh/laravel-ide-helper';
    }

    passthru(sprintf(
        'cd %s && composer --ansi require %s',
        escapeshellarg("project-$version"),
        implode(' ', array_map('escapeshellarg', $requires))
    ));

}

// Run IDE Helper (it's useful when developing)
echo "\n{$blue}Running IDE Helper...{$reset}\n";
passthru('scripts/ide-helper.sh');
