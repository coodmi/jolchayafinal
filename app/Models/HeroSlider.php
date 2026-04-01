<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroSlider extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'primary_button_text',
        'primary_button_link',
        'secondary_button_text',
        'secondary_button_link',
        'image_url',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Scope to get only active sliders
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to order by custom order field
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    protected $appends = ['image_path'];

    /**
     * Get the full image path or default
     */
    public function getImagePathAttribute($value)
    {
        if (!empty($this->attributes['image_url'])) {
            $imageUrl = $this->attributes['image_url'];
            
            // If starts with http, return as is
            if (str_starts_with($imageUrl, 'http')) {
                return $imageUrl;
            }
            
            // If starts with /images/, return with asset()
            if (str_starts_with($imageUrl, '/images/')) {
                return asset($imageUrl);
            }
            
            // If starts with images/, add / and asset()
            if (str_starts_with($imageUrl, 'images/')) {
                return asset('/' . $imageUrl);
            }
            
            // If starts with /storage/, return with asset()
            if (str_starts_with($imageUrl, '/storage/')) {
                return asset($imageUrl);
            }
            
            // If starts with storage/, add asset with storage/
            if (str_starts_with($imageUrl, 'storage/')) {
                return asset($imageUrl);
            }
            
            // Otherwise, default to storage path
            return asset('storage/' . $imageUrl);
        }
        // Default image
        return asset('images/default-slider.jpg');
    }
}
