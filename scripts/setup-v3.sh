#!/bin/bash
set -o nounset -o pipefail -o errexit
cd "$(dirname "$0")/.."

################################################################################
# Install all dependencies for Laravel Breadcrumbs v3 (Laravel 5.x).
################################################################################

if [ ! -d breadcrumbs-3 ]; then
    echo
    echo "Installing Laravel Breadcrumbs v3..."
    echo
    git clone git@github.com:davejamesmiller/laravel-breadcrumbs.git breadcrumbs-3
fi

if [ ! -d breadcrumbs-3/vendor ]; then
    echo
    echo "Installing development dependencies for Laravel Breadcrumbs v3..."
    echo
    ( cd breadcrumbs-3 && composer install )
fi

if [ ! -d laravel ]; then
    echo
    echo "Installing Laravel Template..."
    echo
    git clone git@github.com:laravel/laravel.git
fi

for ver in 5.0 5.1 5.2 5.3; do
    if [ ! -d $ver/vendor ]; then
        echo
        echo "Installing dependencies for application (Laravel $ver)..."
        echo
        ( cd $ver && composer install )
    fi
done
