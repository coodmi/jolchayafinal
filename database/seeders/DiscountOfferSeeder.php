<?php

namespace Database\Seeders;

use App\Models\DiscountOffer;
use Illuminate\Database\Seeder;

class DiscountOfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing offers to avoid duplicates with old titles
        DiscountOffer::truncate();

        $offers = [
            [
                'title' => '৪% মেগা ডিসকাউন্ট',
                'description' => 'এককালীন মূল্যে প্লট বুকিং দিলেই পাচ্ছেন ফ্ল্যাট ৪% সরাসরি ডিসকাউন্ট। সীমিত সময়ের অফার!',
                'badge' => 'SPECIAL OFF',
                'image_url' => 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?q=80&w=1000&auto=format&fit=crop',
                'link' => '#contact',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Share & Get Air Ticket Free',
                'description' => 'আপনার পছন্দের প্লটটি শেয়ার করুন এবং শেয়ার সংখ্যা নির্দিষ্ট সীমা অতিক্রম করলে জিতে নিন ঢাকা-কক্সবাজার এয়ার টিকিট।',
                'badge' => 'LIMITED TIME',
                'image_url' => 'https://images.unsplash.com/photo-1436491865332-7a61a109c0f2?q=80&w=1000&auto=format&fit=crop',
                'link' => '#contact',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'বুকিং মানি ব্যাক',
                'description' => 'আপনার সন্তুষ্টি আমাদের প্রধান লক্ষ্য। নির্দিষ্ট শর্ত সাপেক্ষে বুকিং মানি ফেরত পাওয়ার নিশ্চয়তা।',
                'badge' => 'GUARANTEED',
                'image_url' => 'https://images.unsplash.com/photo-1554469384-e58fac16e23a?q=80&w=1000&auto=format&fit=crop',
                'link' => '#contact',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Buy 1 Get 1 (BOGO)',
                'description' => 'এক কাঠা জমি কিনলে পাচ্ছেন আরও এক কাঠা জমি নির্দিষ্ট প্রজেক্টে। মেগা অফারটি এখনই লুফে নিন!',
                'badge' => 'MEGA OFFER',
                'image_url' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?q=80&w=1000&auto=format&fit=crop',
                'link' => '#contact',
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($offers as $offer) {
            DiscountOffer::updateOrCreate(
                ['title' => $offer['title']],
                $offer
            );
        }
    }
}
