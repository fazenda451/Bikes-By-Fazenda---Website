<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'rec_address',
        'phone',
        'user_id',
        'product_id',
        'motorcycle_id',
        'quantity',
        'status',
        'payment_status',
        'order_number',
        'is_motorcycle',
        'delivery_method',
        'store_location',
        'points_used',
        'size'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function motorcycle()
    {
        return $this->belongsTo(Motorcycle::class);
    }
}
