<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/about', function () {
    return view('pages/about');
})->name('about');


Route::get('/services', function () {
    return view('pages/services');
})->name('services');


Route::get('/contact', function () {
    return view('pages/contact');
})->name('contact');

Route::middleware(['web'])->group(function () {

Route::post('/contact/send', [ContactController::class, 'sendContact'])->name('contactMail');

});