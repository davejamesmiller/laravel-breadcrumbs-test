<?php

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

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

// Route::get('/', function () {
//     return view('welcome');
// });

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
    $paginator = (new LengthAwarePaginator([], 100, 10))->setPath(Paginator::resolveCurrentPath());

    return view('category', compact('category', 'paginator'));
});

Route::name('post')->get('/post/{post}', function ($post) {
    return view('post', compact('post'));
});

Route::name('section')->get('/section', function () {
    return view('section');
});

Route::name('bootstrap2')->get('/bootstrap2', function () {
    return view('bootstrap2');
});

Route::name('bootstrap3')->get('/bootstrap3', function () {
    return view('bootstrap3');
});

Route::name('foundation6')->get('/foundation6', function () {
    return view('foundation6');
});

Route::name('materialize')->get('/materialize', function () {
    return view('materialize');
});

Route::name('print_r')->get('/print_r', function () {
    return view('print_r');
});

Route::get('/unnamed', function () {
    return view('unnamed');
});

Route::name('server-error')->get('/server-error', function () {
    abort(500);
});
