<?php

namespace Naventum\NaventumAuth\Illuminate\Foundation\Support;

use App\Http\Middleware\isAuth;
use App\Http\Middleware\isGuest;
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
        if (Features::login()) {
            $this->get('/auth/login', [LoginController::class, 'index'])->middleware([isGuest::class])->name('naventum.auth.login');
            $this->post('/auth/login', [LoginController::class, 'login'])->middleware([isGuest::class])->name('naventum.auth.login.submit');

            $this->get('/auth/logout', [LogoutController::class, 'logout'])->middleware([isAuth::class])->name('naventum.auth.logout');
        }

        if (Features::register()) {
            $this->get('/auth/register', [RegisterController::class, 'index'])->middleware([isGuest::class])->name('naventum.auth.register');
            $this->post('/auth/register', [RegisterController::class, 'register'])->middleware([isGuest::class])->name('naventum.auth.register.submit');
        }
    }
}
