<?php

// Family Composition routes
Route::group(['middleware' => ['permission:register-assisted']], function () {
    Route::get('/create', 'FamilyCompositionCreate')->name('familyCompositions.create');
    Route::post('/', 'FamilyCompositionStore')->name('familyCompositions.store');
});

Route::group(['middleware' => ['permission:update-assisted']], function () {
    Route::get('/{familyComposition}/edit', 'FamilyCompositionEdit')->name('familyCompositions.edit');
    Route::put('/{familyComposition}', 'FamilyCompositionUpdate')->name('familyCompositions.update');
});

Route::group(['middleware' => ['permission:read-assisted']], function () {
    Route::get('/list', 'FamilyCompositionIndex')->name('familyCompositions.index');
    Route::get('/{familyComposition}', 'FamilyCompositionShow')->name('familyCompositions.show');
});

Route::group(['middleware' => ['permission:delete-assisted']], function () {
    Route::delete('/{familyComposition}', 'FamilyCompositionDestroy')->name('familyCompositions.destroy');
});
