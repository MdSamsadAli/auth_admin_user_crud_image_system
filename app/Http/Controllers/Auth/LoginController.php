<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;
class LoginController extends Controller
{
    public function loginForm()
    {
        if(auth()->check()){
            return redirect()->route('admin.dashboard');
        }
        return view('auth.login');
    }

    public function authenticate(LoginRequest $request)
    {
        $credentials = [
            'email'=>$request->get('email'),
            'password'=>$request->get('password'),
        ];
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('admin/dashboard');
        }
 
        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ])->onlyInput('email');
    }

    public function logout()
    {
        if(Auth::check()){
            Auth::logout();
        }
        return redirect()->route('auth.login');
    }
    
}
