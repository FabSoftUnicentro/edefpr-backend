<?php

// Role routes
$this->group(['middleware' => ['permission:assign-role-permission']], function () {
    $this->get('/{role}/permissions', 'RoleAllPermissions')->name('roles.permissions');
    $this->get('/assign', 'RolePermission')->name('roles.change.permissions');
    $this->put('/{role}/assign-permission/{permission}', 'RoleAssignPermission')->name('roles.assign.permission');
});

$this->group(['middleware' => ['permission:unassign-role-permission']], function () {
    $this->put('/{role}/unassign-permission/{permission}', 'RoleUnassignPermission')->name('roles.unassign.permission');
});

$this->group(['middleware' => ['permission:register-role']], function () {
    $this->get('/create', 'RoleCreate')->name('roles.create');
    $this->post('/', 'RoleStore')->name('roles.store');
});

$this->group(['middleware' => ['permission:update-role']], function () {
    $this->get('/{role}/edit', 'RoleEdit')->name('roles.edit');
    $this->put('/{role}', 'RoleUpdate')->name('roles.update');
});

$this->group(['middleware' => ['permission:read-role']], function () {
    $this->get('/list', 'RoleIndex')->name('roles.index');
    $this->get('/{role}', 'RoleShow')->name('roles.show');
});

$this->group(['middleware' => ['permission:delete-role']], function () {
    $this->delete('/{role}', 'RoleDestroy')->name('roles.destroy');
});
