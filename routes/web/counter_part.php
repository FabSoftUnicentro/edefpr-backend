<?php

// CounterPart routes
$this->group(['middleware' => ['permission:register-counterPart']], function () {
    $this->get('/create', 'CounterPartCreate')->name('counterParts.create');
    $this->post('/', 'CounterPartStore')->name('counterParts.store');
});

$this->group(['middleware' => ['permission:update-counterPart']], function () {
    $this->get('/{counterPart}/edit', 'CounterPartEdit')->name('counterParts.edit');
    $this->put('/{counterPart}', 'CounterPartUpdate')->name('counterParts.update');
});

$this->group(['middleware' => ['permission:register-counterPart']], function () {
    $this->get('/list', 'CounterPartIndex')->name('counterParts.index');
    $this->get('/{counterPart}', 'CounterPartShow')->name('counterParts.show');
});

$this->group(['middleware' => ['permission:delete-counterPart']], function () {
    $this->delete('/{counterPart}', 'CounterPartDestroy')->name('counterParts.destroy');
});
