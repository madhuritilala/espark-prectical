<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::resource('user_form', UserController::class);
/* Admint Routes [Start] */
Route::namespace("Admin")->prefix('admin')->group(function(){

	Route::namespace('Auth')->group(function(){
		Route::get('/login', 'LoginController@showLoginForm')->name('admin.login');
		Route::post('/login', 'LoginController@adminLogin');
        Route::post('logout', 'LoginController@logout')->name('admin-logout');
    });

    Route::get('/dashboard', 'HomeController@index')->name('admin.dashboard');
    Route::get('/myprofile', 'ProfileController@index')->name('admin.myprofile');

    /* webpages [Start] */
    Route::get('/employee/ajax', 'EmployeeController@listAjax')->name('employee-ajax');
    /* webpages [End] */

    Route::resources([
        'employee' => 'EmployeeController',
    ]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
