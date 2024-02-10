<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

        Route::get('/', function () {
            return view('auth/login');
        });

        Auth::routes();

        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::resource("book",BookController::class);

        Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact.index');
        Route::post('/store', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');
});
