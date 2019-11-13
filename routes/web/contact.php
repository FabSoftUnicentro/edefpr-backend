<?php

Route::group(['middleware' => ['permission:register-contact']], function () {
    Route::get('/create', 'ContactCreate')->name('contacts.create');
    Route::post('/', 'ContactStore')->name('contacts.store');
});


Route::group(['middleware' => ['permission:read-contact']], function () {
    Route::get('/list', 'ContactIndex')->name('contacts.index');
    Route::get('/{contact}', 'ContactShow')->name('contacts.show');
});

Route::group(['middleware' => ['permission:update-contact']], function () {
    Route::get('/{contact}/edit', 'ContactEdit')->name('contacts.edit');
    Route::put('/{contact}', 'ContactUpdate')->name('contacts.update');
});

Route::group(['middleware' => ['permission:delete-contact']], function () {
    Route::delete('/{contact}', 'ContactDestroy')->name('contacts.destroy');
});