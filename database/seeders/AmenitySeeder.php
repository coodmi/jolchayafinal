<?php

namespace Database\Seeders;

use App\Models\Admin\Amenity;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AmenitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $amenities = [
            [
                'title' => '২৪/৭ সিকিউরিটি সার্ভিস',
                'short_description' => 'সার্বক্ষণিক পেশাদার নিরাপত্তা সেবা প্রদান।',
                'image' => 'https://images.unsplash.com/photo-1581091870636-0b9c9d9b196d',
            ],
            [
                'title' => 'চাইল্ড প্লে গ্রাউন্ড',
                'short_description' => 'শিশুদের জন্য নিরাপদ ও মানসম্পন্ন খেলার জায়গা।',
                'image' => 'https://images.unsplash.com/photo-1508804185872-d7badad00f7d',
            ],
            [
                'title' => 'রুফটপ গার্ডেন',
                'short_description' => 'সবুজ ও শান্ত রুফটপ গার্ডেনে বসার সুযোগ।',
                'image' => 'https://images.unsplash.com/photo-1501004318641-b39e6451bec6',
            ],
            [
                'title' => 'জিমনেশিয়াম',
                'short_description' => 'অত্যাধুনিক ব্যায়ামাগার সুবিধা।',
                'image' => 'https://images.unsplash.com/photo-1558611848-73f7eb4001a1',
            ],
            [
                'title' => 'সুইমিং পুল',
                'short_description' => 'পরিষ্কার ও নিরাপদ সুইমিং পুল সুবিধা।',
                'image' => 'https://images.unsplash.com/photo-1506126613408-eca07ce68773',
            ],
            [
                'title' => 'কমিউনিটি হল',
                'short_description' => 'পারিবারিক ও সামাজিক অনুষ্ঠানের জন্য কমিউনিটি হল।',
                'image' => 'https://images.unsplash.com/photo-1551069613-e446c5f23102',
            ],
            [
                'title' => 'লিফট সার্ভিস',
                'short_description' => 'উচ্চমানের লিফট সুবিধা।',
                'image' => 'https://images.unsplash.com/photo-1504215680853-026ed2a45def',
            ],
            [
                'title' => 'কার পার্কিং',
                'short_description' => 'নিরাপদ ও যথেষ্ট কার পার্কিং সুবিধা।',
                'image' => 'https://images.unsplash.com/photo-1525609004556-c46c7d6cf023',
            ],
        ];

        foreach ($amenities as $item) {
            Amenity::create($item);
        }
    }
    }

