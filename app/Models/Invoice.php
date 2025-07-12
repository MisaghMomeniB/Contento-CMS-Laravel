<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invoice extends Model
{
    protected $fillable = [
        'invoice_number',
        'invoice_date',
        'user_id',
        'invoice_type',
        'discount',
        'status',
        'description',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(InvoiceItem::class);
    }

    public function getTotalAmountAttribute()
    {
        return $this->items->sum('total_price');
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }
}
