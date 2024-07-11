<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Artisan;
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



Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'show')->name('login');
    Route::post('/login', 'login')->name('login.submit');
});

Route::group(['middleware' => ['auth']], function () {
    Route::controller(LogoutController::class)->group(function () {
        Route::get('/logout', 'perform')->name('logout');
    });
    Route::get('/', function () {
        return view('pages.home');
    });
    Route::controller(EmployeeController::class)->group(function() {
        Route::get('/Employees/index','index')->name('Employees.index');
        Route::get('/Employees/create','create')->name('Employees.create');
        Route::post('/Employees/store','store')->name('Employees.store');
        Route::get('/Employees/edit/{id}','edit')->name('Employees.edit');
        Route::post('/Employees/update/{id}','update')->name('Employees.update');
        Route::get('/Employees/delete/{id}','destroy')->name('Employees.delete');
    });
    Route::controller(TasksController::class)->group(function() {
        Route::get('/Tasks/index','index')->name('Tasks.index');
        Route::get('/Tasks/create','create')->name('Tasks.create');
        Route::post('/Tasks/store','store')->name('Tasks.store');
        Route::get('/Tasks/edit/{id}','edit')->name('Tasks.edit');
        Route::post('/Tasks/update/{id}','update')->name('Tasks.update');
        Route::get('/Tasks/delete/{id}','destroy')->name('Tasks.delete');
    });
});

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    echo "Cleared";
});
