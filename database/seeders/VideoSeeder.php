<?php

namespace Database\Seeders;

use App\Models\Admin\Video;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
       $videos = [
    [
        'title' => 'জলজ্যোৎস্না প্রকল্প পরিচিতি',
        'description' => 'জলজ্যোৎস্না রিয়েল এস্টেট প্রকল্পের সম্পূর্ণ পরিচিতি ভিডিও।',
        'poster' => 'https://images.unsplash.com/photo-1523217582562-09d0def993a6?w=800&q=80&auto=format&fit=crop',
        'url' => 'https://youtu.be/fA5c5xO5EoM',
    ],
    [
        'title' => 'ফ্ল্যাট অভ্যন্তরীণ ভিউ',
        'description' => 'মডার্ন লিভিং রুম, শয়নকক্ষ ও কিচেনের অভ্যন্তরীণ ট্যুর।',
        'poster' => 'https://images.unsplash.com/photo-1507089947368-19c1da9775ae?w=800&q=80&auto=format&fit=crop',
        'url' => 'https://youtu.be/ysz5S6PUM-U',
    ],
    [
        'title' => 'রুফটপ ও কমন এরিয়া',
        'description' => 'জলজ্যোৎস্নার রুফটপ গার্ডেন ও বসার জায়গার ভিডিও ট্যুর।',
        'poster' => 'https://images.unsplash.com/photo-1527030280862-64139fba04ca?w=800&q=80&auto=format&fit=crop',
        'url' => 'https://youtu.be/5qap5aO4i9A',
    ],
    [
        'title' => 'সাঁতার পুল এরিয়া ট্যুর',
        'description' => 'সুইমিং পুল ও রিলাক্সেশন জোনের ডিটেইল ভিডিও।',
        'poster' => 'https://images.unsplash.com/photo-1506731242341-d0f7eaf3ae86?w=800&q=80&auto=format&fit=crop',
        'url' => 'https://youtu.be/ScMzIvxBSi4',
    ],
    [
        'title' => 'জলজ্যোৎস্না মডেল অ্যাপার্টমেন্ট',
        'description' => 'মডেল অ্যাপার্টমেন্টের সম্পূর্ণ ভিডিও walkthrough।',
        'poster' => 'https://images.unsplash.com/photo-1598928506311-c55dedba0f9c?w=800&q=80&auto=format&fit=crop',
        'url' => 'https://youtu.be/Ln7zxnl4Pbc',
    ],
    [
        'title' => 'জিম ও ফিটনেস সেন্টার',
        'description' => 'ফিটনেস স্টুডিওর সুবিধা ও আধুনিক সরঞ্জাম দেখুন।',
        'poster' => 'https://images.unsplash.com/photo-1554284126-aa88f22d8b74?w=800&q=80&auto=format&fit=crop',
        'url' => 'https://youtu.be/M7lc1UVf-VE',
    ],
    [
        'title' => 'শিশুদের খেলার মাঠ',
        'description' => 'প্লেগ্রাউন্ড ও নিরাপদ খেলার সুবিধার ভিডিও।',
        'poster' => 'https://images.unsplash.com/photo-1599021636183-b3eee9ea1b67?w=800&q=80&auto=format&fit=crop',
        'url' => 'https://download.blender.org/peach/bigbuckbunny_movies/BigBuckBunny_320x180.mp4',
    ],
    [
        'title' => 'প্রকল্পের আশেপাশের পরিবেশ',
        'description' => 'জলজ্যোৎস্না প্রকল্পের আশেপাশের রাস্তা ও এলাকা দেখুন।',
        'poster' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?w=800&q=80&auto=format&fit=crop',
        'url' => 'https://youtu.be/aqz-KE-bpKQ',
    ],
];


        foreach ($videos as $video) {
            Video::create($video);
        }
    }
}
