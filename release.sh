#!/bin/bash
set -e

PACKAGE=community-fabricator
WORKDIR=$(dirname "$(readlink -f "$0")")
VERSION=$(grep version < composer.json | head -n 1 | sed 's/.*version//' | tr -d $'\n\r\t ,":=')

[[ -d /tmp/build ]] && rm -fr /tmp/build

mkdir -p "${WORKDIR}/dist"
mkdir -p /tmp/build/theme /tmp/build/plugin

ln -s "${WORKDIR}/" "/tmp/build/plugin/${PACKAGE}"
ln -s "${WORKDIR}/theme/" "/tmp/build/theme/${PACKAGE}"

[[ -d vendor ]] && mv vendor vendor.bak
[[ -f composer.lock ]] && mv composer.lock composer.lock.bak

composer install --no-dev --prefer-dist

cd /tmp/build/theme
rm -rf "${WORKDIR}/dist/${PACKAGE}-theme-${VERSION}.zip"
zip -r "${WORKDIR}/dist/${PACKAGE}-theme-${VERSION}.zip" "${PACKAGE}" -x "@${PACKAGE}/.zipignore"

cd /tmp/build/plugin
rm -rf "${WORKDIR}/dist/${PACKAGE}-plugin-${VERSION}.zip"
zip -r "${WORKDIR}/dist/${PACKAGE}-plugin-${VERSION}.zip" "${PACKAGE}" -x "@${PACKAGE}/.zipignore"

rm -fr /tmp/build

cd "${WORKDIR}"
[[ -d vendor.bak ]] && rm -fr vendor && mv vendor.bak vendor
[[ -f composer.lock.bak ]] && rm -f composer.lock && mv composer.lock.bak composer.lock

echo "Done."
