<?php

namespace Naventum\NaventumAuth\Illuminate\Foundation\Controllers;

use Naventum\Framework\Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout()
    {
        Auth::logout();

        return redirect('/auth/login');
    }
}
