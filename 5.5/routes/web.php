<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::bind('category', function ($id) {
    return new App\Category($id);
});

Route::bind('post', function ($id) {
    return new App\Post($id);
});

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/blog', function () {
    return view('blog');
})->name('blog');

Route::get('/category/{category}', function ($category) {
    return view('category', compact('category'));
})->name('category');

Route::get('/post/{post}', function ($post) {
    return view('post', compact('post'));
})->name('post');

Route::get('/bootstrap2', function () {
    return view('bootstrap2');
})->name('bootstrap2');

Route::get('/print_r', function () {
    return view('print_r');
})->name('print_r');
