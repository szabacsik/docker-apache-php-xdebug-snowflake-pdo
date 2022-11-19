#!/bin/bash
PHP_HOME=$(which phpize | sed 's/phpize//g' | sed 's/bin//g' | tr -s /)
PHP_EXTENSION_DIR=$(php-config --extension-dir)
export PHP_HOME=$PHP_HOME
apt-get -y install git make cmake
cd /tmp || exit
git clone https://github.com/snowflakedb/pdo_snowflake.git
./pdo_snowflake/scripts/build_pdo_snowflake.sh
mv ./pdo_snowflake/modules/pdo_snowflake.so "$PHP_EXTENSION_DIR"
mv ./pdo_snowflake/modules/pdo_snowflake.la "$PHP_EXTENSION_DIR"
mv ./pdo_snowflake/libsnowflakeclient/cacert.pem /etc/snowflake-cacert.pem
rm -rf /tmp/pdo_snowflake
SUCCESS=$(php -dextension=pdo_snowflake.so -m | grep pdo_snowflake)
if [ "$SUCCESS" == "pdo_snowflake" ]; then
  echo -e "\e[32mPHP PDO driver for Snowflake has been installed successfully.\e[0m"
  exit 0;
else
  echo -e "\e[31mInstallation of PHP PDO driver for Snowflake has been failed!\e[0m"
  exit 1;
fi
