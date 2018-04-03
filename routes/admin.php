<?php
Route::resource('areas','Admin\AreaController');
Route::get('level_parents/{id}', 'Admin\AreaController@getLevelParents');