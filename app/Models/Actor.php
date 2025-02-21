<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    /** @use HasFactory<\Database\Factories\ActorFactory> */
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'biography',
        'image',
        'birth_date',
        'death_date',
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected function casts(): array
    {
        return [
            'birth_date' => 'date',
            'death_date' => 'date',
        ];
    }

    public function getFullNameAttribute(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function setFirstNameAttribute($value): void
    {
        $this->attributes['first_name'] = ucfirst($value);
    }

    public function setLastNameAttribute($value): void
    {
        $this->attributes['last_name'] = ucfirst($value);
    }

    public function awards(): BelongsToMany
    {
        return $this->belongsToMany(Award::class)->withPivot(['year_won']);
    }

    public function movies(): BelongsToMany
    {
        return $this->belongsToMany(Movie::class)->withPivot(['character_played', 'character_image']);
    }
}
