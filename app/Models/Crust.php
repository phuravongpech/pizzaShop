<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crust extends Model
{
    use HasFactory;

    protected $table = 'crusts';

    protected $fillable = [
        'name',
        'priceAdd',
    ];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
