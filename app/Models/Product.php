<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    // 定义可批量赋值的字段
    protected $fillable = [
        'name',
        'sku',
        'price',
        'description',
        'quantity',
        'category_id',  // 外键
    ];

    // 定义与 Category 模型的多一对关系
    public function category(){
        return $this->belongsTo(Category::class);
    }

    // 定义与 StockEntry 模型的多一对关系
    public function stockEntries(){
        return $this->hasMany(StockEntry::class);
    }
}
