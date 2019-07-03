<?php

// My Activities routes
Route::group(['middleware' => 'auth'], function () {
    Route::get('/list', 'MyActivitiesIndex')->name('myActivities.index');
    Route::post('/', 'MyActivitiesStore')->name('myActivities.store');
    Route::get('/create', 'MyActivitiesCreate')->name('myActivities.create');
});
