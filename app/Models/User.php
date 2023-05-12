<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Traits\Uuid;
use App\Models\Guest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, Uuid, HasRoles, CanResetPassword;

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public $incrementing = false;

    protected $keyType = 'string';

    public function status_user()
    {
        return $this->belongsTo(StatusUser::class);
    }

    public function admin()
    {
        return $this->hasOne(Admin::class);
    }

    public function courier()
    {
        return $this->hasOne(Courier::class);
    }
}
