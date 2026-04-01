<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'name',
        'position',
        'content',
        'content_2',
        'content_3',
        'image_url',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    protected $appends = ['image_url_full'];

    /**
     * Get the full image URL (for API responses)
     */
    public function getImageUrlFullAttribute()
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
        // Default avatar image
        return asset('images/default-avatar.jpg');
    }

    /**
     * Get the full image path (alias for compatibility)
     */
    public function getImagePathAttribute()
    {
        return $this->image_url_full;
    }
}
