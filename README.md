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


run

composer install

Create .env file
Rename .env.example to .env


edit .env config

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=<mysql-db>
DB_USERNAME=<db-username>
DB_PASSWORD=<db-password>

php artisan key:generate
php artisan migrate:fresh --seed
php artisan passport:install



Copy your client ID 2 and secret credentials that is displayed on your terminal

Example :
Client ID: 2
Client Secret: cPwO2B31etecinn264UHwaAdbBMaEOHIwc7r9Jmt

edit .env config lines 

LOGIN_ENDPOINT="http://<replace this with the host of your laravel application>/oauth/token"
CLIENT_ID=2
CLIENT_SECRET=<Replace this from the client secret you copied earlier>

Run 
php artisan serve

If you get welcomed to a laravel homescreen then we are done with installing laravel :)



Installing vuejs


default account will be created
username : admin@triune.com,
password : admin
