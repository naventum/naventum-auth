<?php

namespace Naventum\NaventumAuth\Illuminate\Foundation\Controllers;

use App\Providers\AppServiceProvider;
use Naventum\Framework\Illuminate\Support\Facades\Auth;
use Naventum\Framework\Illuminate\Support\View;
use Ryodevz\Validator\Support\Facade\Validator;

class LoginController extends Controller
{
    public function index()
    {
        return View::make('auth/login', $this->paths['view_path']);
    }

    public function login()
    {
        $validator = Validator::make(request()->all(), [
            'username' => 'required',
            'password' => 'required',
        ])->validate();

        if (!$validator->fails()) {
            if (Auth::attempt(request()->only(['username', 'password']))) {
                return redirect(AppServiceProvider::HOME);
            }

            return redirect('/auth/login', ['errors' => ['Wrong username or password.']]);
        }

        return redirect('/auth/login', ['errors' => $validator->all()]);
    }
}
