#
Installing vue

Install vue.js 3

#WARNING
The package name changed from vue-cli to @vue/cli. If you have the previous vue-cli (1.x or 2.x) package installed globally, you need to uninstall it first with npm uninstall vue-cli -g

##
To install the new package, use one of those commands:

sudo npm install -g @vue/cli

##
You can check you have the right version (3.x) with this command:

vue --version


npm install

Laravel

Create .env.example

run
composer install

edit .env config
php artisan key:generate
php artisan migrate:fresh --seed
default account will be created
username : admin@triune.com,
password : admin

php artisan passport:install

Setup the client secret and client ID in env.
choose the client ID 2
