<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerContact extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email_address',
        'phone_number',
        'fax_number',
        'mobile_number',
        'website',
        'street_address',
        'unit',
        'city',
        'state',
        'zip_code',
        'customer_id',
    ];
}
