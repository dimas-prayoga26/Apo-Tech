<?php

namespace App\Models;

use App\Traits\Uuid;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductImage extends Model
{
    use HasFactory, Uuid;

    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $guarded = [];

    protected $appends = ['image_url'];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    protected function getImageUrlAttribute($value)
    {
        return url($this->image);
    }
}
