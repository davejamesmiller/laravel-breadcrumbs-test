#!/bin/bash
set -o nounset -o pipefail -o errexit
cd "$(dirname "$0")/.."

################################################################################
# Install all dependencies.
################################################################################

if [ ! -d breadcrumbs-3 ]; then
    echo
    echo "Installing Laravel Breadcrumbs v3..."
    echo
    git clone git@github.com:davejamesmiller/laravel-breadcrumbs.git breadcrumbs-3
fi

if [ ! -d breadcrumbs-2 ]; then
    echo
    echo "Installing Laravel Breadcrumbs v2..."
    echo
    git clone git@github.com:davejamesmiller/laravel-breadcrumbs.git breadcrumbs-2 -b 2.x
fi

if [ ! -d laravel ]; then
    echo
    echo "Installing Laravel Template..."
    echo
    git clone git@github.com:laravel/laravel.git
fi

for ver in 4.0 4.1 4.2 5.0 5.1 5.2; do
    if [ ! -d $ver/vendor ]; then
        echo
        echo "Installing dependencies for application (Laravel $ver)..."
        echo
        ( cd $ver && composer update )
    fi
done
