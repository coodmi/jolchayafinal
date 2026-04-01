<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prokolpomap extends Model
{
    use HasFactory;
    protected $table = 'prokolpomaps';

    protected $fillable = [
        'section_key',
        'offer_title',
        'plots',
        'amenities',
        'footer_note',
        'cta_bar',
        'cta_link',
        'image',
    ];

    protected $casts = [
        'plots' => 'array',
        'amenities' => 'array',
    ];
}
