<?php


Route::get('posts', 'ListPostsController')->name('posts.index');
Route::get('posts/show/{post}', 'ShowPostController')->name('posts.show');