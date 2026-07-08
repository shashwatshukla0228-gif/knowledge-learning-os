<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resource extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that can be mass assigned.
     */
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'type',
        'source_url',
        'description',
        'content',
        'status',
        'is_favorite',
    ];

    /**
     * Attribute casting.
     */
    protected $casts = [
        'is_favorite' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];
}
