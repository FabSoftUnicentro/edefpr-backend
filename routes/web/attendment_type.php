<?php

// AttendmentType routes
Route::group(['middleware' => ['permission:register-attendmentType']], function () {
    Route::get('/create', 'AttendmentTypeCreate')->name('attendmentTypes.create');
    Route::post('/', 'AttendmentTypeStore')->name('attendmentTypes.store');
});

Route::group(['middleware' => ['permission:update-attendmentType']], function () {
    Route::get('/{attendmentType}/edit', 'AttendmentTypeEdit')->name('attendmentTypes.edit');
    Route::put('/{attendmentType}', 'AttendmentTypeUpdate')->name('attendmentTypes.update');
});

Route::group(['middleware' => ['permission:list-attendmentType']], function () {
    Route::get('/list', 'AttendmentTypeIndex')->name('attendmentTypes.index');
    Route::get('/{attendmentType}', 'AttendmentTypeShow')->name('attendmentTypes.show');
});

Route::group(['middleware' => ['permission:delete-attendmentType']], function () {
    Route::delete('/{attendmentType}', 'AttendmentTypeDestroy')->name('attendmentTypes.destroy');
});
