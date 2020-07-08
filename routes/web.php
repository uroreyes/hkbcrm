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

Route::namespace('Admin')->group(function () {
    Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.' ], function () {
        
        Route::resource('companies', 'CompanyController');
        Route::resource('employees', 'EmployeeController');
    });
});

Route::get('/', 'HomeController@index')->name('home');

Auth::routes([
    'register' => false,
]);
