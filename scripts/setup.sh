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

if [ ! -d laravel-template ]; then
    echo
    echo "Installing Laravel Template..."
    echo
    git clone git@github.com:laravel/laravel.git laravel-template
fi

if [ ! -L project/vendor/davejamesmiller/laravel-breadcrumbs ]; then
    rm -rf project/vendor/davejamesmiller/laravel-breadcrumbs
fi

if [ ! -d project/vendor/davejamesmiller/laravel-breadcrumbs ]; then
    echo
    echo "Installing dependencies for project..."
    echo
    ( cd project && composer update )
fi
