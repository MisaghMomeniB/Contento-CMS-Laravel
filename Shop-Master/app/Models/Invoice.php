<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public function store()
        {
            return $this->belongsTo(Store::class);
        }

public function payment()
        {
            return $this->hasOne(Payment::class);
        }
}
