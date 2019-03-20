<?php

// User routes
Route::get('/me', 'UserInfo')->name('user.profile');
Route::put('/me', 'UserInfoUpdate')->name('user.profile.update');

Route::group(['middleware' => ['permission:register-employee']], function () {
    Route::get('/create', 'UserCreate')->name('users.create');
    Route::post('/', 'UserStore')->name('users.store');
});

Route::group(['middleware' => ['permission:assign-user-permission']], function () {
    Route::get('/{user}/permissions', 'UserAllPermissions')->name('users.permissions');
    Route::get('/assign', 'UserPermission')->name('users.change.permissions');
    Route::put('/{user}/assign-permission/{permission}', 'UserAssignPermission')->name('users.assign.permission');
});

Route::group(['middleware' => ['permission:unassign-user-permission']], function () {
    Route::put('/{user}/unassign-permission/{permission}', 'UserUnassignPermission')->name('users.unassign.permission');
    ;
});

Route::group(['middleware' => ['permission:assign-user-role']], function () {
    Route::put('/{user}/assign-role/{role}', 'UserAssignRole')->name('users.assign.role');
});

Route::group(['middleware' => ['permission:unassign-user-role']], function () {
    Route::put('/{user}/unassign-role/{role}', 'UserUnassignRole')->name('users.assign.role');
});

Route::group(['middleware' => ['permission:update-employee']], function () {
    Route::get('/{user}/edit', 'UserEdit')->name('users.edit');
    Route::put('/{user}', 'UserUpdate')->name('users.update');
});

Route::group(['middleware' => ['permission:read-employee']], function () {
    Route::get('/list', 'UserList')->name('users.list');
    Route::get('/', 'UserIndex')->name('users.index');
    Route::get('/{user}', 'UserShow')->name('users.show');
});

Route::group(['middleware' => ['permission:delete-employee']], function () {
    Route::delete('/{user}', 'UserDestroy')->name('users.destroy');
});
