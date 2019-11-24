<?php

Route::get('/', 'SchoolController@index');
Route::get('seiseki/{tid}', 'SchoolController@seiseki');
Route::get('kobetuseiseki/{seitoid}', 'SchoolController@kobetuseiseki');