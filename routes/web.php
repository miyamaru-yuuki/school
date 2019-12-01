<?php

Route::get('/', 'SchoolController@index');
Route::get('seiseki/{tid}', 'SchoolController@seiseki');
Route::get('kobetuseiseki/{seitoid}', 'SchoolController@kobetuseiseki');

Route::post('/testaddkakunin', 'SchoolController@testaddkakunin');
Route::post('/testaddkanryou', 'SchoolController@testaddkanryou');
Route::post('/seisekiaddkakunin', 'SchoolController@seisekiaddkakunin');
Route::post('/seisekiaddkanryou', 'SchoolController@seisekiaddkanryou');