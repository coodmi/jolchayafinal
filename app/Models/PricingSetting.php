<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PricingSetting extends Model
{
    protected $fillable = [
        'section_title',
        'section_subtitle',
        'installment_title',
        'installment_options',
        'price_list_cta_text',
        'price_list_cta_link',
    ];

    protected $casts = [
        'installment_options' => 'array',
    ];
}
