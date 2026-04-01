<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HeaderSetting;

class HeaderSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HeaderSetting::updateOrCreate(
            [],
            [
                'logo_url' => '/images/projects/joljochna1.png',
                'logo_image_path' => null,
                'brand_text' => 'জলছায়া',
                'home_label' => 'হোম',
                'about_label' => 'আমাদের সম্পর্কে',
                'features_label' => 'সুবিধা',
                'pricing_label' => 'মূল্য তালিকা',
                'testimonials_label' => 'মন্তব্য',
                'other_projects_label' => 'প্রকল্প',
                'contact_label' => 'যোগাযোগ',
                'cta_text' => 'এখনই বুক করুন',
                'cta_href' => '#contact',
            ]
        );
    }
}
