<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LegalProfiles extends Model
{
    protected $fillable = [
        'user_id',
        'store_name',
        'registration_number',
        'economic_code',
        'postal_code',
        'address',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
