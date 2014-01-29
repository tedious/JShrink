#/usr/bin/env/sh
set -e

echo 'Running unit tests.'
phpunit --verbose --coverage-text

echo ''
echo ''
echo ''
echo 'Testing for Coding Styling Compliance.'
echo 'All code should follow PSR standards.'
./vendor/fabpot/php-cs-fixer/php-cs-fixer fix ./ --dry-run --level="all" -vv