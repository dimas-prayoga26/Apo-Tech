<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserApotech extends Model
{
    use HasFactory, Uuid;

    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';

    protected $guarded = [];

    public function user_type()
    {
        return $this->belongsTo(UserType::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function addressess()
    {
        return $this->hasMany(Address::class, 'user_apotech_id', 'id');
    }

    public function statusVerification()
    {
        $licenses = $this->licenses;
        $status_user = $this->user->status_user->name;

        if ($licenses && $status_user === 'verified') {
            return '<strong class="small text-success"> Verified <i
            class="fa-solid fa-circle-check"
            style="margin-left: 5px;"></i></strong>';
        } elseif ($licenses && $status_user === 'verification process') {
            return '<strong class="small text-warning"> Verification Process <i
            class="fa-solid fa-circle-info"
            style="margin-left: 5px;"></i></strong>';
        }  else {
            return '<strong class="small text-danger"> Unverified <i
            class="fa-solid fa-circle-info"
            style="margin-left: 5px;"></i></strong>';
        }
    }

    public function image()
    {
        if($this->image){
           return asset('storage/' . $this->image);
        }else{
            return asset('virtual/assets/img/default-user.webp');
        }
    }

    public function licenses()
    {
        if($this->licenses){
           return asset('storage/' . $this->licenses);
        }
    }
}
