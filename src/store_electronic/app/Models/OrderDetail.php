<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $primaryKey = 'order_details_id';
    protected $fillable = [
        'order_id', 'product_id', 'order_details_quantity', 'product_name', 'product_price', 'product_color', 'product_storage', 'created_at', 'updated_at'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }
}
