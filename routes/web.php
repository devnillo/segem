<?php

declare(strict_types=1);

use App\Http\Middleware\CheckAdmin;
use App\Livewire\Admin\AdminDashboard;
use App\Livewire\Admin\AdminRegister;
use App\Livewire\Admin\School\SchoolRegister;
use App\Livewire\Admin\Secretary\AdminSecretary;
use App\Livewire\Admin\Secretary\SecretaryRegister;
use App\Livewire\Admin\Secretary\SecretaryUpdate;
use App\Livewire\AdminUserRegister;
use App\Livewire\ListSecretaries;
use App\Livewire\Secretary\SecretaryDashboard;
use App\Livewire\ShowSecretary;
use App\Livewire\UserLogin;
use Illuminate\Support\Facades\Route;

//route::get('login', UserLogin::class)->name('user.login');

Route::group(['prefix' => 'secretary'], function () {
    Route::middleware(['auth'])->group(function () {
        route::get('dashboard', SecretaryDashboard::class)->name('secretary.dashboard');
    });

});

Route::group(['prefix' => 'admin'], function () {
//    Route::get('register', AdminRegister::class)->name('admin.register');
    Route::group(['middleware' => [CheckAdmin::class]], function () {
//        Route::get('user/register', AdminUserRegister::class)->name('admin.user.register');

        Route::get('dashboard', AdminDashboard::class)->name('admin.dashboard');

        Route::group(['prefix' => 'secretary'], function () {
            Route::get('', AdminSecretary::class)->name('admin.secretary');

//            Route::get('all', ListSecretaries::class)->name('admin.secretary.all');
//            Route::get('{secretaryId}', ShowSecretary::class)->name('admin.secretary.show');
            Route::get('update/{secretaryId}', SecretaryUpdate::class)->name('admin.secretary.update');

            Route::group(['prefix' => 'users'], function () {
                Route::get('', AdminSecretary::class)->name('admin.users');
            });

        });

        Route::group(['prefix' => 'school'], function () {
            Route::get('register', SchoolRegister::class)->name('admin.users');
        });
    });

});
// Route::group(['prefix' => 'user'], function () {

// });
