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

install() {
    local slug="$1"
    local name="$2"

    if [ -d "$slug" ]; then
        header "Updating $slug..."
        cd "$slug"
        git pull
        echo
        header "Updating $slug dependencies..."
        composer update
        cd ..
    else
        header "Installing $slug..."
        git clone "git@github.com:davejamesmiller/laravel-$slug.git" "$slug"
        echo
        cd "$slug"
        header "Installing $slug dependencies..."
        composer install
        cd ..
    fi

    echo
}

install breadcrumbs "Laravel Breadcrumbs"
#install route-browser "Laravel Route Browser"

scripts/generate-projects.php
