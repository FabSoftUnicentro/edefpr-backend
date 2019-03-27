<?php

// Role routes
Route::group(['middleware' => ['permission:assign-role-permission']], function () {
    Route::get('/{role}/permissions', 'RoleAllPermissions')->name('roles.permissions');
    Route::get('/assign', 'RolePermission')->name('roles.change.permissions');
    Route::put('/{role}/assign-permission/{permission}', 'RoleAssignPermission')->name('roles.assign.permission');
});

Route::group(['middleware' => ['permission:unassign-role-permission']], function () {
    Route::put('/{role}/unassign-permission/{permission}', 'RoleUnassignPermission')->name('roles.unassign.permission');
});

Route::group(['middleware' => ['permission:register-role']], function () {
    Route::get('/create', 'RoleCreate')->name('roles.create');
    Route::post('/', 'RoleStore')->name('roles.store');
});

Route::group(['middleware' => ['permission:update-role']], function () {
    Route::get('/{role}/edit', 'RoleEdit')->name('roles.edit');
    Route::put('/{role}', 'RoleUpdate')->name('roles.update');
});

Route::group(['middleware' => ['permission:read-role']], function () {
    Route::get('/list', 'RoleIndex')->name('roles.index');
    Route::get('/{role}', 'RoleShow')->name('roles.show');
});

Route::group(['middleware' => ['permission:delete-role']], function () {
    Route::delete('/{role}', 'RoleDestroy')->name('roles.destroy');
});
