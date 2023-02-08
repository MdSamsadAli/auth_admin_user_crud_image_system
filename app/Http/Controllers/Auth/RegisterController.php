<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function registerForm()
    {
        if(auth()->check()){
            return redirect()->route('admin.dashboard');
        }
        return view('auth.register');
    }

    public function registerUser(RegisterRequest $request)
    {
        $user = $request->all();
        if(User::create($user)){
            return redirect()->route('auth.login');
        }
    }

}
