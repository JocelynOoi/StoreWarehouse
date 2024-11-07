<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StockEntry extends Model
{
    use HasFactory;

    // 定义可批量赋值的字段
    protected $fillable = [
        'product_id',
        'quantity',
        'action_type',
    ];

    // 定义与 Product 模型的多对一关系
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
