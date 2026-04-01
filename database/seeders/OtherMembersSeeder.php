<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TeamMember;

class OtherMembersSeeder extends Seeder
{
    public function run()
    {
        $members = [
            [
                'type' => 'other',
                'name' => 'মোহাম্মদ রহিম',
                'position' => 'সিনিয়র ম্যানেজার',
                'order' => 1,
                'is_active' => true,
                'image_url' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=400&fit=crop'
            ],
            [
                'type' => 'other',
                'name' => 'ফাতিমা আক্তার',
                'position' => 'মার্কেটিং হেড',
                'order' => 2,
                'is_active' => true,
                'image_url' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=400&h=400&fit=crop'
            ],
            [
                'type' => 'other',
                'name' => 'আব্দুল্লাহ আল মামুন',
                'position' => 'প্রজেক্ট ম্যানেজার',
                'order' => 3,
                'is_active' => true,
                'image_url' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=400&h=400&fit=crop'
            ],
            [
                'type' => 'other',
                'name' => 'নাজমা বেগম',
                'position' => 'ফিন্যান্স অফিসার',
                'order' => 4,
                'is_active' => true,
                'image_url' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=400&h=400&fit=crop'
            ],
            [
                'type' => 'other',
                'name' => 'কামরুল হাসান',
                'position' => 'টেকনিক্যাল লিড',
                'order' => 5,
                'is_active' => true,
                'image_url' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=400&h=400&fit=crop'
            ],
            [
                'type' => 'other',
                'name' => 'সাবিনা খাতুন',
                'position' => 'কাস্টমার সাপোর্ট',
                'order' => 6,
                'is_active' => true,
                'image_url' => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=400&h=400&fit=crop'
            ]
        ];

        foreach ($members as $member) {
            TeamMember::create($member);
        }
    }
}

