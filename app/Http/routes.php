<?php

//set routes for Api
Route::group(['namespace' => 'Api', 'prefix' => 'api/v1'], function(){
    //set Api version
    Route::group(['namespace' => 'V1'], function(){
        Route::get('data', 'DataController@store');
        Route::post('data', 'DataController@store');

    });
});
