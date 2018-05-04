<?php
Route::resource('areas','Admin\AreasController');
Route::get('level_parents/{id}', 'Admin\AreasController@getLevelParents');

Route::resource('users','Admin\UsersController')->except('create');;
Route::resource('posts','Admin\PostsController')->except('create');
Route::resource('categories','Admin\CategoriesController');


Route::post('posts/{post}/document', 'Admin\DocumentsController@store')->name('posts.document.store');
Route::delete('documents/{document}','Admin\DocumentsController@destroy')->name('documents.destroy');


Route::get('level_parents/{id}', 'Admin\AreasController@getLevelParents');