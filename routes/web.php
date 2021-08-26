<?php

Route::get('/admin', 'AdminController@I_dashboard');
Route::get('/admin/maisons', 'AdminController@I_maisons');
Route::get('/admin/maison/{id}', 'AdminController@I_maison');
Route::get('/admin/clients', 'AdminController@I_clients');
Route::post('/admin/addNewMaison', 'AdminController@createNewMaison');
Route::post('/admin/addNewClient', 'AdminController@addUser');
Route::post('/admin/deleteUser', 'AdminController@deleteUser');
Route::post('/admin/addConsomation', 'AdminController@addConsomation');
Route::get('/addConsomation', 'ApiController@addConsomation');
Route::post('/admin/setConsomation', 'AdminController@setConsomation');
Route::post('/admin/deleteMaison', 'AdminController@deleteMaison');
Route::get('/admin/getVilles', 'AdminController@listVille');
Route::group( ['middleware' => 'isAuth'], function ()
{

Route::group( ['middleware' => 'isAdmin'], function ()
{

// User
Route::post('/admin/addUser', 'AdminController@addUser');
Route::post('/admin/editUser', 'AdminController@editUser');
//Route::post('/admin/deleteUser', 'AdminController@deleteUser');
// Maison
Route::post('/admin/addMaison', 'AdminController@addMaison');
Route::post('/admin/editMaison', 'AdminController@editMaison');
Route::post('/admin/deleteMaison', 'AdminController@deleteMaison');
// Consomation
//Route::post('/admin/addConsomation', 'AdminController@addConsomation');
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
