<?php


Route::group( ['middleware' => 'isAuth'], function ()
{
	
Route::group( ['middleware' => 'isAdmin'], function ()
{
	
// User
Route::post('/Admin/addUser', 'AdminController@addUser');
Route::post('/Admin/editUser', 'AdminController@editUser');
Route::post('/Admin/deleteUser', 'AdminController@deleteUser');
// Maison
Route::post('/Admin/addMaison', 'AdminController@addMaison');
Route::post('/Admin/editMaison', 'AdminController@editMaison');
Route::post('/Admin/deleteMaison', 'AdminController@deleteMaison');
// Consomation
Route::post('/Admin/addConsomation', 'AdminController@addConsomation');
Route::post('/Admin/editConsomation', 'AdminController@editConsomation');
Route::post('/Admin/deleteConsomation', 'AdminController@deleteConsomation');
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