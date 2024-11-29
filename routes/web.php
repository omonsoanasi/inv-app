<?php

use App\Livewire\AccountProfile;
use App\Livewire\Activities;
use App\Livewire\ActivityPage;
use App\Livewire\Bep20Usdt;
use App\Livewire\Bnb;
use App\Livewire\CustRecharge;
use App\Livewire\CustTeam;
use App\Livewire\CustWithdraw;
use App\Livewire\ProActivities;
use App\Livewire\SystemAdministration\AccessControl;
use App\Livewire\SystemAdministration\Cms;
use App\Livewire\SystemAdministration\Dashboard\AdminDashboard;
use App\Livewire\SystemAdministration\Dashboard\ChatResponse;
use App\Livewire\SystemAdministration\Dashboard\Index;
use App\Livewire\SystemAdministration\Deposits\ConfirmBep20Payment;
use App\Livewire\SystemAdministration\Deposits\ConfirmBnbPayment;
use App\Livewire\SystemAdministration\Deposits\ConfirmTrc20Payment;
use App\Livewire\SystemAdministration\Deposits\DepositIndex;
use App\Livewire\SystemAdministration\SystemConfigs;
use App\Livewire\SystemAdministration\Withdrawals\CompleteWithdrawal;
use App\Livewire\SystemAdministration\Withdrawals\CustomerWithdrawals;
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
    Route::get('/app-index', Index::class)->name('app-index')->middleware('role:System Administrator');
    Route::get('/app-dashboard', AdminDashboard::class)->name('app-dashboard')->middleware('role:System Administrator');
    Route::get('/access-control', AccessControl::class)->name('access-control');
    Route::get('/cms', Cms::class)->name('cms')->middleware('role:System Administrator');

    Route::get('cust-recharge', CustRecharge::class)->name('cust-recharge');
    Route::get('/trc20-usdt', Trc20Usdt::class)->name('trc20-usdt');
    Route::get('/bep20-usdt', Bep20Usdt::class)->name('bep20-usdt');
    Route::get('bnb', Bnb::class)->name('bnb');
    Route::get('/cust-withdraw', CustWithdraw::class)->name('cust-withdraw');
    Route::get('/account-profile', AccountProfile::class)->name('account-profile');
    Route::get('/cust-team', CustTeam::class)->name('cust-team');

    Route::get('/deposit-index', DepositIndex::class)->name('deposit-index')->middleware('role:System Administrator');
    Route::get('/system-configs', SystemConfigs::class)->name('system-configs')->middleware('role:System Administrator');
    Route::get('/Trc20usdt-instructions', Trc20Usdt::class)->name('Trc20usdt-instructions')->middleware('role:System Administrator');

    Route::get('confirm-trc20-payment/{id}', ConfirmTrc20Payment::class)->name('confirm-trc20-payment')->middleware('role:System Administrator');
    Route::get('confirm-bep20-payment/{id}', ConfirmBep20Payment::class)->name('confirm-bep20-payment')->middleware('role:System Administrator');
    Route::get('confirm-bnb-payment/{id}', ConfirmBnbPayment::class)->name('confirm-bnb-payment')->middleware('role:System Administrator');

    Route::get('customer-withdrawals', CustomerWithdrawals::class)->name('customer-withdrawals')->middleware('role:System Administrator');
    Route::get('complete-withdrawal/{id}', CompleteWithdrawal::class)->name('complete-withdrawal')->middleware('role:System Administrator');
    Route::get('/chat-response/{id}', ChatResponse::class)->name('chat-response')->middleware('role:System Administrator');

    Route::get('activity-page/{id}', ActivityPage::class)->name('activity-page');
    Route::get('/pro-activities', ProActivities::class)->name('pro-activities');
    Route::get('/activities', Activities::class)->name('activities');
});

require __DIR__.'/auth.php';
