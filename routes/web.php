<?php

declare(strict_types=1);

use App\Livewire\Secretary\SecretaryDashboard;
use App\Livewire\UserLogin;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    route::get('login', UserLogin::class)->name('user.login');
});

Route::group(['prefix' => 'secretary'], function () {
    Route::middleware(['auth'])->group(function () {
        route::get('dashboard', SecretaryDashboard::class)->name('secretary.dashboard');
    });

});
// Route::group(['prefix' => 'user'], function () {

// });
