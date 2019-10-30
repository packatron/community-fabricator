#!/bin/bash
set -e

PACKAGE=community-fabricator
WORKDIR=$(dirname $(readlink -f $0))
VERSION=$(cat composer.json | grep version | head -n 1 | sed 's/.*version//' | tr -d $'\n\r\t ,":=\'')

[[ -d /tmp/build ]] && rm -fr /tmp/build

mkdir -p /tmp/build
mkdir -p ${WORKDIR}/dist

ln -s ${WORKDIR}/ /tmp/build/${PACKAGE}-plugin
ln -s ${WORKDIR}/theme/ /tmp/build/${PACKAGE}-theme

[[ -d vendor ]] && mv vendor vendor.bak
[[ -f composer.lock ]] && mv composer.lock composer.lock.bak

composer install --no-dev --prefer-dist

cd /tmp/build

rm -rf ${WORKDIR}/dist/${PACKAGE}-theme-${VERSION}.zip
rm -rf ${WORKDIR}/dist/${PACKAGE}-plugin-${VERSION}.zip

zip -r ${WORKDIR}/dist/${PACKAGE}-theme-${VERSION}.zip ${PACKAGE}-theme -x "@${PACKAGE}-theme/.zipignore"
zip -r ${WORKDIR}/dist/${PACKAGE}-plugin-${VERSION}.zip ${PACKAGE}-plugin -x "@${PACKAGE}-plugin/.zipignore"

rm -fr /tmp/build

cd ${WORKDIR}
[[ -d vendor.bak ]] && rm -fr vendor && mv vendor.bak vendor
[[ -f composer.lock.bak ]] && rm -f composer.lock && mv composer.lock.bak composer.lock

echo "Done."
