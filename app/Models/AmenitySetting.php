<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AmenitySetting extends Model
{
    protected $fillable = [
        'section_badge',
        'section_title',
        'section_subtitle',
    ];
}
