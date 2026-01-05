<?php

use App\Livewire\UserCreate;
use App\Livewire\UserLogin;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'secretary'], function () {
    route::get('user/create', UserCreate::class)->name('user.create');
});
Route::group(['prefix' => 'user'], function () {
    Route::middleware(['guest'])->group(function () {
        route::get('login', UserLogin::class)->name('user.login');
    });
});
