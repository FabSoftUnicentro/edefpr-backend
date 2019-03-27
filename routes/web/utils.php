<?php

$this->group(['middleware' => ['permission:register-counterPart']], function () {
    $this->post('city/list/{uf}', 'CityList')->name('utils.get_cities');
});
