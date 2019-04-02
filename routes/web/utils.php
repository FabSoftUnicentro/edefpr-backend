<?php

Route::group(['middleware' => 'auth'], function () {
    Route::post('city/list/{uf}', 'CityList')->name('utils.get_cities');
});
