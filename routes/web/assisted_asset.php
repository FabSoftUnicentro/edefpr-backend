<?php

// Assisted asset routes
Route::group(['middleware' => ['permission:register-assisted']], function () {
    Route::get('/{assisted}/create', 'AssistedAssetCreate')->name('assistedAssets.create');
    Route::post('/{assisted}/', 'AssistedAssetStore')->name('assistedAssets.store');
});

Route::group(['middleware' => ['permission:update-assisted']], function () {
    Route::get('/{assistedAsset}/edit', 'AssistedAssetEdit')->name('assistedAssets.edit');
    Route::put('/{assistedAsset}', 'AssistedAssetUpdate')->name('assistedAssets.update');
});

Route::group(['middleware' => ['permission:read-assisted']], function () {
    Route::get('/{assisted}/list', 'AssistedAssetIndex')->name('assistedAssets.index');
});

Route::group(['middleware' => ['permission:delete-assisted']], function () {
    Route::delete('/{assistedAsset}', 'AssistedAssetDestroy')->name('assistedAssets.destroy');
});
