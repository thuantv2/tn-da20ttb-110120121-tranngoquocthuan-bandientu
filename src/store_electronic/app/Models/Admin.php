<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'tbl_admin';

    protected $primaryKey = 'admin_id';

    protected $fillable = [
        'admin_email', 'admin_password', 'admin_name', 'admin_phone',
    ];

    // Các phương thức và relationship khác (nếu cần)
}

