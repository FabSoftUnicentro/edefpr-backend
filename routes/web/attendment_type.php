<?php

// AttendmentType routes
$this->group(['middleware' => ['permission:register-attendmentType']], function () {
    $this->get('/create', 'AttendmentTypeCreate')->name('attendmentTypes.create');
    $this->post('/', 'AttendmentTypeStore')->name('attendmentTypes.store');
});

$this->group(['middleware' => ['permission:update-attendmentType']], function () {
    $this->get('/{attendmentType}/edit', 'AttendmentTypeEdit')->name('attendmentTypes.edit');
    $this->put('/{attendmentType}', 'AttendmentTypeUpdate')->name('attendmentTypes.update');
});

$this->group(['middleware' => ['permission:list-attendmentType']], function () {
    $this->get('/list', 'AttendmentTypeIndex')->name('attendmentTypes.index');
    $this->get('/{attendmentType}', 'AttendmentTypeShow')->name('attendmentTypes.show');
});

$this->group(['middleware' => ['permission:delete-attendmentType']], function () {
    $this->delete('/{attendmentType}', 'AttendmentTypeDestroy')->name('attendmentTypes.destroy');
});
