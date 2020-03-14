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

    cd ..
}

if [ ! -f .env ]; then
    header 'Creating .env'
    cp -v .env.example .env
fi

install breadcrumbs 'Laravel Breadcrumbs'
install migrations-ui 'Laravel Migrations UI'
install route-browser 'Laravel Route Browser'

scripts/generate-projects.php
