<?php

Route::group(['middleware' => 'auth'], function () {
    Route::post('city/list/{uf}', 'City\CityList')->name('utils.get_cities');
});

Route::get('/page-not-found', 'Error\PageNotFound')->name('404');

Route::get('/internal-server-error', 'Error\InternalServerError')->name('500');

Route::post('/deploy/github', 'Deploy\Github')->name('deploy.github');
