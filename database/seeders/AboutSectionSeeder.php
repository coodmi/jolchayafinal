<?php

namespace Database\Seeders;

use App\Models\AboutSection;
use Illuminate\Database\Seeder;

class AboutSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections = [
            // Hero Section
            [
                'section_key' => 'hero',
                'title' => 'আমাদের সম্পর্কে',
                'subtitle' => 'আমাদের লক্ষ্য শুধুই সেবা নয়, বরং সমাজের উন্নয়নে অবদান রাখা।',
                'content' => 'প্রতিটি পদক্ষেপ আমরা বিশ্বাস ও মানের ভিত্তিতে এগিয়ে নিই, যাতে গ্রাহকরা পায় সেরা অভিজ্ঞতা।',
                'image_url' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=1200&h=600&fit=crop',
                'is_active' => true,
            ],

            // History Section
            [
                'section_key' => 'history',
                'title' => 'আমাদের ইতিহাস',
                'content' => 'আমাদের সংস্থা ২০০৫ সালে শুরু হয়েছিল। ছোট একটি দল দিয়ে শুরু হলেও আমরা আজ একটি শক্তিশালী দল ও আধুনিক প্রযুক্তির সাহায্যে সারা দেশের গ্রাহকদের সেবা দিচ্ছি। আমাদের মূল উদ্দেশ্য হলো মানসম্মত সেবা প্রদান এবং সমাজে ইতিবাচক প্রভাব ফেলা।',
                'content_2' => 'সময়ের সঙ্গে সঙ্গে আমরা নতুন নতুন উদ্যোগ নিয়েছি, গ্রাহকদের চাহিদা অনুযায়ী সমাধান করেছি এবং আমাদের সেবা সম্প্রসারণ করেছি। প্রতিটি চ্যালেঞ্জকে আমরা একটি নতুন সুযোগ হিসেবে গ্রহণ করেছি।',
                'is_active' => true,
            ],

            // History Card 1
            [
                'section_key' => 'history_card_1',
                'title' => 'প্রথম সাফল্য',
                'content' => '২০০৭ সালে আমাদের প্রথম বড় প্রকল্প সম্পন্ন হয়, যা আমাদের জন্য একটি গুরুত্বপূর্ণ মাইলফলক।',
                'is_active' => true,
            ],

            // History Card 2
            [
                'section_key' => 'history_card_2',
                'title' => 'প্রসারিত উদ্যোগ',
                'content' => '২০১৫ সালে আমরা নতুন শহরে সেবা শুরু করি, এবং গ্রাহকদের সঠিক সমাধান দিতে সক্ষম হই।',
                'is_active' => true,
            ],

            // Mission Section
            [
                'section_key' => 'mission',
                'title' => 'আমাদের মিশন',
                'content' => 'আমরা গ্রাহকদের জন্য সেরা রিয়েল এস্টেট সমাধান প্রদান করি, যাতে তারা তাদের পছন্দের বাড়ি সহজেই খুঁজে পান। আমাদের লক্ষ্য হলো গ্রাহকদের সাথে স্বচ্ছতা এবং বিশ্বাসের ভিত্তিতে কাজ করা।',
                'image_url' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=800',
                'is_active' => true,
            ],

            // Vision Section
            [
                'section_key' => 'vision',
                'title' => 'আমাদের ভিশন',
                'content' => 'বাংলাদেশের শীর্ষ রিয়েল এস্টেট প্ল্যাটফর্ম হয়ে উঠা, যেখানে গ্রাহকের সন্তুষ্টি সর্বোচ্চ অগ্রাধিকার। আমরা ভবিষ্যতে আরও উন্নত প্রযুক্তি এবং সেবা প্রদানের মাধ্যমে গ্রাহকদের জীবনকে সহজ করতে চাই।',
                'is_active' => true,
            ],

            // Board Title (for Board Members section)
            [
                'section_key' => 'board_title',
                'title' => 'বোর্ড মেম্বার',
                'is_active' => true,
            ],

            // Chairman Title
            [
                'section_key' => 'chairman_title',
                'title' => 'আমাদের চেয়ারম্যান',
                'is_active' => true,
            ],

            // Other Members Title
            [
                'section_key' => 'other_title',
                'title' => 'অন্যান্য সদস্য',
                'is_active' => true,
            ],
        ];

        foreach ($sections as $section) {
            AboutSection::updateOrCreate(
                ['section_key' => $section['section_key']],
                $section
            );
        }
    }
}
