<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    /** @use HasFactory<\Database\Factories\GenreFactory> */
    use HasFactory;

    protected $fillable = [
        'genre_name',
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function setGenreNameAttribute($value): void
    {
        $this->attributes['genre_name'] = ucfirst($value);
    }

    public function movies(): BelongsToMany
    {
        return $this->belongsToMany(Movie::class);
    }
}
