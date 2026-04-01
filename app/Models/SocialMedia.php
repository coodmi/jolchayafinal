<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    protected $fillable = [
        'platform',
        'title',
        'content',
        'link',
        'image_path',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    protected $appends = ['image_url'];

    /**
     * Get the full image URL
     */
    public function getImageUrlAttribute()
    {
        if (!empty($this->image_path)) {
            // If starts with http, return as is
            if (str_starts_with($this->image_path, 'http')) {
                return $this->image_path;
            }
            // If already starts with storage/, add only asset()
            if (str_starts_with($this->image_path, 'storage/')) {
                return asset($this->image_path);
            }
            // If starts with /storage/, add asset without extra storage/
            if (str_starts_with($this->image_path, '/storage/')) {
                return asset($this->image_path);
            }
            // If starts with /images/, return as is
            if (str_starts_with($this->image_path, '/images/')) {
                return asset($this->image_path);
            }
            // Otherwise, add storage path
            return asset('storage/' . $this->image_path);
        }
        return null;
    }
}
