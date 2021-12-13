<?php

namespace Naventum\NaventumAuth\Illuminate\Foundation\Controllers;

use App\Models\User;
use App\Providers\AppServiceProvider;
use Naventum\Framework\Illuminate\Support\Facades\Auth;
use Naventum\Framework\Illuminate\Support\Facades\Hash;
use Naventum\Framework\Illuminate\Support\View;
use Ryodevz\Validator\Support\Facade\Validator;

class RegisterController extends Controller
{
    public function index()
    {
        return View::make('auth/register', $this->paths['view_path']);
    }

    public function register()
    {
        $validator = Validator::make(request()->all(), [
            'username' => 'required|min:3',
            'password' => 'required|min:3|confirmed',
        ])->validate();

        if (!$validator->fails()) {
            User::insert([
                'username' => request()->username ?? null,
                'password' => Hash::make(request()->password ?? null),
            ]);

            if (Auth::attempt(['username' => request()->username, 'password' => request()->password])) {
                return redirect(AppServiceProvider::HOME);
            }
        }

        return redirect('/auth/register', ['errors' => $validator->all()]);
    }
}
