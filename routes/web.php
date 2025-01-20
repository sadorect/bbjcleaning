<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\JobApplicationController;

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
    Route::post('/admin/contacts/{contact}/reply', [ContactController::class, 'reply'])
    ->name('admin.contacts.reply');
    

    Route::get('/applications', [JobApplicationController::class, 'index'])
         ->name('admin.applications.index');
    Route::get('/applications/{application}', [JobApplicationController::class, 'show'])
         ->name('admin.applications.show');
    Route::patch('/applications/{application}/status', [JobApplicationController::class, 'updateStatus'])
         ->name('admin.applications.update-status');
    Route::get('/admin/applications/{application}/preview/{type}', 
    [JobApplicationController::class, 'previewDocument'])
    ->name('admin.applications.preview');

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
Route::get('/careers', [CareerController::class, 'public'])->name('careers.public');
Route::get('/careers/index', [CareerController::class, 'index'])->name('careers.index');
Route::post('/careers/store', [CareerController::class, 'store'])->name('careers.store');
Route::get('/careers/track', [CareerController::class, 'showTrackingForm'])->name('careers.track');
Route::post('/careers/track', [CareerController::class, 'trackApplication'])->name('careers.track.status');


// Admin Auth Routes
Route::get('admin/login', [App\Http\Controllers\Admin\AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [App\Http\Controllers\Admin\AuthController::class, 'login']);
Route::post('admin/logout', [App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('admin.logout');
