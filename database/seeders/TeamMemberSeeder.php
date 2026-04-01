<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = [
            // Founders (Board Members)
            [
                'type' => 'founder',
                'name' => 'মোঃ আব্দুর রহমান',
                'position' => 'প্রতিষ্ঠাতা ও চেয়ারম্যান',
                'content' => 'জলছায়া রিয়েল এস্টেটের প্রতিষ্ঠাতা ও চেয়ারম্যান হিসেবে আমি গর্বিত যে আমরা হাজারো পরিবারকে তাদের স্বপ্নের বাড়ি খুঁজে পেতে সাহায্য করেছি। আমাদের লক্ষ্য শুধুমাত্র জমি বিক্রয় নয়, বরং একটি সুন্দর ভবিষ্যৎ গড়ে তোলা।',
                'image_url' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=400&fit=crop',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'type' => 'founder',
                'name' => 'ইঞ্জিনিয়ার মোঃ সেলিম',
                'position' => 'সহ-প্রতিষ্ঠাতা',
                'content' => 'আমাদের দলের সাথে কাজ করে আমি অনুভব করি যে আমরা শুধু ব্যবসা করছি না, বরং মানুষের স্বপ্ন পূরণে সাহায্য করছি। প্রতিটি প্রকল্পে আমরা মানসম্মত সেবা নিশ্চিত করি।',
                'image_url' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=400&h=400&fit=crop',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'type' => 'founder',
                'name' => 'মোঃ রফিকুল ইসলাম',
                'position' => 'ব্যবস্থাপনা পরিচালক',
                'content' => 'আমাদের লক্ষ্য হলো গ্রাহকদের সর্বোচ্চ সন্তুষ্টি নিশ্চিত করা। আমরা প্রতিটি পদক্ষেপে স্বচ্ছতা এবং বিশ্বাসের ভিত্তিতে কাজ করি।',
                'image_url' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=400&h=400&fit=crop',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'type' => 'founder',
                'name' => 'ড. মোঃ হাসান',
                'position' => 'প্রযুক্তি পরিচালক',
                'content' => 'আধুনিক প্রযুক্তির মাধ্যমে আমরা গ্রাহকদের জন্য সহজ এবং কার্যকর সমাধান প্রদান করি। আমাদের দল সর্বদা নতুন প্রযুক্তি গ্রহণে আগ্রহী।',
                'image_url' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=400&h=400&fit=crop',
                'order' => 4,
                'is_active' => true,
            ],

            // Chairman
            [
                'type' => 'chairman',
                'name' => 'ইঞ্জিনিয়ার কামাল হোসেন',
                'position' => 'ব্যবস্থাপনা পরিচালক',
                'content' => 'আমরা প্রতিটি প্রকল্পে সর্বোচ্চ মান নিশ্চিত করি এবং গ্রাহকদের সন্তুষ্টিকে সর্বোচ্চ অগ্রাধিকার দিই। আমাদের দক্ষ প্রকৌশলী দল প্রতিটি প্রকল্পে আধুনিক প্রযুক্তি ব্যবহার করে নির্মাণ কাজ সম্পন্ন করে থাকে।',
                'image_url' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=400&fit=crop',
                'order' => 1,
                'is_active' => true,
            ],

            // Other Members
            [
                'type' => 'other',
                'name' => 'সাইফুল ইসলাম',
                'position' => 'বিক্রয় ব্যবস্থাপক',
                'content' => null,
                'image_url' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=400&fit=crop',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'type' => 'other',
                'name' => 'রফিকুল ইসলাম',
                'position' => 'মার্কেটিং ম্যানেজার',
                'content' => null,
                'image_url' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=400&h=400&fit=crop',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'type' => 'other',
                'name' => 'নাজমুল হক',
                'position' => 'গ্রাহক সেবা প্রধান',
                'content' => null,
                'image_url' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=400&h=400&fit=crop',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'type' => 'other',
                'name' => 'ফজলুল হক',
                'position' => 'আইনি উপদেষ্টা',
                'content' => null,
                'image_url' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=400&h=400&fit=crop',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'type' => 'other',
                'name' => 'আব্দুল কাদের',
                'position' => 'প্রকল্প সমন্বয়কারী',
                'content' => null,
                'image_url' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=400&fit=crop',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'type' => 'other',
                'name' => 'মোহাম্মদ রহিম',
                'position' => 'সিনিয়র ম্যানেজার',
                'content' => null,
                'image_url' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=400&fit=crop',
                'order' => 6,
                'is_active' => true,
            ],
            [
                'type' => 'other',
                'name' => 'ফাতিমা আক্তার',
                'position' => 'মার্কেটিং হেড',
                'content' => null,
                'image_url' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=400&h=400&fit=crop',
                'order' => 7,
                'is_active' => true,
            ],
            [
                'type' => 'other',
                'name' => 'আব্দুল্লাহ আল মামুন',
                'position' => 'প্রজেক্ট ম্যানেজার',
                'content' => null,
                'image_url' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=400&h=400&fit=crop',
                'order' => 8,
                'is_active' => true,
            ],
            [
                'type' => 'other',
                'name' => 'নাজমা বেগম',
                'position' => 'ফিন্যান্স অফিসার',
                'content' => null,
                'image_url' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=400&h=400&fit=crop',
                'order' => 9,
                'is_active' => true,
            ],
            [
                'type' => 'other',
                'name' => 'কামরুল হাসান',
                'position' => 'টেকনিক্যাল লিড',
                'content' => null,
                'image_url' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=400&h=400&fit=crop',
                'order' => 10,
                'is_active' => true,
            ],
            [
                'type' => 'other',
                'name' => 'সাবিনা খাতুন',
                'position' => 'কাস্টমার সাপোর্ট',
                'content' => null,
                'image_url' => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=400&h=400&fit=crop',
                'order' => 11,
                'is_active' => true,
            ],
            [
                'type' => 'other',
                'name' => 'রাশেদুল ইসলাম',
                'position' => 'ডিজাইন স্পেশালিস্ট',
                'content' => null,
                'image_url' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=400&h=400&fit=crop',
                'order' => 12,
                'is_active' => true,
            ],
        ];

        foreach ($members as $member) {
            TeamMember::updateOrCreate(
                [
                    'name' => $member['name'],
                    'type' => $member['type'],
                    'position' => $member['position'] ?? null
                ],
                $member
            );
        }
    }
}
