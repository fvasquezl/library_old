<?php


Route::get('posts', 'ListPostsController')->name('posts.index');
Route::get('posts/{post}', 'ShowPostController')->name('posts.show');