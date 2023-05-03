<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected function auth(Request $request){
        $loginData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt($loginData)){
            $token = Auth::user()->createToken('authToken')->plainTextToken;
            $user = array_merge(Auth::user()->toArray(), ['token' => $token]);
            return $this->okResponse('Login berhasil!', $user);
        }
        
        return $this->unauthenticatedResponse('Login Gagal!');
    }
}
