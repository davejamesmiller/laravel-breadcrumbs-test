#!/bin/bash
set -o nounset -o pipefail -o errexit
cd "$(dirname "$0")/.."

################################################################################
# Update symlinks in `public/`.
################################################################################

find public -type l -exec rm -fv '{}' +

for dir in project-*; do
    version="${dir:8}"
    ln -nsfv ../$dir/public public/$version
done
