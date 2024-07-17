<?php

// app/Models/Brand.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'tbl_brand';
    protected $primaryKey = 'brand_id';
    public $timestamps = true;

    protected $fillable = [
        'category_id', 'brand_name', 'brand_desc', 'brand_status'
    ];

    // Quan hệ với bảng Category (giả sử đã có model Category)
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }
}
