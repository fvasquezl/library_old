<?php


Route::get('posts', 'PostsController@index')->name('posts.index');
Route::get('posts/{post}', 'PostsController@show')->name('posts.show');