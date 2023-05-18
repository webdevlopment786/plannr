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

    public function loginPost(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/')
                        ->withSuccess('Signed in');
        }
  
        return redirect("auth/login")->withErrors('Login details are not valid');
    }

    public function logOut() {
        Session::flush();
        Auth::logout();
        return Redirect('auth/login');
    }

    public function getUser(Request $request)
    {
        dd('dssfdsf');
        $userGet = User::get();
        return view('pages.tables.data-table', compact('userGet'));
    }

}
