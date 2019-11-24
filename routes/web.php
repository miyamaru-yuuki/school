<?php

Route::get('/', 'SchoolController@index');
Route::get('seiseki/{tid}', 'SchoolController@seiseki');
Route::get('kobetuseiseki/{seitoid}', 'SchoolController@kobetuseiseki');

SELECT name FROM seito INNER JOIN kekka ON seito.seitoid=kekka.seitoid INNER JOIN test ON kekka.tid=test.tid WHERE kekka.kokugo=(SELECT MAX(kekka.kokugo) FROM kekka) AND test.tid=1