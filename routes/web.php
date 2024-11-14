<?php

use App\Livewire\AccountProfile;
use App\Livewire\ActivityPage;
use App\Livewire\Bep20Usdt;
use App\Livewire\Bnb;
use App\Livewire\CustRecharge;
use App\Livewire\CustTeam;
use App\Livewire\CustWithdraw;
use App\Livewire\SystemAdministration\AccessControl;
use App\Livewire\SystemAdministration\Cms;
use App\Livewire\SystemAdministration\Dashboard\AdminDashboard;
use App\Livewire\SystemAdministration\Dashboard\Index;
use App\Livewire\SystemAdministration\SystemConfigs;
use App\Livewire\Trc20Usdt;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::view('/', 'welcome')->name('welcome');
Route::view('/mobile', 'mobile');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

//Route::view('/', 'dashboard')->name('dashboard');

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
    Route::get('cust-recharge', CustRecharge::class)->name('cust-recharge');
    Route::get('/trc20-usdt', Trc20Usdt::class)->name('trc20-usdt');
    Route::get('/bep20-usdt', Bep20Usdt::class)->name('bep20-usdt');
    Route::get('bnb', Bnb::class)->name('bnb');
    Route::get('/cust-withdraw', CustWithdraw::class)->name('cust-withdraw');
    Route::get('/account-profile', AccountProfile::class)->name('account-profile');
    Route::get('/cust-team', CustTeam::class)->name('cust-team');

    Route::get('system-configs', SystemConfigs::class)->name('system-configs');
    Route::get('/Trc20usdt-instructions', Trc20Usdt::class)->name('Trc20usdt-instructions');

    Route::get('activity-page/{id}', ActivityPage::class)->name('activity-page');
});

require __DIR__.'/auth.php';
