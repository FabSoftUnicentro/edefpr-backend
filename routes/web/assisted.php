<?php

// Assisted routes
$this->group(['middleware' => ['permission:register-assisted']], function () {
    $this->get('/create', 'AssistedCreate')->name('assisteds.create');
    $this->post('/', 'AssistedStore')->name('assisteds.store');
});

$this->group(['middleware' => ['permission:update-assisted']], function () {
    $this->get('/{assisted}/edit', 'AssistedEdit')->name('assisteds.edit');
    $this->put('/{assisted}', 'AssistedUpdate')->name('assisteds.update');
});

$this->group(['middleware' => ['permission:read-assisted']], function () {
    $this->get('/list', 'AssistedIndex')->name('assisteds.index');
    $this->get('/{assisted}', 'AssistedShow')->name('assisteds.show');
});

$this->group(['middleware' => ['permission:delete-assisted']], function () {
    $this->delete('/{assisted}', 'AssistedDestroy')->name('assisteds.destroy');
});
