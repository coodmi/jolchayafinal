<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo_path',
        'website_url',
        'is_active',
        'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    protected $appends = ['logo_url'];

    /**
     * Get the logo URL attribute
     */
    public function getLogoUrlAttribute()
    {
        if (!$this->logo_path) {
            return null;
        }

        // If it's already a full URL
        if (str_starts_with($this->logo_path, 'http://') || str_starts_with($this->logo_path, 'https://')) {
            return $this->logo_path;
        }

        // If it starts with '/', it's already an absolute path
        if (str_starts_with($this->logo_path, '/')) {
            return $this->logo_path;
        }

        // If it starts with storage/, it's already been processed
        if (str_starts_with($this->logo_path, 'storage/')) {
            return '/' . $this->logo_path;
        }

        // Otherwise, it's in the storage/app/public directory
        return '/storage/' . $this->logo_path;
    }

    /**
     * Scope to get only active partners
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to order by order column
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }
}
