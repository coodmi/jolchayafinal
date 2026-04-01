<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeaderSetting extends Model
{
    protected $fillable = [
        'logo_url',
        'logo_data_url',
        'brand_text',
        'home_label',
        'about_label',
        'features_label',
        'pricing_label',
        'testimonials_label',
        'other_projects_label',
        'news_label',
        'contact_label',
        'cta_text',
        'cta_href',
        'hero_tagline',
        'logo_image_path',
    ];

    protected $appends = ['logo_full_url'];

    /**
     * Get the full URL for the logo image
     */
    public function getLogoFullUrlAttribute()
    {
        $value = $this->attributes['logo_image_path'] ?? null;

        if (!empty($value)) {
            $path = trim($value);
            if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
                return $path;
            }
            // Strip any leading /storage/ or storage/ prefix to normalize
            $path = ltrim($path, '/');
            if (str_starts_with($path, 'storage/')) {
                $path = substr($path, strlen('storage/'));
            }
            return '/storage/' . $path;
        }
        if (!empty($this->attributes['logo_data_url'])) {
            return $this->attributes['logo_data_url'];
        }
        if (!empty($this->attributes['logo_url'])) {
            return $this->attributes['logo_url'];
        }
        return null;
    }

    /**
     * Get the logo image path (keep for backward compatibility but fixed)
     */
    public function getLogoImagePathAttribute($value)
    {
        if (!empty($value)) {
            $path = trim($value);
            if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
                return $path;
            }
            $path = ltrim($path, '/');
            if (str_starts_with($path, 'storage/')) {
                $path = substr($path, strlen('storage/'));
            }
            return '/storage/' . $path;
        }
        if (!empty($this->attributes['logo_data_url'])) {
            return $this->attributes['logo_data_url'];
        }
        if (!empty($this->attributes['logo_url'])) {
            return $this->attributes['logo_url'];
        }
        return null;
    }
}
