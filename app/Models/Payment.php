<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /** @use HasFactory<\Database\Factories\PaymentFactory> */
    use HasFactory;

    protected $fillable = [
        'card_type',
        'stripe_charge_id',
        'order_id',
    ];

    protected $hidden = [
        'id',
        'stripe_charge_id',
        'created_at',
        'updated_at',
    ];

    protected function casts(): array
    {
        return [
            'stripe_charge_id' => 'encrypted'
        ];
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
