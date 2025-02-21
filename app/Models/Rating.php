<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    /** @use HasFactory<\Database\Factories\RatingFactory> */
    use HasFactory;

    protected $fillable = [
        'rating_name',
        'rating_logo',
        'rating_biography',
        'rating_minimum_age',
        'rating_maximum_age',
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected function casts(): array
    {
        return [
            'rating_minimum_age' => 'integer',
            'rating_maximum_age' => 'integer',
        ];
    }

    public function setRatingNameAttribute($value): void
    {
        $this->attributes['rating_name'] = ucfirst($value);
    }

    public function movies(): HasMany
    {
        return $this->hasMany(Movie::class);
    }
}
