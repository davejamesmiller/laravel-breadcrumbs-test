#!/bin/bash
set -o nounset -o pipefail -o errexit
cd "$(dirname "$0")/../project"

################################################################################
# Run IDE Helper for the test project.
################################################################################

php artisan ide-helper:generate
php artisan ide-helper:meta
#php artisan ide-helper:models --reset --write
