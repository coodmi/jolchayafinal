<?php

namespace Database\Seeders;

use App\Models\SocialMedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
      $socialMediaPosts = [
    [
        'platform' => 'Instagram',
        'title' => 'আধুনিক বাড়ির বাহিরের ডিজাইন',
        'content' => 'জলছায়া প্রজেক্টের সুন্দর ও আধুনিক এক্সটেরিয়র ডিজাইন।',
        'link' => 'https://instagram.com/jolchaya_realestate',
        'image_path' => 'https://images.unsplash.com/photo-1570129477492-45c003edd2be?w=600&q=70',
        'order' => 1,
        'is_active' => true,
    ],
    [
        'platform' => 'YouTube',
        'title' => 'ইনডোর লিভিং এরিয়া',
        'content' => 'প্রিমিয়াম মানের লিভিং রুম ডিজাইন যা আরামদায়ক এবং প্রশান্তিকর।',
        'link' => 'https://youtube.com/@jolchaya_realestate',
        'image_path' => 'https://images.unsplash.com/photo-1586105251261-72a756497a11?w=600&q=70',
        'order' => 2,
        'is_active' => true,
    ],
    [
        'platform' => 'LinkedIn',
        'title' => 'হাই-এন্ড মডার্ন কিচেন',
        'content' => 'কার্যকরী ও সুন্দর কিচেন স্পেস যা আপনার বাড়িকে করে তুলবে আরও আকর্ষণীয়।',
        'link' => 'https://linkedin.com/company/jolchaya-real-estate',
        'image_path' => 'https://images.unsplash.com/photo-1556911073-52527ac437f5?w=600&q=70',
        'order' => 3,
        'is_active' => true,
    ],
    [
        'platform' => 'Twitter',
        'title' => 'বিলাসবহুল বেডরুম',
        'content' => 'আকর্ষণীয় এবং আরামদায়ক বেডরুম ডিজাইন যা আধুনিক জীবনধারার সঙ্গে মানানসই।',
        'link' => 'https://twitter.com/jolchaya_real',
        'image_path' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=600&q=70',
        'order' => 4,
        'is_active' => true,
    ],
    [
        'platform' => 'TikTok',
        'title' => 'প্রজেক্ট সাইট এরিয়া',
        'content' => 'জলছায়া প্রজেক্টের ওপেন প্লট, রাস্তা এবং এলাকার সাইট ভিউ।',
        'link' => 'https://tiktok.com/@jolchaya_realestate',
        'image_path' => 'https://images.unsplash.com/photo-1582407947304-fd86f02974f0?w=600&q=70',
        'order' => 5,
        'is_active' => true,
    ],
    [
        'platform' => 'WhatsApp Business',
        'title' => 'মডার্ন হোম অফিস',
        'content' => 'আরামদায়ক হোম অফিস যা আপনার কাজকে করবে আরও প্রোডাক্টিভ।',
        'link' => 'https://wa.me/8801712345678',
        'image_path' => 'https://images.unsplash.com/photo-1593642634443-44adaa06623a?w=600&q=70',
        'order' => 6,
        'is_active' => true,
    ],
    [
        'platform' => 'Telegram',
        'title' => 'ডাইনিং এরিয়া',
        'content' => 'পরিবারের সঙ্গে খাবার উপভোগের জন্য উজ্জ্বল এবং সুন্দর ডাইনিং স্পেস।',
        'link' => 'https://t.me/jolchaya_realestate',
        'image_path' => 'https://images.unsplash.com/photo-1615874959474-df27a1d4300b?w=600&q=70',
        'order' => 7,
        'is_active' => true,
    ],
    [
        'platform' => 'Pinterest',
        'title' => 'ইনডোর ন্যাচারাল লাইট',
        'content' => 'বড় জানালা এবং প্রাকৃতিক আলো যুক্ত ঘর যা বাড়িকে করে তুলবে আরও প্রাণবন্ত।',
        'link' => 'https://pinterest.com/jolchaya_realestate',
        'image_path' => 'https://images.unsplash.com/photo-1519710164239-da123dc03ef4?w=600&q=70',
        'order' => 8,
        'is_active' => true,
    ],
];


        foreach ($socialMediaPosts as $post) {
            SocialMedia::create($post);
        }
    }
}
