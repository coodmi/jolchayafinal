<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Feature;
use App\Models\FeatureSetting;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create feature settings
        FeatureSetting::updateOrCreate(
            [],
            [
                'section_title' => 'আমাদের সুবিধাসমূহ',
                'section_subtitle' => 'NEX Real Estate এর একটি প্রকল্প',
            ]
        );

        // Create default features
        $features = [
            [
                'title' => 'প্রিমিয়াম লোকেশন',
                'icon' => '🏙️',
                'description' => 'প্রকল্পের ঠিকানা: শুভনূর ৩৮৮ বাড়ি সিদ্ধার্থ এস আবাস, খুলনায় অবস্থিত',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'সহজ কিস্তি সুবিধা',
                'icon' => '📋',
                'description' => '০৩, ০৫, ১০, ও ২০ কিস্তির সুবিধা সহ নমনীয় পেমেন্ট প্ল্যান',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'বিভিন্ন প্লট সাইজ',
                'icon' => '🎯',
                'description' => '২.৫ কাঠা থেকে ৫ কাঠা পর্যন্ত বিভিন্ন সাইজের প্লট উপলব্ধ',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'আইনি নিশ্চয়তা',
                'icon' => '⚖️',
                'description' => 'সম্পূর্ণ আইনি প্রক্রিয়া ও ডকুমেন্টেশন নিশ্চিত',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'সহজ যোগাযোগ',
                'icon' => '🚘',
                'description' => 'প্রধান সড়কের সাথে সরাসরি সংযোগ ও উন্নত যোগাযোগ ব্যবস্থা',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'সবুজ পরিবেশ',
                'icon' => '🌳',
                'description' => 'পরিকল্পিত সবুজায়ন এবং আধুনিক সুবিধা সম্বলিত',
                'order' => 6,
                'is_active' => true,
            ],
            [
                'title' => '২৪/৭ নিরাপত্তা',
                'icon' => '🛡️',
                'description' => 'সিসিটিভি নজরদারি ও পেশাদার নিরাপত্তা টিম দ্বারা সুরক্ষিত',
                'order' => 7,
                'is_active' => true,
            ],
            [
                'title' => 'পানি ও বিদ্যুৎ সংযোগ',
                'icon' => '💧',
                'description' => 'নিরবচ্ছিন্ন পানি ও বিদ্যুতের সুবিধা নিশ্চিত',
                'order' => 8,
                'is_active' => true,
            ],
        ];

        foreach ($features as $feature) {
            Feature::updateOrCreate(
                ['title' => $feature['title']],
                $feature
            );
        }
    }
}
