<?php

// Family Composition routes
Route::group(['middleware' => ['permission:register-assisted']], function () {
    Route::get('/create', 'FamilyMemberCreate')->name('familyMembers.create');
    Route::post('/', 'FamilyMemberStore')->name('familyMembers.store');
});

Route::group(['middleware' => ['permission:update-assisted']], function () {
    Route::get('/{familyMember}/edit', 'FamilyMemberEdit')->name('familyMembers.edit');
    Route::put('/{familyMember}', 'FamilyMemberUpdate')->name('familyMembers.update');
});

Route::group(['middleware' => ['permission:read-assisted']], function () {
    Route::get('/list', 'FamilyMemberIndex')->name('familyMembers.index');
    Route::get('/{familyMember}', 'FamilyMemberShow')->name('familyMembers.show');
});

Route::group(['middleware' => ['permission:delete-assisted']], function () {
    Route::delete('/{familyMember}', 'FamilyMemberDestroy')->name('familyMembers.destroy');
});
