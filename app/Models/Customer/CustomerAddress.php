<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'address_type',
        'street_address',
        'street_address_2',
        'city',
        'state',
        'zip',
        'customer_id',
    ];
}
