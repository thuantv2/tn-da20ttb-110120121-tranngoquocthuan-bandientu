<?php

// app/Models/Product.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'tbl_product';
    protected $primaryKey = 'product_id';
    public $timestamps = true;

    protected $fillable = [
        'product_name', 'category_id', 'brand_id', 'product_desc', 'product_content',
        'product_price', 'product_img', 'product_storage', 'product_color', 'product_status','product_quantity'
    ];

    // Quan hệ với bảng Category (giả sử đã có model Category)
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    // Quan hệ với bảng Brand (giả sử đã có model Brand)
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'brand_id');
    }
}
