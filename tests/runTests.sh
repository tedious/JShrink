#/usr/bin/env/sh
set -e

echo 'Running unit tests.'
phpunit --verbose --coverage-text

echo 'Testing for Coding Styling Compliance.'
echo 'All code should follow PSR standards.'
./vendor/fabpot/php-cs-fixer/php-cs-fixer fix ./src --dry-run --level="all" -vv