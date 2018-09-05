#!/bin/bash
set -o nounset -o pipefail -o errexit
cd "$(dirname "$0")/.."

################################################################################
# Install the specified version of Laravel into the test project.
#
# Usage:   `t set-laravel-version <version>`
# Example: `t set-laravel-version 5.7`
#
# This will update `project/composer.json` and install it. It won't update the
# application files, so it may not work for all versions.
################################################################################

if [ $# -lt 1 ]; then
    echo "Usage: set-laravel-version <version>"
    exit 1
fi

version="${1:-}"

cd project
composer require  "laravel/framework:${version}.*"
