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

Route::get('/', function () {
    return view('frontend.home');
});

Route::get('/home', function () {
    return view('frontend.home');
})->name('frontend.home');

Route::get('/about', function () {
    return view('frontend.about');
})->name('frontend.about');

Route::get('/product', function () {
    return view('frontend.product');
})->name('frontend.product');

Route::get('/distribution', function () {
    return view('frontend.distribution');
})->name('frontend.distribution');

Route::get('/service', function () {
    return view('frontend.service');
})->name('frontend.service');

Route::get('/news', function () {
    return view('frontend.news');
})->name('frontend.news');

Route::get('/news/in-news', function () {
    return view('frontend.in-news');
})->name('frontend.in-news');

Route::get('/contact', function () {
    return view('frontend.contact');
})->name('frontend.contact');

