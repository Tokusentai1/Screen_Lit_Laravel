<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    /** @use HasFactory<\Database\Factories\PermissionFactory> */
    use HasFactory;

    protected $fillable = [
        'permission_name',
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function admins(): BelongsToMany
    {
        return $this->belongsToMany(Admin::class);
    }
}
