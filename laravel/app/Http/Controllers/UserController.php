<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginValidation;
use App\Http\Requests\RegisterValidation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(){
        return view('users.register');
    }

    public function registerPost(RegisterValidation $registerValidation){
        $request = $registerValidation->validated();
        $request['password'] = Hash::make($request['password']);
        User::create($request);
        return redirect()->route('login');
    }

    public function login(){
        return view('users.login');
    }

    public function loginPost(LoginValidation $loginValidation){
        if (Auth::attempt($loginValidation->validated())){
            $loginValidation->session()->regenerate();
            return back();
        }
        return back()->withErrors(['error' => 'Логин или пароль не верный']);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->regenerate();
        return redirect()->route('login');
    }
}
