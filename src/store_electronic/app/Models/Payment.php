<?php

// app/Models/Payment.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'tbl_payment';
    protected $primaryKey = 'payment_id';
    public $timestamps = true;

    protected $fillable = [
        'payment_method', 'payment_status'
    ];
}
