<?php

// Process routes
Route::group(['middleware' => ['permission:open-process']], function () {
    Route::get('/create', 'ProcessCreate')->name('processes.create');
    Route::post('/', 'ProcessStore')->name('processes.store');
});

Route::group(['middleware' => ['permission:update-process']], function () {
    Route::get('/{process}/edit', 'ProcessEdit')->name('processes.edit');
    Route::put('/{process}', 'ProcessUpdate')->name('processes.update');

    Route::get('/{process}/witnesses', 'ProcessListWitness')->name('processes.getWitness');
    Route::put('/{process}/set-witness', 'ProcessSetWitness')->name('processes.setWitness');
    Route::put('/{process}/unset-witness/{witness}', 'ProcessUnsetWitness')->name('processes.unsetWitness');

    Route::get('{process}/petition', 'ProcessListPetition')->name('processes.petition');
    Route::get('{process}/petition/{file}', 'ProcessGetPetition')->name('processes.petitionDownload');
    Route::post('{process}/petition', 'ProcessSetPetition')->name('processes.petitionUpload');
    Route::delete('{process}/petition/{file}', 'ProcessUnsetPetition')->name('processes.petitionDestroy');
});

Route::group(['middleware' => ['permission:read-process']], function () {
    Route::get('/list', 'ProcessIndex')->name('processes.index');
    Route::get('/{process}', 'ProcessShow')->name('processes.show');
});

Route::group(['middleware' => ['role:master']], function () {
    Route::delete('/{process}', 'ProcessDestroy')->name('processes.destroy');
});
