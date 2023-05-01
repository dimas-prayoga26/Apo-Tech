<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Middleware\AuthenticatesSessions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Spatie\Permission\Models\Role;
use AuthenticatesUsers;

// AuthenticatesSessions

class AuthController extends Controller
{
    public function index(){
        return view('login');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // $user = Auth::user();
            // dd($user->roles);


            if (Auth::user()->hasRole('admin')) {
                dd('Hello admin');
            } elseif (Auth::user()->hasRole('seller')) {
                dd('Hello seller');
            } elseif (Auth::user()->hasRole('buyer')) {
                dd('Hello buyer');
            } else { 
                dd('hello kurir');
            }
        }

        return redirect()->back()->withErrors([ 'msg' => 'Invalid login credentials']);
    }

    protected function authenticated(){

    }
    
}
