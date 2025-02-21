<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    /** @use HasFactory<\Database\Factories\MovieFactory> */
    use HasFactory;

    protected $fillable = [
        'movie_name',
        'movie_biography',
        'movie_price',
        'movie_poster',
        'movie_duration',
        'movie_release_date',
        'movie_trailer_url',
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected function casts(): array
    {
        return [
            'movie_price' => 'decimal:2',
            'movie_duration' => 'integer',
            'movie_release_date' => 'date',
        ];
    }

    public function setMovieNameAttribute($value): void
    {
        $this->attributes['movie_name'] = ucfirst($value);
    }

    public function studios(): BelongsToMany
    {
        return $this->belongsToMany(Studio::class);
    }

    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class);
    }

    public function awards(): BelongsToMany
    {
        return $this->belongsToMany(Award::class)->withPivot(['year_won']);
    }

    public function wishlists(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'wishlists');
    }

    public function favorites(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favorites');
    }

    public function carts(): BelongsToMany
    {
        return $this->belongsToMany(Cart::class)->withTimestamps();
    }

    public function reviews(): BelongsToMany
    {
        return $this->belongsToMany(Review::class)->withTimestamps()->withPivot(['movie_score', 'comment']);
    }

    public function directors(): BelongsToMany
    {
        return $this->belongsToMany(Director::class)->withPivot(['director_role']);
    }

    public function actors(): BelongsToMany
    {
        return $this->belongsToMany(Actor::class)->withPivot(['character_played', 'character_image']);
    }

    public function ratings(): BelongsTo
    {
        return $this->belongsTo(Rating::class);
    }
}
