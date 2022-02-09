<?php

use Illuminate\Support\Facades\Route;
use Spatie\Activitylog\Models\Activity;


Route::get('/', function () {

    return view('welcome');
});


Route::get('/email', 'EmailController@create');
Route::post('/email', 'EmailController@sendEmail')->name('send.email');

Route::resource('products', 'ProductController');

Route::get('send-mail', 'HomeController@sendMail');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
