#!/bin/bash
set -e

PACKAGE=community-fabricator
WORKDIR=$(echo $PWD)
VERSION=$(cat composer.json | grep version | head -n 1 | sed 's/.*version//' | tr -d $'\n\r\t ,":=\'')

mkdir -p ${WORKDIR}/dist
[[ -d ${WORKDIR}/build ]] && rm -fr ${WORKDIR}/build && mkdir -p ${WORKDIR}/build
ln -s ./ ${WORKDIR}/build/${PACKAGE}-plugin
ln -s ./theme ${WORKDIR}/build/${PACKAGE}-theme

[[ -d vendor ]] && mv vendor vendor.bak
[[ -f composer.lock ]] && mv composer.lock composer.lock.bak

composer install --no-dev --prefer-dist

cd ${WORKDIR}/build

rm -rf ../dist/${PACKAGE}-theme-${VERSION}.zip
rm -rf ../dist/${PACKAGE}-plugin-${VERSION}.zip

zip -r ../dist/${PACKAGE}-theme-${VERSION}.zip ${PACKAGE}-theme -x "@../theme/.zipignore"
zip -r ../dist/${PACKAGE}-plugin-${VERSION}.zip ${PACKAGE}-plugin -x "@../.zipignore"

#rm -fr ${WORKDIR}/build

[[ -d vendor.bak ]] && rm -fr vendor && mv vendor.bak vendor
[[ -f composer.lock.bak ]] && rm -f composer.lock && mv composer.lock.bak composer.lock
