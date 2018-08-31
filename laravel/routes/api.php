<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::group(['middleware' => 'auth:api'], function(){
    Route::get('user/getCurrentlyLoggedInUser', 'UserController@getCurrentlyLoggedInUser');
    Route::resource('user', 'UserController');
});


Route::group([
    'namespace' => 'Auth',
    'middleware' => 'api',
    'prefix' => 'password'
], function () {
    Route::post('create', 'PasswordResetController@create');
    Route::get('find/{token}', 'PasswordResetController@find');
    Route::post('reset', 'PasswordResetController@reset');
});


Route::group([
    'namespace' => 'Auth',
    'middleware' => 'api',
    'prefix' => 'authentication'
], function () {
    Route::post('login', 'LoginController@login');
    Route::post('signUp', 'SignUpController@signUp');


    Route::post('social/oauth/login', 'SocialLoginController@login');

    Route::get('social/oauth/authorize', 'SocialLoginController@googleLoginCallback');
});





//Route::post('password/email', 'Auth\ForgotPasswordController@getResetToken');
//Route::post('password/reset', 'Auth\ResetPasswordController@reset');


