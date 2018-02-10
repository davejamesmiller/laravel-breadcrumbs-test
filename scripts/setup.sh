#!/bin/bash
set -o nounset -o pipefail -o errexit
cd "$(dirname "$0")/.."

################################################################################
# Install all dependencies for Laravel Breadcrumbs.
################################################################################

if [ ! -d breadcrumbs ]; then
    echo
    echo "Installing Laravel Breadcrumbs v3..."
    echo
    git clone git@github.com:davejamesmiller/laravel-breadcrumbs.git breadcrumbs
fi

if [ ! -d breadcrumbs/vendor ]; then
    echo
    echo "Installing development dependencies for Laravel Breadcrumbs..."
    echo
    ( cd breadcrumbs && composer install )
fi

if [ ! -d laravel ]; then
    echo
    echo "Installing Laravel Template..."
    echo
    git clone git@github.com:laravel/laravel.git
fi

for ver in 5.*; do
    if [ ! -L $ver/vendor/davejamesmiller/laravel-breadcrumbs ]; then
        rm -rf $ver/vendor/davejamesmiller/laravel-breadcrumbs
    fi

    if [ ! -d $ver/vendor/davejamesmiller/laravel-breadcrumbs ]; then
        echo
        echo "Installing dependencies for application (Laravel $ver)..."
        echo
        ( cd $ver && composer update )
    fi
done
