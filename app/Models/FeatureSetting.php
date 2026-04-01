<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeatureSetting extends Model
{
    protected $fillable = [
        'section_title',
        'section_subtitle',
    ];
}
