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

Route::name('home')->get('/', function () {
    return view('home');
});

Route::name('blog')->get('/blog', function () {
    return view('blog');
});

Route::name('category')->get('/category/{category}', function ($category) {
    return view('category', compact('category'));
});

Route::name('post')->get('/post/{post}', function ($post) {
    return view('post', compact('post'));
});

Route::name('bootstrap2')->get('/bootstrap2', function () {
    return view('bootstrap2');
});

Route::name('print_r')->get('/print_r', function () {
    return view('print_r');
});
