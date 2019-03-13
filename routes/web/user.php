<?php

// User routes
$this->get('/me', 'UserInfo')->name('user.profile');
$this->put('/me', 'UserInfoUpdate')->name('user.profile.update');

$this->group(['middleware' => ['permission:register-employee']], function () {
    $this->get('/create', 'UserCreate')->name('users.create');
    $this->post('/', 'UserStore')->name('users.store');
});

$this->group(['middleware' => ['permission:assign-user-permission']], function () {
    $this->get('/{user}/permissions', 'UserAllPermissions')->name('users.permissions');
    $this->get('/assign', 'UserPermission')->name('users.change.permissions');
    $this->put('/{user}/assign-permission/{permission}', 'UserAssignPermission')->name('users.assign.permission');
});

$this->group(['middleware' => ['permission:unassign-user-permission']], function () {
    $this->put('/{user}/unassign-permission/{permission}', 'UserUnassignPermission')->name('users.unassign.permission');
    ;
});

$this->group(['middleware' => ['permission:assign-user-role']], function () {
    $this->put('/{user}/assign-role/{role}', 'UserAssignRole')->name('users.assign.role');
});

$this->group(['middleware' => ['permission:unassign-user-role']], function () {
    $this->put('/{user}/unassign-role/{role}', 'UserUnassignRole')->name('users.assign.role');
});

$this->group(['middleware' => ['permission:update-employee']], function () {
    $this->get('/{user}/edit', 'UserEdit')->name('users.edit');
    $this->put('/{user}', 'UserUpdate')->name('users.update');
});

$this->group(['middleware' => ['permission:read-employee']], function () {
    $this->get('/list', 'UserList')->name('users.list');
    $this->get('/', 'UserIndex')->name('users.index');
    $this->get('/{user}', 'UserShow')->name('users.show');
});

$this->group(['middleware' => ['permission:delete-employee']], function () {
    $this->delete('/{user}', 'UserDestroy')->name('users.destroy');
});
