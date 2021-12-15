<?php

namespace Naventum\NaventumAuth\Illuminate\Foundation\Support;

use App\Http\Middleware\IsAuth;
use App\Http\Middleware\IsGuest;
use Naventum\NaventumAuth\Illuminate\Foundation\Controllers\LoginController;
use Naventum\NaventumAuth\Illuminate\Support\Features;
use Naventum\Framework\Illuminate\Support\Facades\Route as ServiceProvider;
use Naventum\NaventumAuth\Illuminate\Foundation\Controllers\LogoutController;
use Naventum\NaventumAuth\Illuminate\Foundation\Controllers\RegisterController;

class NaventumauthServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (Features::hasLogin()) {
            $this->get('/auth/login', [LoginController::class, 'index'])->middleware([IsGuest::class])->name('naventum.auth.login');
            $this->post('/auth/login', [LoginController::class, 'login'])->middleware([IsGuest::class])->name('naventum.auth.login.submit');

            $this->get('/auth/logout', [LogoutController::class, 'logout'])->middleware([IsAuth::class])->name('naventum.auth.logout');
        }

        if (Features::hasRegister()) {
            $this->get('/auth/register', [RegisterController::class, 'index'])->middleware([IsGuest::class])->name('naventum.auth.register');
            $this->post('/auth/register', [RegisterController::class, 'register'])->middleware([IsGuest::class])->name('naventum.auth.register.submit');
        }
    }
}
