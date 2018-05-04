<?php
Route::resource('areas','Admin\AreasController');
Route::get('level_parents/{id}', 'Admin\AreasController@getLevelParents');

Route::resource('users','Admin\UsersController');

Route::resource('posts','Admin\PostsController');

Route::resource('categories','Admin\CategoriesController');

Route::post('posts/{post}/document', 'Admin\DocumentsController@store')->name('posts.document.store');


Route::get('level_parents/{id}', 'Admin\AreasController@getLevelParents');