<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    /** @use HasFactory<\Database\Factories\StudioFactory> */
    use HasFactory;

    protected $fillable = [
        'studio_name',
        'studio_location',
        'studio_biography',
        'studio_logo',
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function setStudioNameAttribute($value): void
    {
        $this->attributes['studio_name'] = ucfirst($value);
    }

    public function movies(): BelongsToMany
    {
        return $this->belongsToMany(Movie::class);
    }
}
