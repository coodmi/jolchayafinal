<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactFormField extends Model
{
    protected $fillable = [
        'label',
        'type',
        'placeholder',
        'required',
        'order',
        'is_active',
    ];

    protected $casts = [
        'required' => 'boolean',
        'is_active' => 'boolean',
        'order' => 'integer',
    ];
}
