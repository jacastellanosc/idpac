<?php

use Illuminate\Support\Facades\Auth;
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

// Auth::routes();

Route::get('/', function () {
    return view('login');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/logout', function () {
    Auth::logout();
    return redirect(route('login'));
});

Route::post('/register', 'App\Http\Controllers\LoginController@register')->name('register');

Route::post('/authenticate', 'App\Http\Controllers\LoginController@authenticate')->name('authenticate');


Route::prefix('/companies')->group(function() {
    Route::get('/', 'App\Http\Controllers\CompanyController@index')->name('companies');
    Route::post('/', 'App\Http\Controllers\CompanyController@index');

    Route::get('/edit/{companyId}', 'App\Http\Controllers\CompanyController@edit')->name('companies-edit');
    Route::post('/save', 'App\Http\Controllers\CompanyController@store')->name('save-company');
    Route::get('/delete/{companyId}', 'App\Http\Controllers\CompanyController@delete');

});

Route::prefix('/employees')->group(function() {
    Route::get('/', 'App\Http\Controllers\EmployeeController@index')->name('employees');
    Route::post('/', 'App\Http\Controllers\EmployeeController@index');

    Route::get('/edit/{employeeId}', 'App\Http\Controllers\EmployeeController@edit')->name('employees-edit');
    Route::post('/save', 'App\Http\Controllers\EmployeeController@store')->name('save-employee');
    Route::get('/delete/{employeeId}', 'App\Http\Controllers\EmployeeController@delete');

});

// Route::group(['middleware' => 'auth'], function() {
//     Route::get('/companies', 'App\Http\Controllers\CompanyController@index')->name('companies');
// });
