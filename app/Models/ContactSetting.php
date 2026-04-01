<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'phone_icon',
        'phone_label',
        'phone_numbers',
        'email_icon',
        'email_label',
        'email_address',
        'web_icon',
        'web_label',
        'web_address',
        'address_icon',
        'address_label',
        'address_text',
        'form_title',
        'submit_button_text',
    ];
}
