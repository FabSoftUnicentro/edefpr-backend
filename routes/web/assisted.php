<?php

// Assisted routes
Route::group(['middleware' => ['permission:register-assisted']], function () {
    Route::get('/create', 'AssistedCreate')->name('assisteds.create');
    Route::post('/', 'AssistedStore')->name('assisteds.store');
});

Route::group(['middleware' => ['permission:update-assisted']], function () {
    Route::get('/{assisted}/edit', 'AssistedEdit')->name('assisteds.edit');
    Route::put('/{assisted}', 'AssistedUpdate')->name('assisteds.update');
});

Route::group(['middleware' => ['permission:read-assisted']], function () {
    Route::get('/list', 'AssistedIndex')->name('assisteds.index');
    Route::get('/{assisted}', 'AssistedShow')->name('assisteds.show');
});

Route::group(['middleware' => ['permission:delete-assisted']], function () {
    Route::delete('/{assisted}', 'AssistedDestroy')->name('assisteds.destroy');
});