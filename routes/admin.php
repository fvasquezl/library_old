<?php
Route::resource('areas','Admin\AreasController');
Route::get('level_parents/{id}', 'Admin\AreasController@getLevelParents');

Route::resource('users','Admin\UsersController');

Route::resource('documents','Admin\DocumentsController');

Route::resource('categories','Admin\CategoriesController');

Route::post('documents/{document}/pdf', 'Admin\PdfController@store')->name('documents.pdf.store');

Route::get('level_parents/{id}', 'Admin\AreasController@getLevelParents');