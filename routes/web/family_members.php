<?php

// Family Composition routes
Route::group(['middleware' => ['permission:register-assisted']], function () {
    Route::get('/create', 'FamilyMemberCreate')->name('familyCompositions.create');
    Route::post('/', 'FamilyMemberStore')->name('familyCompositions.store');
});

Route::group(['middleware' => ['permission:update-assisted']], function () {
    Route::get('/{familyComposition}/edit', 'FamilyMemberEdit')->name('familyCompositions.edit');
    Route::put('/{familyComposition}', 'FamilyMemberUpdate')->name('familyCompositions.update');
});

Route::group(['middleware' => ['permission:read-assisted']], function () {
    Route::get('/list', 'FamilyMemberIndex')->name('familyCompositions.index');
    Route::get('/{familyComposition}', 'FamilyMemberShow')->name('familyCompositions.show');
});

Route::group(['middleware' => ['permission:delete-assisted']], function () {
    Route::delete('/{familyComposition}', 'FamilyMemberDestroy')->name('familyCompositions.destroy');
});
