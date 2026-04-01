<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'title',
        'title_bn',
        'category',
        'image',
        'order'
    ];

    protected $appends = ['image_url'];

    protected $casts = [
        'order' => 'integer'
    ];

    /**
     * Get the full image URL
     */
    public function getImageUrlAttribute()
    {
        if (!empty($this->image)) {
            $path = trim($this->image);
            
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
            
            // For paths like "galleries/filename.jpg" (stored by Laravel storage)
            // They should be accessed via /storage/galleries/filename.jpg
            // Use relative path instead of asset() to avoid APP_URL issues
            return '/storage/' . ltrim($path, '/');
        }
        
        return null;
    }
}
