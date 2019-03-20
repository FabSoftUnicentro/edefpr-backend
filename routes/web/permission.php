<?php

// Permission Routes
Route::group(['middleware' => ['permission:register-permission']], function () {
    Route::get('/create', 'PermissionCreate')->name('permissions.create');
    Route::post('/', 'PermissionStore')->name('permissions.store');
});

Route::group(['middleware' => ['permission:update-permission']], function () {
    Route::get('/{permission}/edit', 'PermissionEdit')->name('permissions.edit');
    Route::put('/{permission}', 'PermissionUpdate')->name('permissions.update');
});

Route::group(['middleware' => ['permission:list-permission']], function () {
    Route::get('/', 'PermissionWithoutPagination')->name('permissions.list');
    Route::get('/list', 'PermissionIndex')->name('permissions.index');
    Route::get('/{permission}', 'PermissionShow')->name('permissions.show');
});

Route::group(['middleware' => ['permission:delete-permission']], function () {
    Route::delete('/{permission}', 'PermissionDestroy')->name('permissions.destroy');
});
