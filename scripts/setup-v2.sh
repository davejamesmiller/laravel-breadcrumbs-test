#!/bin/bash
set -o nounset -o pipefail -o errexit
cd "$(dirname "$0")/.."

################################################################################
# Install all dependencies for Laravel Breadcrumbs v2 (Laravel 4.x).
################################################################################

if [ ! -d breadcrumbs-2 ]; then
    echo
    echo "Installing Laravel Breadcrumbs v2..."
    echo
    git clone git@github.com:davejamesmiller/laravel-breadcrumbs.git breadcrumbs-2 -b 2.x
fi

if [ ! -d breadcrumbs-2/vendor ]; then
    echo
    echo "Installing development dependencies for Laravel Breadcrumbs v2..."
    echo
    ( cd breadcrumbs-2 && composer install )
fi

for ver in 4.0 4.1 4.2; do
    if [ ! -d $ver/vendor ]; then
        echo
        echo "Installing dependencies for application (Laravel $ver)..."
        echo
        ( cd $ver && composer install )
    fi
done
