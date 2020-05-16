<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify'=>true]); // ['verify'=>true] parametar aktivira email confirmation

Route::get('/home', 'HomeController@index')->name('home');


//////////////////////////////my routes


//UPRAVLJANJE KLIJENTIMA
Route::group(
    [
        'middleware'=>'check_roles',              
        'roles' => ['administrator','serviser']
    ], 
    function()
    {         
        Route::get('/clients/search','ClientController@search')->name('clients.search');
        Route::resource('clients', 'ClientController');    
    }
);

//UPRAVLJANJE UREĐAJIMA
Route::group(
    [
        'middleware'=>'check_roles',              
        'roles' => ['administrator','serviser']
    ], 
    function()
    {
        Route::get('/devices/search','DeviceController@search')->name('devices.search');
        Route::resource('devices', 'DeviceController');
    }
);

//UPRAVLJANJE RADNIM NALOZIMA
Route::group(
    [
        'middleware'=>'check_roles',              
        'roles' => ['administrator','serviser']
    ], 
    function()
    {
        Route::get('/orders/search','OrderController@search')->name('orders.search');
        Route::resource('orders', 'OrderController');
    }
);

//UPRAVLJANJE KORISNICIMA
Route::group(
    [
        'middleware'=>'check_roles',              
        'roles' => ['administrator']
    ], 
    function()
    {
        Route::resource('users', 'UserController');
    }
);
