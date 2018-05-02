<?php


Route::get('documents', 'DocumentsController@index')->name('documents.index');
Route::get('documents/{document}', 'DocumentsController@show')->name('documents.show');