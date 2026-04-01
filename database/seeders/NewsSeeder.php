<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $news = [
            [
                'title' => 'জল জ্যোৎস্না প্রকল্পের ২য় ধাপের বুকিং শুরু',
                'category' => 'Announcement',
                'content' => 'আমরা অত্যন্ত আনন্দের সাথে জানাচ্ছি যে, আমাদের সফল ১ম ধাপ শেষ হওয়ার পর এখন ২য় ধাপের প্লট বুকিং উন্মুক্ত করা হয়েছে। যারা ঢাকার কাছে একটি নিরাপদ ও আধুনিক আবাসন খুঁজছেন, তাদের জন্য এটি একটি সুবর্ণ সুযোগ। বুকিং এর জন্য সরাসরি আমাদের অফিসে যোগাযোগ করুন অথবা কল করুন আমাদের হটলাইন নম্বরে।',
                'image_url' => 'https://images.unsplash.com/photo-1582408921715-18e7806365c1?auto=format&fit=crop&q=80',
                'published_at' => now(),
                'is_active' => true,
                'is_featured' => true,
                'order' => 1,
            ],
            [
                'title' => 'মিডিয়া কভারেজ: সেরা আধুনিক আবাসন প্রকল্প হিসেবে জল জ্যোৎস্না মনোনীত',
                'category' => 'Media',
                'content' => 'দেশের প্রথম সারির বেশ কয়েকটি গণমাধ্যমে আমাদের প্রকল্পের পরিবেশবান্ধব পরিকল্পনা এবং উন্নত নাগরিক সুবিধার কথা প্রকাশিত হয়েছে। ঢাকা শহরের যানজট থেকে দূরে কিন্তু মূল শহরের খুব কাছে এমন আবাসন প্রকল্পের কথা উল্লেখ করা হয়ে আমাদের এই প্রজেক্টকে।',
                'image_url' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=80',
                'published_at' => now()->subDays(2),
                'is_active' => true,
                'is_featured' => false,
                'order' => 2,
            ],
            [
                'title' => 'প্রকল্প সাইটে বিদ্যুৎ ও গ্যাস সংযোগের অগ্রগতি',
                'category' => 'Construction',
                'content' => 'আমাদের সম্মানিত গ্রাহকদের সুবিধার্থে আমরা দ্রুততার সাথে গ্যাস এবং বিদ্যুৎ লাইনের কাজ এগিয়ে নিয়ে যাচ্ছি। এর মধ্যেই মূল গ্রিড থেকে সংযোগ স্থাপনের প্রাথমিক কাজ সম্পন্ন হয়েছে। আগামী কয়েক মাসের মধ্যে প্রতিটি প্লটে সংযোগ প্রদানের লক্ষ্যমাত্রা নির্ধারণ করা হয়েছে।',
                'image_url' => 'https://images.unsplash.com/photo-1541888941293-d447cc1bf1e0?auto=format&fit=crop&q=80',
                'published_at' => now()->subDays(5),
                'is_active' => true,
                'is_featured' => false,
                'order' => 3,
            ],
            [
                'title' => 'আসন্ন বিজয় দিবস উপলক্ষে বিশেষ ছাড়',
                'category' => 'Offers',
                'content' => 'আসন্ন বিজয় দিবস উপলক্ষে আমাদের প্রতিটি প্লট বুকিং এর উপর থাকছে আকর্ষণীয় এবং বিশাল ক্যাশব্যাক অফার। অফারটি শুধুমাত্র সীমিত সময়ের জন্য এবং নির্দিষ্ট কিছু প্লটের ওপর প্রযোজ্য হবে। বিস্তারিত জানতে আমাদের ভিজিট বুকিং ফর্মটি আজই পূরণ করুন।',
                'image_url' => 'https://images.unsplash.com/photo-1590602846989-1e66c7f42918?auto=format&fit=crop&q=80',
                'published_at' => now()->subDays(10),
                'is_active' => true,
                'is_featured' => false,
                'order' => 4,
            ],
            [
                'title' => 'পরিবেশবান্ধব শহর গড়ে তুলতে জল জ্যোৎস্নার নতুন কর্মসূচি',
                'category' => 'Eco-Friendly',
                'content' => 'আধুনিক শহরের বড় একটি চ্যালেঞ্জ হলো দূষণ। আমরা আমাদের প্রকল্পের ভেতর ২৫% এর বেশি জায়গা রেখেছি বনায়ন এবং লেকের জন্য। আমাদের নতুন বৃক্ষরোপণ কর্মসূচির মাধ্যমে আমরা পুরো প্রজেক্ট এলাকাকে একটি সবুজ অক্সিজেন জোন হিসেবে গড়ে তুলতে চাচ্ছি।',
                'image_url' => 'https://images.unsplash.com/photo-1449844908441-8829872d2607?auto=format&fit=crop&q=80',
                'published_at' => now()->subDays(15),
                'is_active' => true,
                'is_featured' => false,
                'order' => 5,
            ],
        ];

        foreach ($news as $item) {
            \App\Models\News::create($item);
        }
    }
}
