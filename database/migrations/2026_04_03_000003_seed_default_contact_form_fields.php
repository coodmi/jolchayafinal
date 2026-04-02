<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Only seed if table is empty
        if (DB::table('contact_form_fields')->count() > 0) return;

        $fields = [
            ['label' => 'নাম',              'type' => 'text',     'placeholder' => 'আপনার নাম লিখুন',        'required' => true,  'order' => 0],
            ['label' => 'ফোন নম্বর',        'type' => 'tel',      'placeholder' => 'আপনার ফোন নম্বর',        'required' => true,  'order' => 1],
            ['label' => 'ইমেইল',            'type' => 'email',    'placeholder' => 'আপনার ইমেইল ঠিকানা',     'required' => false, 'order' => 2],
            ['label' => 'আপনি কতটি শেয়ার কিনতে চাচ্ছেন', 'type' => 'text', 'placeholder' => '৩/২/৫/৮/১০', 'required' => false, 'order' => 3],
            ['label' => 'বার্তা',           'type' => 'textarea', 'placeholder' => 'আপনার প্রশ্ন বা মন্তব্য', 'required' => false, 'order' => 4],
        ];

        foreach ($fields as $field) {
            DB::table('contact_form_fields')->insert([
                'label'       => $field['label'],
                'type'        => $field['type'],
                'placeholder' => $field['placeholder'],
                'required'    => $field['required'],
                'order'       => $field['order'],
                'is_active'   => true,
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }

    public function down(): void
    {
        DB::table('contact_form_fields')->truncate();
    }
};
