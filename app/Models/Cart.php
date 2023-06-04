<?php

namespace App\Models;

use App\Models\User;
use App\Traits\Uuid;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory, Uuid;

    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';

    protected $guarded = [];

    protected $appends = ['image_url'];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function product(){
        return $this->hasOne(Product::class, 'id','product_id');
    }

    protected function getImageUrlAttribute($value)
    {
        return url($this->display_image);
    }
}
