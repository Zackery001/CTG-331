<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\EmailVerify;
use App\Models\User;
use App\Models\UserVerification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;


class UserAuthController extends Controller
{
    //Register
    public function showRegister()
    {
        return view('users.auth.register');
    }

    //Function to make a user
    public function register()
    {
        DB::transaction(function(){

            //Validating entered information
            $this->validate(request(), [
                'username' => 'required|alpha_dash|unique:users,username',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed',
            ]);

            //Creating user 
            $user = User::create([
                'username' => request('username'),
                'email' => request('email'),
                'password' => bcrypt(request('password'))
            ]);

            $token =  sha1(rand(1000, 9999));
            $user->verify()->create(['token' => $token]); //Generating token

            Mail::to(\request('email'))->send(new EmailVerify($user->id, $token)); //Sending mail

        });

        return redirect()->route('login.show')->with('type', 'success')->with('message', 'Your account has been successfully created! Check your mail to verify your account. <a href="https://mail.google.com/">Click me</a>.');
    }

    //Login
    public function showLogin()
    {
        return view('users.auth.login');
    }

    //Logging user in
    public function login()
    {
        $this->validate(\request(),[
            'username' =>'required',
            'password' =>'required'
        ]);

        if(Auth::attempt([
            'username' => \request('username'),
            'password' => \request('password')

        ])){
            return redirect()->route('welcome');
        }else{
            return redirect()->back()->with('type', 'danger')->with('message', 'Invalid username or password');
        }
    }

    //Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.show')->with('type', 'warning')->with('message', 'You have been logged out, please log in again');
    }

    //Verifying user account
    public function verify($userId, $token)
    {
        $findUser = UserVerification::where('user_id',$userId)->where('token',$token);
        if ($findUser->count() == 1) {
            $findUser->delete();
            User::findOrFail($userId)->update([
                'verified' => '1'
            ]);
        return redirect()->route('login.show')->with('type', 'success')->with('message', 'Your account has been successfully verified! You can now log in');

        }else{
            return redirect('https://media.tenor.com/uyeLKxEDK8wAAAAC/what-confused.gif');
        }
    }
}
