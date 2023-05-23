<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use App\Models\StatusUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    protected function auth(Request $request){
        $request->validate([
            'email' => 'required|email', // phpcs:ignore ..DetectWeakValidation.Found
            'password' => 'required',
            'fcm_token' => 'nullable',
        ]);

        if(Auth::attempt($request->only('email', 'password'))){
            if ($request->filled('fcm_token')) {
                Auth::user()->update(['fcm_token' => $request->fcm_token]);
            }
            $token = Auth::user()->createToken('authToken')->plainTextToken;
            $user = array_merge(Auth::user()->toArray(), ['token' => $token]);
            return $this->okResponse('Login berhasil!', $user);
        }
        
        return $this->unauthenticatedResponse('Login Gagal!');
    }

    protected function register(Request $request){
        $request->validate([
            'email' => 'required|email',
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::create([
            'status_user_id' => StatusUser::where('name', 'unverified')->first()->id,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ])->assignRole('buyer');

        Mail::send('mail.activation', ['user' => $user], function($mail) use($user, $request) {
            $mail->subject('Account Activation');
            $mail->to($request->email, $request->username);
        });

        return $this->successResponse('Email verifikasi telah dikirimkan ke '.$request->email);
    }

    public function accountActivation($id, $rand)
    {
        $user = User::find($id);

        if($user){
            $user->markEmailAsVerified();
            return redirect()->to('/')->with('success', 'Aktivasi Akun berhasil!');
        }

        return redirect()->to('/')->with('error', 'Akun tidak ditemukan');
    }
}
