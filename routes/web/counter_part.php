<?php

// CounterPart routes
Route::group(['middleware' => ['permission:register-counterPart']], function () {
    Route::get('/create', 'CounterPartCreate')->name('counterParts.create');
    Route::post('/', 'CounterPartStore')->name('counterParts.store');
});

Route::group(['middleware' => ['permission:update-counterPart']], function () {
    Route::get('/{counterPart}/edit', 'CounterPartEdit')->name('counterParts.edit');
    Route::put('/{counterPart}', 'CounterPartUpdate')->name('counterParts.update');
});

Route::group(['middleware' => ['permission:register-counterPart']], function () {
    Route::get('/list', 'CounterPartIndex')->name('counterParts.index');
    Route::get('/{counterPart}', 'CounterPartShow')->name('counterParts.show');
});

Route::group(['middleware' => ['permission:delete-counterPart']], function () {
    Route::delete('/{counterPart}', 'CounterPartDestroy')->name('counterParts.destroy');
});
