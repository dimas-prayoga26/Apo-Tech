<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use AuthenticatesUsers;
use App\Models\StatusUser;
use App\Models\UserApotech;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use Illuminate\Contracts\Session\Middleware\AuthenticatesSessions;

// AuthenticatesSessions

class AuthController extends Controller
{
    public function index(){
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function create(Request $request){
        
        $request->validate([
            'email'     => 'required|unique:users',
            'username'  => 'required|unique:users|min:5',
            'password'  => 'required|min:8'
        ]);

        try {
            DB::beginTransaction();

            $user = User::create([
                'status_user_id'    => StatusUser::where('name', 'unverified')->first()->id,
                'username'          => $request->username,
                'email'             => $request->email,
                'password'          => bcrypt($request->password)
            ])->assignRole('buyer');

            $userAptech = UserApotech::create([
                'user_id'        => $user->id,
                // 'first_name'     => $request->first_name,
                // 'last_name'      => $request->last_name,
                // 'phone_number'   => $request->phone_number,
                'registered_at'  => now()
            ]);

            // dd($user , $userAptech);

            Mail::send('mail.activation', ['userAptech' => $userAptech, 'user' => $user], function($mail) use($user, $request) {
                $mail->subject('Account Activation');
                $mail->to($request->email, $request->username);
            });

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
        }

        // return view('verifyAccount')->with('user', $user);
        return view('verifyAccount')->with([
            'user' => $user,
            'success' => 'Aktivasi Akun Berhasil Terkirim!'
        ]);
        



    }

    public function authenticate(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email:dns'],
        'password' => ['required']
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // Refresh user roles
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            $user->syncRoles(['admin']);
            return redirect()->route('dashboard');
        } elseif ($user->hasRole('seller')) {
            $user->syncRoles(['seller']);
            return redirect()->route('dashboard');
        } elseif ($user->hasRole('buyer')) {
            $user->syncRoles(['buyer']);
            return redirect()->route('dashboard');
        } elseif ($user->hasRole('courier')) {
            $user->syncRoles(['courier']);
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('auth.login');
        }
    }

    return redirect()->back()->with('error', 'Invalid login');
}


    public function accountActivation($id, $rand)
    {
        $user = User::find($id);

        if($user){
            // $status = StatusUser::where('name', 'verified')->first();
            $user->update([
                // 'status_user_id'    => $status->id,
                'email_verified_at' => Carbon::now(),
            ]);

            return redirect()->route('success_verification')->with('success', 'Aktivasi Akun berhasil!');
        }

        return redirect()->route('auth.login')->with('error', 'Akun tidak ditemukan');
    }

    public function mailSend(Request $request){
        $request->validate(['email' => 'required|email']);
        $status = Password::sendResetLink(
            $request->only('email')
        );
        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }

    public function passwordReset(Request $request){
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
    
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => bcrypt($password)
                ])->setRememberToken(Str::random(60));
    
                $user->save();
    
                event(new PasswordReset($user));
            }
        );

        if($status) {
            $request->session()->forget('login_attempts');
            $request->session()->forget('last_login_attempt');
        }
    
        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('auth.login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }
    
}
