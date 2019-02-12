<?php


use Illuminate\Http\Request;



Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'School\ApiController@login');


    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'School\ApiController@logout');
        Route::get('getStudentInfo', 'School\ApiController@getStudentInfo');
    });
});
