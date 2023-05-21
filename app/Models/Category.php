<?php

namespace App\Models;

use App\Traits\Uuid;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, Uuid;

    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';

    protected $guarded = [];

    protected $appends = ['image_url'];

    public function products(){
        return $this->hasMany(Product::class);
    }

    protected function getImageUrlAttribute($value)
    {
        return url($this->image);
    }
}
