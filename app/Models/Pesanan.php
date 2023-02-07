<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $fillable = ['id', 'number', 'total_price', 'payment_status', 'snap_token', 'created_at', 'updated_at'];
}
