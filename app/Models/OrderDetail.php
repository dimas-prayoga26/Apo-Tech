<?php

namespace App\Models;

use App\Traits\Uuid;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderDetail extends Model
{
    use HasFactory, Uuid;

    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';

    protected $guarded = [];

    protected $table = 'orders_details';

    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function product(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

}
