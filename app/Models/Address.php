<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';

    protected $fillable = [
        'customer_id',
        'address_type',
        'address_detail',
        'address_no',
        'street',
        'city',
        'extra_instructions',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
}
