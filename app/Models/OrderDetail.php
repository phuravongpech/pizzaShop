<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'order_details';

    protected $fillable = [
        'order_id',
        'food_id',
        'size_id',
        'crust_id',
        'quantity',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function food()
    {
        return $this->belongsTo(Food::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public function crust()
    {
        return $this->belongsTo(Crust::class);
    }
    
}
