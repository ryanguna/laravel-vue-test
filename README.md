laravel must be installed on your machine

https://laravel.com/docs/5.6/installation

or laravel homestead must be install 

https://laravel.com/docs/5.6/homestead


Laravel
cd to /laravel directory

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

Configuring Reset Password Mailing Functionality

FRONT_END_MAIL_REDIRECT=http://localhost:8080
FRONT_END_MAIL_REDIRECT=<Change this to your front end host name>
  
We will be using a gmail account for our mail host



MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=<change this with your gmail account username>
MAIL_PASSWORD=<change this with your gmail account password>
MAIL_ENCRYPTION=tls
  
  

Run 
php artisan serve

If you get welcomed to a laravel homescreen then we are done with installing laravel :)



Installing vuejs


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
cd to /vue directory
run
npm install

edit your .env file 

VUE_APP_AXIOS_URL=http://localhost:8000

VUE_APP_AXIOS_URL=http://<Change this ti your laravel host name>

npm run serve

Open your vue application 

Open your provisioned vuejs development server 

and try logging in with these credentials

default account :
username : admin@triune.com,
password : admin
