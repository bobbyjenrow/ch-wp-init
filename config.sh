#!/bin/sh


echo 'Configuring the functions.php file'
echo 'include "cobblehill/cobblehill-functions.php"'; >> ./functions.php


echo 'Configure gitignore'
mv ./gitignore ./.gitignore

echo 'Yarn Build'
yarn install
yarn run build