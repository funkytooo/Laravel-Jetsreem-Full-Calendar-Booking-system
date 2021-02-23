<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
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

Route::get('/calendar', function () {
    return view('calendar');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('services', App\Http\Controllers\ServicesController::class);

    Route::resource('users', App\Http\Controllers\UsersController::class);

    Route::resource('bookings', \App\Http\Controllers\CalendarController::class);

    
});
Route::get('index','\App\Http\Controllers\CalendarController::class@index')->name('allBookings');




