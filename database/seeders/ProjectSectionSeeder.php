<?php

namespace Database\Seeders;

use App\Models\ProjectSection;
use Illuminate\Database\Seeder;

class ProjectSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hero Section (প্রকল্প পেজ হিরো সেকশন)
        ProjectSection::updateOrCreate(
            ['section_key' => 'hero'],
            [
                'title' => 'আমাদের প্রকল্প',
                'subtitle' => 'নেক্স রিয়েল এস্টেট এর অসাধারণ কিছু প্রকল্পের এক ঝলক।',
                'content' => 'আমরা বাংলাদেশ জুড়ে আবাসিক ও বাণিজ্যিক প্রকল্প উন্নয়নে কাজ করছি। প্রতিটি প্রকল্প আধুনিক স্থাপত্য, উন্নত নিরাপত্তা এবং সবুজ পরিবেশের সমন্বয়ে তৈরি।',
                'image_url' => 'https://images.unsplash.com/photo-1505691938895-1758d7feb511?auto=format&fit=crop&w=1500&q=80',
                'is_active' => true
            ]
        );

        // Slogan Section (স্লোগান সেকশন)
        ProjectSection::updateOrCreate(
            ['section_key' => 'slogan'],
            [
                'title' => 'বিশ্বাসের প্রতীক NEX Real Estate',
                'subtitle' => null,
                'content' => 'আমরা বাংলাদেশে প্রিমিয়াম রিয়েল এস্টেট উন্নয়নে কাজ করছি। উন্নত মান, আইনি নিশ্চয়তা এবং আধুনিক সুবিধা দিয়ে প্রতিটি প্রকল্প তৈরি করা হয়েছে আপনার জীবনকে সুন্দর ও নিরাপদ করতে। আমরা প্রতিশ্রুতিবদ্ধ যে প্রতিটি প্রকল্পে গুণমান, স্বচ্ছতা এবং গ্রাহক সেবায় সর্বোচ্চ মান বজায় রাখব।',
                'logo_url' => 'https://cdn-icons-png.flaticon.com/512/3256/3256013.png',
                'is_active' => true
            ]
        );

        // Roadmap Section (প্রকল্প রোডম্যাপ)
        ProjectSection::updateOrCreate(
            ['section_key' => 'roadmap'],
            [
                'title' => 'বেছে নিন আপনার পছন্দের প্লট',
                'subtitle' => 'প্রকল্প রোডম্যাপ',
                'content' => null,
                'extra_data' => json_encode([
                    'offerTitle' => 'বেছে নিন আপনার পছন্দের প্লট',
                    'plots' => [
                        ['size' => '৮ কাঠা', 'cat' => 'প্রিমিয়াম প্লট', 'cta_text' => '', 'cta_link' => ''],
                        ['size' => '১০ কাঠা', 'cat' => 'ডিলাক্স প্লট', 'cta_text' => '', 'cta_link' => ''],
                        ['size' => '৩০ কাঠা', 'cat' => 'এক্সিকিউটিভ প্লট', 'cta_text' => '', 'cta_link' => ''],
                        ['size' => '২০ কাঠা', 'cat' => 'কর্পোরেট প্লট', 'cta_text' => '', 'cta_link' => '']
                    ],
                    'amenities' => [
                        'ক্লাব হাউজ',
                        'জিম',
                        'মসজিদ',
                        'শপিং এরিয়া',
                        'পার্ক ও খেলার মাঠ',
                        'কমিউনিটি সেন্টার'
                    ],
                    'footerNote' => '<p>সবুজ প্রকৃতি, নীরব কলকল ধারা আর নির্মল আবহাওয়া — এই জায়গাটি হতে পারে আপনার স্বপ্নের ঠিকানা! এখানে আছে আধুনিক রাস্তাঘাট, বিদ্যুৎ, পানি, গ্যাস, ও নিরাপত্তার নিশ্চয়তা।</p><p>মূল্য বৃদ্ধির আগে, আজই বুকিং করুন।</p>',
                    'ctaBar' => '📞 এখনই যোগাযোগ করুন — সীমিত সময়ের অফার'
                ]),
                'image_url' => '/images/Map.png',
                'is_active' => true
            ]
        );
        // Info Section (নতুন সেকশন - Sparrow.ai Aesthetic)
        ProjectSection::updateOrCreate(
            ['section_key' => 'info_section'],
            [
                'title' => 'Elevate your lifestyle with Jolchaya Modern Luxury Homes',
                'subtitle' => null,
                'content' => 'Experience the perfect blend of modern architecture and natural beauty. Our projects are designed to provide maximum comfort and security for you and your family.',
                'image_url' => '/images/projects/realstate3.png',
                'extra_data' => [
                    'trust_badge' => 'Trusted by 500+ Happy Families',
                    'btn1_text' => 'আরও বিস্তারিত',
                    'btn2_text' => 'প্রকল্পসমূহ',
                    'card1_label' => 'Growth Analytics',
                    'card1_value' => '+124% leads',
                    'card2_label' => 'Customer Choice',
                    'card3_label' => 'Unlock Modern Living',
                ],
                'is_active' => true
            ]
        );

        // Discount Offers Section
        ProjectSection::updateOrCreate(
            ['section_key' => 'discount_offers'],
            [
                'title' => 'Exclusive Offers & Discounts',
                'subtitle' => 'Get the best deals on your dream property with our limited-time special offers.',
                'is_active' => true
            ]
        );

        // Visit Booking Section (Escape to Reality)
        ProjectSection::updateOrCreate(
            ['section_key' => 'visit_booking'],
            [
                'title' => 'ESCAPE TO REALITY',
                'subtitle' => null,
                'content' => 'প্রকৃতির সান্নিধ্যে আধুনিক নাগরিক জীবনের অভিজ্ঞতা নিতে আজই আপনার ভিজিট প্ল্যান বুক করুন।',
                'image_url' => 'https://images.unsplash.com/photo-1473448912268-2022ce9509d8?auto=format&fit=crop&w=1500&q=80',
                'is_active' => true,
                'extra_data' => json_encode([
                    'loc_label' => 'Project Location',
                    'loc_place' => 'Which project?',
                    'date_label' => 'Visit Date',
                    'guest_label' => 'Guests',
                    'phone_label' => 'Phone Number',
                    'phone_place' => 'Your phone'
                ])
            ]
        );

        // Partners Section
        ProjectSection::updateOrCreate(
            ['section_key' => 'partners'],
            [
                'title' => 'আমাদের পার্টনারসমূহ',
                'subtitle' => 'বিশ্বস্ত পার্টনারদের সাথে আমাদের অগ্রযাত্রা',
                'content' => null,
                'image_url' => null,
                'is_active' => true
            ]
        );

        // Why Choose Section
        ProjectSection::updateOrCreate(
            ['section_key' => 'why_choose'],
            [
                'title' => 'কেন জলছায়া?',
                'subtitle' => 'আধুনিক নাগরিক জীবনের সব সুবিধা নিয়ে আমরা আছি আপনার পাশে।',
                'content' => null,
                'image_url' => null,
                'is_active' => true
            ]
        );

        // FAQ Section
        ProjectSection::updateOrCreate(
            ['section_key' => 'faq'],
            [
                'title' => 'সাধারণ প্রশ্নাবলী (FAQ)',
                'subtitle' => 'আপনার মনে আসা কিছু সাধারণ প্রশ্নের উত্তর এখানে খুঁজে পেতে পারেন।',
                'content' => null,
                'image_url' => null,
                'is_active' => true
            ]
        );
    }
}
