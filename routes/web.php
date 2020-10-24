<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserUIController;
use App\Http\Controllers\UserApiEndpointController;

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
    return redirect()->route('users.index');
});

Route::resource('users', UserUIController::class);
Route::resource('users-api', UserApiEndpointController::class);