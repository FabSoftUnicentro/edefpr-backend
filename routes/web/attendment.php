<?php

// Attendment routes
Route::group(['middleware' => ['permission:register-attendment']], function () {
    Route::get('/create', 'AttendmentCreate')->name('attendments.create');
    Route::post('/', 'AttendmentStore')->name('attendments.store');
});

Route::group(['middleware' => ['permission:update-attendment']], function () {
    Route::get('/{attendment}/edit', 'AttendmentEdit')->name('attendments.edit');
    Route::put('/{attendment}', 'AttendmentUpdate')->name('attendments.update');
});

Route::group(['middleware' => ['permission:list-attendment']], function () {
    Route::get('/list', 'AttendmentIndex')->name('attendments.index');
    Route::get('/{attendment}', 'AttendmentShow')->name('attendments.show');
});
Route::group(['middleware' => ['permission:delete-attendment']], function () {
    Route::delete('/{attendment}', 'AttendmentDestroy')->name('attendments.destroy');
});
