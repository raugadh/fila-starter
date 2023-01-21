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

Route::get('data', function () {
    Artisan::call('migrate:fresh', [
        '--force' => true
    ]);
    Artisan::call('shield:generate', [
        '--all' => true
    ]);
    Artisan::call('db:seed', [
        '--force' => true
    ]);
    return redirect(url('/'));
});
Route::get('store', function () {
    Artisan::call('storage:link', [
        '--relative' => true
    ]);
    return redirect(url('/'));
});
