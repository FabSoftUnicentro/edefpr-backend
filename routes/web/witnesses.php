<?php

// Witness routes
Route::group(['middleware' => ['permission:register-assisted']], function () {
    Route::get('/create', 'WitnessCreate')->name('witnesses.create');
    Route::post('/', 'witnessStore')->name('witnesses.store');
});

Route::group(['middleware' => ['permission:update-assisted']], function () {
    Route::get('/{witness}/edit', 'WitnessEdit')->name('witnesses.edit');
    Route::put('/{witness}', 'WitnessUpdate')->name('witnesses.update');
});

Route::group(['middleware' => ['permission:read-assisted']], function () {
    Route::get('/list', 'WitnessIndex')->name('witnesses.index');
    Route::get('/{witness}', 'WitnessShow')->name('witnesses.show');
});

Route::group(['middleware' => ['permission:delete-assisted']], function () {
    Route::delete('/{witness}', 'WitnessDestroy')->name('witnesses.destroy');
});
