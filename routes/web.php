<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\DashboardController;

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

Route::prefix('admin')->middleware(['admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('services', ServiceController::class)->names('admin.services');
    Route::resource('users', UserController::class)->names('admin.users');
    Route::resource('contacts', ContactController::class)->names('admin.contacts');
});
Route::post('/contact/submit', [ContactController::class, 'store'])->name('contact.store');


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

// Admin Auth Routes
Route::get('admin/login', [App\Http\Controllers\Admin\AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [App\Http\Controllers\Admin\AuthController::class, 'login']);
Route::post('admin/logout', [App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('admin.logout');
