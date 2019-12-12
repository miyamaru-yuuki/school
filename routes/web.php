<?php

Route::get('/', 'SchoolController@index');
Route::get('seiseki/{tid}', 'SchoolController@seiseki');
Route::get('kobetuseiseki/{seitoid}', 'SchoolController@kobetuseiseki');
Route::get('tensuuhenkou/{kid}', 'SchoolController@tensuuhenkou');
Route::get('seitohenkou/{seitoid}', 'SchoolController@seitohenkou');
Route::get('seitodelkakunin/{seitoid}', 'SchoolController@seitodelkakunin');

Route::post('/testaddkakunin', 'SchoolController@testaddkakunin');
Route::post('/testaddkanryou', 'SchoolController@testaddkanryou');
Route::post('/seisekiaddkakunin', 'SchoolController@seisekiaddkakunin');
Route::post('/seisekiaddkanryou', 'SchoolController@seisekiaddkanryou');
Route::post('/seitoaddkakunin', 'SchoolController@seitoaddkakunin');
Route::post('/seitoaddkanryou', 'SchoolController@seitoaddkanryou');
Route::post('/seitohenkoukanryou', 'SchoolController@seitohenkoukanryou');
Route::post('/seitodelkanryou', 'SchoolController@seitodelkanryou');
Route::post('/tensuuhenkoukanryou', 'SchoolController@tensuuhenkoukanryou');

