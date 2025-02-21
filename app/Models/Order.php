<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    protected $fillable = [
        'order_date',
        'order_status',
        'cart_id',
    ];

    protected $hidden = [
        'id',
        'cart_id',
        'created_at',
        'updated_at',
    ];

    protected function casts(): array
    {
        return [
            'order_date' => 'datetime',
        ];
    }

    public function getOrderStatusAttribute(): string
    {
        return match ($this->order_status) {
            'Pending' => $this->order_status . '🕒',
            'Cancelled' => $this->order_status . '❌',
            default => $this->order_status . '✅',
        };
    }

    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }
}
