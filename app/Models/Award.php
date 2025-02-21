<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    /** @use HasFactory<\Database\Factories\AwardFactory> */
    use HasFactory;

    protected $fillable = [
        'award_name',
        'award_image',
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function setAwardNameAttribute($value): void
    {
        $this->attributes['award_name'] = ucfirst($value);
    }

    public function actors(): BelongsToMany
    {
        return $this->belongsToMany(Actor::class)->withPivot(['year_won']);
    }

    public function movies(): BelongsToMany
    {
        return $this->belongsToMany(Movie::class)->withPivot(['year_won']);
    }
}
