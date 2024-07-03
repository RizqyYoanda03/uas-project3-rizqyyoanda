<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function register(){
        return view('register');
    }

    public function simpan(Request $request){
       $user = User::create([
        'username'=> $request->username,
        'password'=>$request->password,
        'email'=>$request->email,
        'role'=>$request->role,
       ]);

       event(new Registered($user));

       Auth::login($user);

       return redirect('/dashboard');
    }
}
