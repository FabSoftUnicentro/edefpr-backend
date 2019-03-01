<?php

// Attendment routes
$this->group(['middleware' => ['permission:register-attendment']], function () {
    $this->get('/create', 'AttendmentCreate')->name('attendments.create');
    $this->post('/', 'AttendmentStore')->name('attendments.store');
});

$this->group(['middleware' => ['permission:update-attendment']], function () {
    $this->get('/{attendment}/edit', 'AttendmentEdit')->name('attendments.edit');
    $this->put('/{attendment}', 'AttendmentUpdate')->name('attendments.update');
});

$this->group(['middleware' => ['permission:list-attendment']], function () {
    $this->get('/list', 'AttendmentIndex')->name('attendments.index');
    $this->get('/{attendment}', 'AttendmentShow')->name('attendments.show');
});
$this->group(['middleware' => ['permission:delete-attendment']], function () {
    $this->delete('/{attendment}', 'AttendmentDestroy')->name('attendments.destroy');
});
