<?php
Route::resource('areas','Admin\AreasController');
Route::get('level_parents/{id}', 'Admin\AreasController@getLevelParents');

Route::resource('users','Admin\UsersController');