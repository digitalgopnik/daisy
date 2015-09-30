#!/bin/bash

COMPOSER_FOLDER=tmp_composer
SUDO_USER=""

#If run on max-n use www-data User to execute
# if [ "$(hostname)" = "max-n.de" ]
# 	then
# 	SUDO_USER="sudo -u www-data "
# 	echo "${SUDO_USER}"
# fi

echo "Start Composer update or init Script for Daisy."
echo "Go to to Daisy rood Folder."
cd "$(dirname "$0")"

echo -e "\n"
echo "Download Composer..."
curl -sS https://getcomposer.org/installer | php

echo -e "\n\n"
echo "Run Composer into Folder ${COMPOSER_FOLDER}..."
${SUDO_USER}php composer.phar create-project --prefer-dist cakephp/app ${COMPOSER_FOLDER}

echo "Copy essentially Files from ${COMPOSER_FOLDER} to Daisy..."
${SUDO_USER}cp ${COMPOSER_FOLDER}/composer.lock ./
${SUDO_USER}cp -R ${COMPOSER_FOLDER}/vendor ./

echo "Remove composer Folder ${COMPOSER_FOLDER} and composer..."
${SUDO_USER}rm -R ${COMPOSER_FOLDER}
rm composer.phar
