<?php

// MyFiles routes
Route::group(['middleware' => 'auth'], function () {
    Route::get('/list', 'MyFilesIndex')->name('myFiles.index');
    Route::post('/upload', 'MyFilesStore')->name('myFiles.store');
    Route::get('/download/{file}', 'MyFilesDownload')->name('myFiles.download');
    Route::delete('/{file}', "MyFilesDestroy")->name('myFiles.destroy');
});
