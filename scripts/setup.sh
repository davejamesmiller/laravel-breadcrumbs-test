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

    if [ -f "$slug/.env.example" -a ! -f "$slug/.env" ]; then
        cp "$slug/.env.example" "$slug/.env"
    fi

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

if [ ! -f .env ]; then
    cp .env.example .env
fi

install breadcrumbs "Laravel Breadcrumbs"
install migrations-ui "Laravel Migrations UI"
install route-browser "Laravel Route Browser"

scripts/generate-projects.php
