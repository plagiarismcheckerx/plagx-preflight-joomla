#!/bin/sh
# Copies the Plagx Preflight core from the sibling plagx-preflight repo into the plugin.
set -e
cd "$(dirname "$0")/.."
cp ../plagx-preflight/src/*.js media/js/lib/
echo "Synced: $(grep -o "VERSION = '[^']*'" media/js/lib/index.js)"
