<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

//Add a way to review information prior to sending the email.
Route::post('/reviewRequest',['as'=>'front.help.review','uses'=>'HelpRequestController@review']);

Route::post('/saveInformation',['as'=>'front.help.store','uses'=>'HelpRequestController@store']);

//Create a new request.
Route::resource('/', 'HelpRequestController',
    ['only' => ['index','create','store']]);

//Search our directory
Route::get('findUser/{unityID?}',array('as'=>'findUser.index','uses'=>'LookUpController@index'));