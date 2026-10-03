<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.store');

Route::get('/admin/login', [AdminController::class, 'login'])
    ->name('admin.login');

Route::post('/admin/login', [AdminController::class, 'authenticate'])
    ->name('admin.authenticate');

Route::get('/admin', [AdminController::class, 'index'])
    ->name('admin.index');

Route::post('/admin/logout', [AdminController::class, 'logout'])
    ->name('admin.logout');