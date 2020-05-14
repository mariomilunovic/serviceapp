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


// ['verify'=>true] parametar aktivira email confirmation
Auth::routes(['verify'=>true]);


Route::get('/home', 'HomeController@index')->name('home');

//my routes
Route::get('/clients/search', function () {
    return view('clients.search');
});


    
    //UPRAVLJANJE KLIJENTIMA
    Route::group(
        [
            'middleware'=>'check_roles',              
            'roles' => ['administrator','serviser']
        ], 
        function()
        {
            Route::resource('clients', 'ClientController');

           
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
    