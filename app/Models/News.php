<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title',
        'category',
        'content',
        'image_url',
        'published_at',
        'is_active',
        'order',
        'is_featured',
    ];

    protected $casts = [
        'published_at' => 'date',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'order' => 'integer',
    ];
}
