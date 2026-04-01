<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\Gallery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $galleries = [
    [
        'title' => 'Jolchaya Front Elevation',
        'title_bn' => 'জলজ্যোৎস্না ভবনের সম্মুখভাগ',
        'category' => 'exterior',
        'image' => 'https://images.unsplash.com/photo-1501183638710-841dd1904471?q=80&w=800&auto=format&fit=crop',
        'order' => 1,
    ],
    [
        'title' => 'Premium Smart Living Room',
        'title_bn' => 'জলজ্যোৎস্নার প্রিমিয়াম লিভিং রুম',
        'category' => 'interior',
        'image' => 'https://images.unsplash.com/photo-1615873968403-89e7f414d977?q=80&w=800&auto=format&fit=crop',
        'order' => 2,
    ],
    [
        'title' => 'Green Courtyard',
        'title_bn' => 'সবুজ উঠান ও খোলা আঙিনা',
        'category' => 'landscape',
        'image' => 'https://images.unsplash.com/photo-1535905749930-227c7d8d4a79?q=80&w=800&auto=format&fit=crop',
        'order' => 3,
    ],
    [
        'title' => 'Modern Kitchen Setup',
        'title_bn' => 'আধুনিক রান্নাঘর ডিজাইন',
        'category' => 'interior',
        'image' => 'https://images.unsplash.com/photo-1600585154272-21ede790c41f?q=80&w=800&auto=format&fit=crop',
        'order' => 4,
    ],
    [
        'title' => 'Swimming Pool Area',
        'title_bn' => 'সুইমিং পুল ও রিলাক্সেশন জোন',
        'category' => 'exterior',
        'image' => 'https://images.unsplash.com/photo-1507089947368-19c1da9775ae?q=80&w=800&auto=format&fit=crop',
        'order' => 5,
    ],
    [
        'title' => 'Kids’ Play Zone',
        'title_bn' => 'শিশুদের খেলাধুলার এলাকা',
        'category' => 'landscape',
        'image' => 'https://images.unsplash.com/photo-1599021636183-b3eee9ea1b67?q=80&w=800&auto=format&fit=crop',
        'order' => 6,
    ],
    [
        'title' => 'Luxury Bedroom',
        'title_bn' => 'বিলাসবহুল শয়নকক্ষ',
        'category' => 'interior',
        'image' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?q=80&w=800&auto=format&fit=crop',
        'order' => 7,
    ],
    [
        'title' => 'Jolchaya Fitness Studio',
        'title_bn' => 'জলজ্যোৎস্না ফিটনেস জিম',
        'category' => 'amenities',
        'image' => 'https://images.unsplash.com/photo-1554284126-aa88f22d8b74?q=80&w=800&auto=format&fit=crop',
        'order' => 8,
    ],
    [
        'title' => 'Entrance & Lobby Area',
        'title_bn' => 'প্রবেশপথ ও লবি এলাকা',
        'category' => 'exterior',
        'image' => 'https://images.unsplash.com/photo-1582407947304-fd86f028f716?q=80&w=800&auto=format&fit=crop',
        'order' => 9,
    ],
    [
        'title' => 'Park Lounge',
        'title_bn' => 'পার্ক ভিউ লাউঞ্জ',
        'category' => 'landscape',
        'image' => 'https://images.unsplash.com/photo-1568145675398-d0c93463ec79?q=80&w=800&auto=format&fit=crop',
        'order' => 10,
    ],
    [
        'title' => 'Modern Bathroom',
        'title_bn' => 'আধুনিক বাথরুম',
        'category' => 'interior',
        'image' => 'https://images.unsplash.com/photo-1552324190-9e86fa095c9b?q=80&w=800&auto=format&fit=crop',
        'order' => 11,
    ],
    [
        'title' => 'Community Event Hall',
        'title_bn' => 'কমিউনিটি ইভেন্ট হল',
        'category' => 'amenities',
        'image' => 'https://images.unsplash.com/photo-1596524430615-b46475ddff6e?q=80&w=800&auto=format&fit=crop',
        'order' => 12,
    ],
];


        foreach ($galleries as $gallery) {
            Gallery::create($gallery);
        }
    }
}
