<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    // 定义可批量赋值的字段
    protected $fillable = [
        'name',
        'description'
    ];

    // 定义与 Product 模型的一对多关系
    public function products(){
        return $this->hasMany(Product::class);
    }
}
