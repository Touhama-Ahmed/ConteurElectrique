<?php

Route::get('/dashboard', 'AdminController@I_dashboard');
Route::get('/clients', 'AdminController@I_clients');
Route::post('/addNewClient', 'AdminController@createNewClient');

Route::get('/getVilles', 'AdminController@listVille');
Route::group( ['middleware' => 'isAuth'], function ()
{

Route::group( ['middleware' => 'isAdmin'], function ()
{

// User
Route::post('/admin/addUser', 'AdminController@addUser');
Route::post('/admin/editUser', 'AdminController@editUser');
Route::post('/admin/deleteUser', 'AdminController@deleteUser');
// Maison
Route::post('/admin/addMaison', 'AdminController@addMaison');
Route::post('/admin/editMaison', 'AdminController@editMaison');
Route::post('/admin/deleteMaison', 'AdminController@deleteMaison');
// Consomation
Route::post('/admin/addConsomation', 'AdminController@addConsomation');
Route::post('/admin/editConsomation', 'AdminController@editConsomation');
Route::post('/admin/deleteConsomation', 'AdminController@deleteConsomation');
});
Route::group( ['middleware' => 'isClient'], function ()
{

});
Route::group( ['middleware' => 'isGuest'], function ()
{

});
});
Route::group( ['middleware' => 'notAuth'], function ()
{

});
