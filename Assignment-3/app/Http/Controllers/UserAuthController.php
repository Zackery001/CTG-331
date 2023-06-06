<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    //Register
    public function showRegister()
    {
        return view('users.auth.register');
    }

    public function register( )
    {
        //Validating entered information
        $this->validate(request(), [
            'username' => 'required|alpha_dash|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
        ]);

        User::create([
            'username' => request('username'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        return redirect()->route('login.show')->with('message', 'Your aacount has been succesfully created! You can now log in');
    }

    //Login
    public function showLogin()
    {
        return view('users.auth.login');
    }

    public function login()
    {
        return 'Login Called!';
    }
}
