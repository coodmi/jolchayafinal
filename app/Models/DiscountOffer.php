<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiscountOffer extends Model
{
    protected $fillable = [
        'title',
        'description',
        'metric',
        'image_url',
        'badge',
        'link',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];
}
