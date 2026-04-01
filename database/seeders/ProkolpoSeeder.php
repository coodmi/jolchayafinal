<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\Prokolpomap;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProkolpoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
 public function run(): void
    {
        Prokolpomap::updateOrCreate(
            ['section_key' => 'roadmap'], // ensures only one roadmap section
            [
                'offer_title' => 'বেছে নিন আপনার পছন্দের প্লট',
                'plots' => [
                    ['size' => '৮ কাঠা', 'cat' => 'প্রিমিয়াম প্লট'],
                    ['size' => '১০ কাঠা', 'cat' => 'ডিলাক্স প্লট'],
                    ['size' => '৩০ কাঠা', 'cat' => 'এক্সিকিউটিভ প্লট'],
                    ['size' => '২০ কাঠা', 'cat' => 'কর্পোরেট প্লট']
                ],
                'amenities' => ['ক্লাব হাউজ', 'জিম', 'মসজিদ', 'শপিং এরিয়া'],
                'footer_note' => '<p>HTML সমর্থিত ফুটার নোট</p>',
                'cta_bar' => '📞 এখনই যোগাযোগ করুন — সীমিত সময়ের অফার',
                'cta_link' => '#contact',
                'image' => 'assets/images/realstate3.PNG',
            ]
        );
    }
}
