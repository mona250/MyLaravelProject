<?php

Route::group(['middleware' => 'web'], function () {
//Welcome Page
        Route::get('/', 'admin\WelcomeController@welcome');
        Route::any('/login', 'admin\WelcomeController@index');

//Login Page
        Route::post('/homepage', 'admin\LoginController@postLogin');
        Route::get('login', array('uses' => 'admin\LoginController@showLogin'));
        Route::get('reset/password', 'admin\LoginController@resetPassword');
        Route::post('reset/password','admin\LoginController@selectpost');

        Route::post('reset/password/email','admin\LoginController@linkEmail');
        Route::get('reset/password/email','admin\LoginController@linkEmailshow');

        Route::get('reset/password/{token}/{email}','admin\LoginController@resetPass');
        Route::post('reset/password/complete','admin\LoginController@resetPassComplete');
    
        Route::post('reset/password/phone','admin\LoginController@resetphone');



//Register Page
        Route::get('/register', 'admin\RegisterController@getRegister');
        Route::post('/register', 'admin\RegisterController@store');

   //Route::post('register/get_countries_list','admin\RegisterController@getcountiesList');


     Route::get('/homepage', 'admin\HomeController@index');
    });