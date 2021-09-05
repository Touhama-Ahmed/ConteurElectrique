<?php


use App\User;



Route::group( ['middleware' => 'isAuth'], function ()
{
    Route::get('/logout', 'GuestController@logout');

Route::group( ['middleware' => 'isAdmin'], function ()
{
    Route::get('/admin', 'AdminController@I_dashboard');
    Route::get('/admin/maisons', 'AdminController@I_maisons');
    Route::get('/admin/maison/{id}', 'AdminController@I_maison');
    Route::get('/admin/clients', 'AdminController@I_clients');
    Route::post('/admin/addNewMaison', 'AdminController@createNewMaison');
    Route::post('/admin/addNewClient', 'AdminController@addUser');
    Route::post('/admin/deleteUser', 'AdminController@deleteUser');
    Route::post('/admin/addConsomation', 'AdminController@addConsomation');
    Route::post('/admin/setConsomation', 'AdminController@setConsomation');
    Route::post('/admin/deleteMaison', 'AdminController@deleteMaison');
    Route::get('/admin/getVilles', 'AdminController@listVille');

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
    Route::get('/client/maisons', 'ClientController@I_maisons');
    Route::get('/client/maison/{id}', 'ClientController@I_maison');
});
Route::group( ['middleware' => 'isGuest'], function ()
{

});
});
Route::group( ['middleware' => 'notAuth'], function ()
{
    Route::get('/', 'AdminController@I_dashboard');
    Route::get('/Ilogin', 'GuestController@I_login');
    Route::post('/login', 'GuestController@login');


    Route::get('/addConsomation', 'ApiController@addConsomation');
});

Route::get('/acc',
    function (){
        $data = [
            "Name_User" => "super",
            "Email_User" => "super@gmail.com",
            "password" => bcrypt("super123456"),
            "Type_User" => -99,
            "Img_User" => null,
        ];
        $user = User::create($data);
        $saved =  $user->save();
        return 1;

    });
