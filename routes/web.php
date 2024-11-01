<?php

use App\Livewire\SystemAdministration\AccessControl;
use App\Livewire\SystemAdministration\Cms;
use App\Livewire\SystemAdministration\Dashboard\AdminDashboard;
use App\Livewire\SystemAdministration\Dashboard\Index;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::view('/', 'welcome');
Route::view('/mobile', 'mobile');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::middleware('auth')->group(function () {
    Route::get('/app-index', Index::class)->name('app-index');
    Route::get('/app-dashboard', AdminDashboard::class)->name('app-dashboard');
    Route::get('/access-control', AccessControl::class)->name('access-control');
    Route::get('/cms', Cms::class)->name('cms');
});

require __DIR__.'/auth.php';
