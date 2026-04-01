<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PricingPlan extends Model
{
    protected $fillable = [
        'title',
        'plot_size',
        'price',
        'features',
        'is_popular',
        'order',
        'is_active',
        'cta_text',
        'cta_link',
        'image1_path',
        'image2_path',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'features' => 'array',
        'is_popular' => 'boolean',
        'is_active' => 'boolean',
        'order' => 'integer',
    ];
}
