<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginControllers extends Controller
{
    public function login()
    {
        return view('pages.auth.login');
    }

    public function loginPost(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $user = user::where('email',$request->email)->first();
        
        // if($user->role == 'admin') {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                return redirect()->intended('/')
                            ->withSuccess('Signed in');
            }
        // }
        // else {
            // return redirect()->back()->with('error', 'You are not an admin.');
        // }
        return redirect("auth/login")->with('error','Login details are not valid');
    }

    public function logOut() 
    {
        Session::flush();
        Auth::logout();
        return Redirect('auth/login');
    }
}
