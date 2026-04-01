<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_key',
        'title',
        'subtitle',
        'content',
        'image_url',
        'logo_url',
        'extra_data',
        'is_active',
    ];

    protected $casts = [
        'extra_data' => 'array',
        'is_active' => 'boolean',
    ];

    /**
     * Get section by key
     */
    public static function getByKey($key)
    {
        return self::where('section_key', $key)->where('is_active', true)->first();
    }
}
