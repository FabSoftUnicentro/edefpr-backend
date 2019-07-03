<?php

//Log Activity routes
Route::group(['middleware' => ['permission:register-activities']], function () {
    Route::get('/list', 'LogActivityIndex')->name('logActivity.index');
    Route::get('/filter', 'LogActivityFilter')->name('logActivity.filter');
});
