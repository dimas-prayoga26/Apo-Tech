<?php

namespace App\Models;

use App\Traits\Uuid;
use App\Models\Address;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserApotech extends Model
{
    use HasFactory, Uuid;

    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';

    protected $guarded = [];

    protected $appends = ['image_url'];

    public function user_type()
    {
        return $this->belongsTo(UserType::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    protected function getImageUrlAttribute($value)
    {
        return url($this->image);
    }
}
