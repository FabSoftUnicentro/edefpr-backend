<?php

// Permission Routes
$this->group(['middleware' => ['permission:register-permission']], function () {
    $this->get('/create', 'PermissionCreate')->name('permissions.create');
    $this->post('/', 'PermissionStore')->name('permissions.store');
});

$this->group(['middleware' => ['permission:update-permission']], function () {
    $this->get('/{permission}/edit', 'PermissionEdit')->name('permissions.edit');
    $this->put('/{permission}', 'PermissionUpdate')->name('permissions.update');
});

$this->group(['middleware' => ['permission:list-permission']], function () {
    $this->get('/', 'PermissionWithoutPagination')->name('permissions.list');
    $this->get('/list', 'PermissionIndex')->name('permissions.index');
    $this->get('/{permission}', 'PermissionShow')->name('permissions.show');
});

$this->group(['middleware' => ['permission:delete-permission']], function () {
    $this->delete('/{permission}', 'PermissionDestroy')->name('permissions.destroy');
});
