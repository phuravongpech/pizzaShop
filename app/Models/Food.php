<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    // protected $fillable = ['food_name','desc','price','photo'];
    protected $fillable = [
        'name',
        'desc',
        'price',
        'image',
        'category_id',
    ];
    // nv kvas attributes

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
