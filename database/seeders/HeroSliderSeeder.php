<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HeroSlider;

class HeroSliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sliders = [
            [
                'title' => 'আপনার স্বপ্নের বাড়ি',
                'subtitle' => 'জলছায়া  প্রজেক্টে',
                'description' => 'প্রকৃতির কোলে নির্মিত আধুনিক আবাসিক প্রকল্প। সুবিধাজনক মূল্যে জমি কিনুন।',
                'primary_button_text' => 'মূল্য দেখুন',
                'primary_button_link' => '#pricing',
                'secondary_button_text' => 'যোগাযোগ করুন',
                'secondary_button_link' => '#contact',
                'image_url' => 'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?w=1920&q=80',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'সাশ্রয়ী মূল্যে জমি',
                'subtitle' => 'কিস্তিতে পরিশোধের সুবিধা',
                'description' => '',
                'primary_button_text' => 'প্ল্যান দেখুন',
                'primary_button_link' => '#pricing',
                'secondary_button_text' => 'বিস্তারিত জানুন',
                'secondary_button_link' => '#features',
                'image_url' => 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?w=1920&q=80',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'প্রিমিয়াম সুবিধা সমূহ',
                'subtitle' => 'আধুনিক নাগরিক সুবিধা',
                'description' => '',
                'primary_button_text' => 'সুবিধা দেখুন',
                'primary_button_link' => '#features',
                'secondary_button_text' => 'যোগাযোগ',
                'secondary_button_link' => '#contact',
                'image_url' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=1920&q=80',
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($sliders as $slider) {
            HeroSlider::create($slider);
        }
    }
}
