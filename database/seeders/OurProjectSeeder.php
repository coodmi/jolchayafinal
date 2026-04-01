<?php

namespace Database\Seeders;

use App\Models\OurProject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OurProjectSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $projects = [
    [
        'title' => 'জলছায়া সিগনেচার রেসিডেন্স',
        'description' => 'ঢাকার শান্ত অথচ কেন্দ্রিক অবস্থানে জলছায়ার প্রিমিয়াম সিগনেচার রেসিডেন্স প্রকল্প। আধুনিক স্থাপত্য, প্রশস্ত কক্ষ, প্রাকৃতিক আলো-বাতাস এবং উন্নতমানের সিকিউরিটি সিস্টেমসহ একটি বিলাসবহুল আবাসন অভিজ্ঞতা। ৩ ও ৪ বেডরুম ইউনিট উপলব্ধ।',
        'image_path' => 'https://images.unsplash.com/photo-1582268611958-ebfd161ef9cf?q=80&w=800&auto=format&fit=crop',
        'cta_text' => 'বিস্তারিত জানুন',
        'cta_link' => '/projects/jolchaya-signature-residence',
        'order' => 1,
        'is_active' => true,
    ],

    [
        'title' => 'জলছায়া হারমনি হোমস',
        'description' => 'পরিকল্পিত ও শান্ত পরিবেশে নির্মিত হারমনি হোমস প্রকল্পে রয়েছে শিশুদের খেলার মাঠ, সবুজ লন, কমিউনিটি স্পেস এবং ২৪/৭ নিরাপত্তা। পরিবার নিয়ে আরামদায়ক জীবনযাপনের জন্য আদর্শ।',
        'image_path' => 'https://images.unsplash.com/photo-1600585154084-4e5fe7c3913a?q=80&w=800&auto=format&fit=crop',
        'cta_text' => 'বিস্তারিত জানুন',
        'cta_link' => '/projects/jolchaya-harmony-homes',
        'order' => 2,
        'is_active' => true,
    ],

    [
        'title' => 'জলছায়া গ্রীনল্যান্ড কন্ডোমিনিয়াম',
        'description' => 'পরিবেশবান্ধব পরিকল্পনা, রেইনওয়াটার হার্ভেস্টিং, সোলার এনার্জি সলিউশন এবং সবুজায়ন নিয়ে আধুনিক গ্রীনল্যান্ড কন্ডোমিনিয়াম। গুলশান সংলগ্ন প্রিমিয়াম লোকেশনে অবস্থিত।',
        'image_path' => 'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?q=80&w=800&auto=format&fit=crop',
        'cta_text' => 'বিস্তারিত জানুন',
        'cta_link' => '/projects/jolchaya-greenland',
        'order' => 3,
        'is_active' => true,
    ],

    [
        'title' => 'জলছায়া স্কাইলাইন টাওয়ার',
        'description' => '২৫ তলা বিশিষ্ট আল্ট্রা-মডার্ন স্কাইস্ক্র্যাপার প্রকল্প। সিটি ভিউ, হাই-স্পিড লিফট, জিম, রুফটপ গার্ডেন এবং সুইমিং পুল সুবিধাসহ প্রিমিয়াম লিভিং। ব্যবসায়ীদের জন্য আদর্শ অবস্থান।',
        'image_path' => 'https://images.unsplash.com/photo-1486304873000-235643847519?q=80&w=800&auto=format&fit=crop',
        'cta_text' => 'বিস্তারিত জানুন',
        'cta_link' => '/projects/jolchaya-skyline-tower',
        'order' => 4,
        'is_active' => true,
    ],

    [
        'title' => 'জলছায়া লেকসাইড রেসিডেন্স',
        'description' => 'উত্তরা লেকের শান্ত পরিবেশে অবস্থিত বিলাসবহুল লেকসাইড রেসিডেন্স। সকালে জগিং ট্র্যাক, সবুজ গার্ডেন, কমিউনিটি স্পেস এবং প্রিমিয়াম ডিজাইনের ফ্ল্যাট—সব মিলিয়ে পরিবার নিয়ে থাকার জন্য একটি নিখুঁত সমাধান।',
        'image_path' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=800&auto=format&fit=crop',
        'cta_text' => 'বিস্তারিত জানুন',
        'cta_link' => '/projects/jolchaya-lakeside',
        'order' => 5,
        'is_active' => true,
    ],

    [
        'title' => 'জলছায়া কমার্শিয়াল প্লেক্স',
        'description' => 'শপিং মল এবং করপোরেট অফিস স্পেস নিয়ে তৈরি কমার্শিয়াল প্লেক্স। কেন্দ্রীয় অবস্থান, পর্যাপ্ত পার্কিং, সিসিটিভি মনিটরিং এবং অত্যাধুনিক ফায়ার সেফটি সিস্টেমসহ একটি সম্পূর্ণ বাণিজ্যিক সমাধান।',
        'image_path' => 'https://images.unsplash.com/photo-1507679799987-c73779587ccf?q=80&w=800&auto=format&fit=crop',
        'cta_text' => 'বিস্তারিত জানুন',
        'cta_link' => '/projects/jolchaya-commercial-plex',
        'order' => 6,
        'is_active' => true,
    ],

    [
        'title' => 'জলছায়া সিটি হিলস এপার্টমেন্ট',
        'description' => 'মিরপুরে মধ্যবিত্ত পরিবারের জন্য পরিকল্পিত সাশ্রয়ী এপার্টমেন্ট প্রকল্প। লিফট, জেনারেটর, নিরাপত্তা ব্যবস্থা এবং পরিষ্কার-পরিচ্ছন্ন পরিবেশসহ একটি সুরক্ষিত আবাসন।',
        'image_path' => 'https://images.unsplash.com/photo-1560448075-bb485b067938?q=80&w=800&auto=format&fit=crop',
        'cta_text' => 'বিস্তারিত জানুন',
        'cta_link' => '/projects/jolchaya-city-hills',
        'order' => 7,
        'is_active' => true,
    ],

    [
        'title' => 'জলছায়া রয়্যাল ভিলা',
        'description' => 'ধানমন্ডিতে অবস্থিত আল্ট্রা-লাক্সারি ভিলা-স্টাইল এপার্টমেন্ট। প্রাইভেট লিফট, স্মার্ট হোম অটোমেশন, প্রিমিয়াম ইন্টেরিয়র এবং উন্নত নিরাপত্তা ব্যবস্থাসহ বিশেষ শ্রেণির বাসিন্দাদের জন্য তৈরি।',
        'image_path' => 'https://images.unsplash.com/photo-1600585154207-0a06f9e5c76e?q=80&w=800&auto=format&fit=crop',
        'cta_text' => 'বিস্তারিত জানুন',
        'cta_link' => '/projects/jolchaya-royal-villa',
        'order' => 8,
        'is_active' => true,
    ],
];


        foreach ($projects as $project) {
            OurProject::create($project);
        }
    }
}
