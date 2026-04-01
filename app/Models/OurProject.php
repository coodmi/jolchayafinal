<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image_path',
        'images',
        'cta_text',
        'cta_link',
        'order',
        'is_active',
    ];

    protected $appends = ['image_url'];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
        'images' => 'array',
    ];

    /**
     * Get the full image URL
     */
    public function getImageUrlAttribute()
    {
        if (!empty($this->image_path)) {
            $path = trim($this->image_path);
            
            // If starts with http/https, return as is (external URL)
            if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
                return $path;
            }
            
            // If starts with /images/, return as relative path
            if (str_starts_with($path, '/images/')) {
                return $path;
            }
            
            // If starts with images/, add leading slash
            if (str_starts_with($path, 'images/')) {
                return '/' . $path;
            }
            
            // If already starts with /storage/, return as is
            if (str_starts_with($path, '/storage/')) {
                return $path;
            }
            
            // If starts with storage/ (without leading slash), add leading slash
            if (str_starts_with($path, 'storage/')) {
                return '/' . $path;
            }
            
            // For paths like "projects/filename.jpg" (stored by Laravel storage)
            // They should be accessed via /storage/projects/filename.jpg
            // Use relative path instead of asset() to avoid APP_URL issues
            return '/storage/' . ltrim($path, '/');
        }
        
        // No default image - return null
        return null;
    }
}
