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

    # Install/update package
    if [ -d "$slug" ]; then
        header "Updating $slug..."
        cd "$slug"
        git pull
        echo
    else
        header "Installing $slug..."
        git clone "git@github.com:davejamesmiller/laravel-$slug.git" "$slug"
        echo
        cd "$slug"
    fi

    # Create .env file, if required
    if [ -f .env.example -a ! -f .env ]; then
        header "Creating $slug/.env..."
        cp -v .env.example .env
        echo
    fi

    # Install/update PHP dependencies
    if [ -d vendor ]; then
        header "Updating $slug PHP dependencies..."
    else
        header "Installing $slug PHP dependencies..."
    fi
    composer update
    echo

    # Install/update frontend dependencies
    if [ -d node_modules ]; then
        header "Updating $slug frontend dependencies..."
    else
        header "Installing $slug frontend dependencies..."
    fi
    yarn install
    echo

    cd ..
}

if [ ! -f .env ]; then
    cp .env.example .env
fi

install breadcrumbs "Laravel Breadcrumbs"
install migrations-ui "Laravel Migrations UI"
install route-browser "Laravel Route Browser"

scripts/generate-projects.php
