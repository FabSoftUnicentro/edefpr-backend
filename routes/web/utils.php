<?php

Route::group(['middleware'], function () {
    Route::post('city/list/{uf}', 'CityList')->name('utils.get_cities');
});
