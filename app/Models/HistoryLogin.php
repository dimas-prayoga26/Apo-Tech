<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HistoryLogin extends Model
{
    use HasFactory;


    // In Laravel 6.0+ make sure to also set $keyType

    protected $table = 'history_login';

    protected $guarded = [];

}
