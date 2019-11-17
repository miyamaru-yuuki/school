<?php

Route::get('/', 'SchoolController@index');
Route::get('seiseki/{tid}', 'SchoolController@seiseki');