<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    /** @use HasFactory<\Database\Factories\DirectorFactory> */
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'biography',
        'picture',
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

    public function movies(): BelongsToMany
    {
        return $this->belongsToMany(Movie::class)->withPivot(['director_role']);
    }
}
