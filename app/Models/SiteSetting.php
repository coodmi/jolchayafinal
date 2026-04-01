<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'site_name',
        'site_title',
        'favicon_path',
        'dashboard_logo_path',
    ];

    public function getFaviconUrlAttribute(): ?string
    {
        if (!$this->favicon_path) return null;
        if (str_starts_with($this->favicon_path, 'http')) return $this->favicon_path;
        return '/storage/' . ltrim($this->favicon_path, '/');
    }

    public function getDashboardLogoUrlAttribute(): ?string
    {
        if (!$this->dashboard_logo_path) return null;
        if (str_starts_with($this->dashboard_logo_path, 'http')) return $this->dashboard_logo_path;
        return '/storage/' . ltrim($this->dashboard_logo_path, '/');
    }
}
