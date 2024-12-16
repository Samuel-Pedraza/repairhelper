<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'customer_type',
        'phone_number',
        'email_address',
        'fax_number',
        'mobile_number',
        'website',
        'company_id',
    ]
}
