<?php
use Illuminate\Support\Str;
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
Route::get('/', [App\Http\Controllers\UserController::class, 'indexPage'])->name('users');
Route::post('users/charts', [App\Http\Controllers\UserController::class, 'getDataForCharts'])->name('charts');

