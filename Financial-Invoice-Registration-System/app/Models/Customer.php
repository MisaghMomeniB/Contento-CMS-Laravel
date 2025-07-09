<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "users";

    protected $fillable = [
            'first_name',
            'last_name',
            'mobile',
            'phone',
            'postal_code',
            'national_id',
            'company_name',
            'registration_number',
            'economic_number',
            'address',
            'password',
    ];
}
