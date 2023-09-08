<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// NOTE: Do Not Remove
// Livewire asset handling if using sub folder in domain

Livewire::setUpdateRoute(function ($handle) {
    return Route::post(env('ASSET_PREFIX', '').'/livewire/update', $handle);
});

Livewire::setScriptRoute(function ($handle) {
    return Route::get(env('ASSET_PREFIX', '').'/livewire/livewire.js', $handle);
});

Route::get('/', function () {
    return view('welcome');
});
