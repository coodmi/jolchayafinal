<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\ProjectSection;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Section Settings
        ProjectSection::updateOrCreate(
            ['section_key' => 'events'],
            [
                'title' => 'আমাদের ইভেন্টসমূহ',
                'subtitle' => 'জলছায়া প্রকল্পের সাম্প্রতিক কার্যক্রম এবং আসন্ন অনুষ্ঠানসমূহ',
                'is_active' => true,
            ]
        );

        // Sample Events
        $events = [
            [
                'title' => 'প্রকল্প পরিদর্শন মেলা',
                'description' => 'সরাসরি প্রকল্পে এসে নিজের প্লট দেখার সুযোগ এবং বুকিং এ বিশেষ অফার।',
                'event_date' => now()->addDays(10)->format('Y-m-d'),
                'event_time' => '১০:০০ AM - ৫:০০ PM',
                'location' => 'জলছায়া প্রকল্প এলাকা',
                'order' => 1,
            ],
            [
                'title' => 'গ্রাহক মিলনমেলা ২০২৪',
                'description' => 'আমাদের সম্মানিত গ্রাহকদের নিয়ে বিশেষ এক আলোচনা ও সাংস্কৃতিক সন্ধ্যা।',
                'event_date' => now()->addDays(25)->format('Y-m-d'),
                'event_time' => '৬:০০ PM',
                'location' => 'রাজউক উত্তরা কনভেনশন হল',
                'order' => 2,
            ],
            [
                'title' => 'বৃক্ষরোপণ কর্মসূচি',
                'description' => 'পরিবেশবান্ধব আবাসন গড়ার লক্ষ্যে জলছায়ার নতুন উদ্যোগ।',
                'event_date' => now()->addDays(40)->format('Y-m-d'),
                'event_time' => '০৯:০০ AM',
                'location' => 'জলছায়া গ্রিন জোন',
                'order' => 3,
            ],
            [
                'title' => 'প্রজেক্ট আপডেট কনফারেন্স',
                'description' => 'প্রকল্পের বর্তমান অবস্থা এবং ভবিষ্যৎ উন্নয়ন নিয়ে বিস্তারিত আলোচনা।',
                'event_date' => now()->addDays(55)->format('Y-m-d'),
                'event_time' => '৩:০০ PM',
                'location' => 'প্রধান কার্যালয়, নর্ডিক সেন্টার',
                'order' => 4,
            ],
        ];

        Event::truncate();
        foreach ($events as $event) {
            Event::create($event);
        }
    }
}
