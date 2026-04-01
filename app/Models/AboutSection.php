<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_key',
        'title',
        'subtitle',
        'content',
        'content_2',
        'content_3',
        'image_url',
        'name',
        'position',
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

    /**
     * Get the full image path
     */
    public function getImagePathAttribute()
    {
        if (!empty($this->image_url)) {
            // If starts with http, return as is
            if (str_starts_with($this->image_url, 'http')) {
                return $this->image_url;
            }
            // If starts with /images/, return with asset()
            if (str_starts_with($this->image_url, '/images/')) {
                return asset($this->image_url);
            }
            // If starts with images/, add / and asset()
            if (str_starts_with($this->image_url, 'images/')) {
                return asset('/' . $this->image_url);
            }
            // If starts with /storage/, return with asset()
            if (str_starts_with($this->image_url, '/storage/')) {
                return asset($this->image_url);
            }
            // If starts with storage/, add asset with storage/
            if (str_starts_with($this->image_url, 'storage/')) {
                return asset($this->image_url);
            }
            // Otherwise, add storage path
            return asset('storage/' . $this->image_url);
        }
        return asset('images/default-about.jpg');
    }
}
