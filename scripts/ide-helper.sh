#!/bin/bash
set -o nounset -o pipefail -o errexit
cd "$(dirname "$0")/.."

################################################################################
# Run IDE Helper for the test projects.
################################################################################

for project in project-*; do
    if [ -d "$project/vendor/barryvdh/laravel-ide-helper" ]; then
        cd $project
        echo
        echo -e "\e[94m${project:8}\e[0m"
        php artisan ide-helper:generate
        php artisan ide-helper:meta
        #php artisan ide-helper:models --reset --write
        cd ..
    fi
done
