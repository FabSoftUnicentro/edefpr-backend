<?php

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

$this->get('/', 'Dashboard\DashboardIndex')->name('dashboard');

Auth::routes();

$this->get('/page-not-found', function () {
    return view('error.404');
})->name('404');

$this->get('/internal-server-error', function () {
    return view('error.500');
})->name('500');
