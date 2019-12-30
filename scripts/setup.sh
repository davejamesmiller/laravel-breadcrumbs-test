#!/bin/bash
set -o nounset -o pipefail -o errexit
cd "$(dirname "$0")/.."

################################################################################
# Install all packages and dependencies.
################################################################################

header() {
    echo -ne "\e[94m"
    echo -n "$@"
    echo -e "\e[0m"
}

if [ -d breadcrumbs ]; then
    header "Updating Laravel Breadcrumbs..."
    cd breadcrumbs
    git pull
    echo
    header "Updating Laravel Breadcrumbs dependencies..."
    composer update
    cd ..
else
    header "Installing Laravel Breadcrumbs..."
    git clone git@github.com:davejamesmiller/laravel-breadcrumbs.git breadcrumbs
    echo
    cd breadcrumbs
    header "Installing Laravel Breadcrumbs dependencies..."
    composer install
    cd ..
fi

echo
scripts/generate-projects.php
