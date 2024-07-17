<?php

// app/Models/Shipping.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $table = 'tbl_shipping';
    protected $primaryKey = 'shipping_id';
    public $timestamps = true;

    protected $fillable = [
        'shipping_name', 'shipping_email', 'shipping_address', 'shipping_phone', 'shipping_note'
    ];
}
