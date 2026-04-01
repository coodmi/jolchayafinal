<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PricingPlan;
use App\Models\PricingSetting;

class PricingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create pricing settings
        PricingSetting::updateOrCreate(
            [],
            [
                'section_title' => 'মূল্য তালিকা',
                'section_subtitle' => 'আপনার বাজেট অনুযায়ী নির্বাচন করুন',
                'installment_title' => 'কিস্তি সুবিধা',
                'installment_options' => ['০৩ কিস্তি', '০৫ কিস্তি', '১০ কিস্তি', '২০ কিস্তি']
            ]
        );

        // Create default pricing plans
        $plans = [
            [
                'title' => '২০ কুড়া মালা (২.৫ কাঠা)',
                'plot_size' => '২.৫ কাঠা',
                'price' => 800000.00,
                'features' => [
                    '০৩% ডাউন পেমেন্ট: ৩৫,০০,০০০ টাকা',
                    '০৩ কিস্তি: ৪০,০০,০০০ টাকা',
                    '০৫ কিস্তি: ৯,৪০,০০,০০০ টাকা',
                    '১০ কিস্তি: ৯,৯৬,০০,০০০ টাকা',
                    '২০ কিস্তি: ১,৩৮,০০,০০০ টাকা'
                ],
                'is_popular' => false,
                'order' => 1,
                'is_active' => true,
                'cta_text' => 'বুকিং করুন',
                'cta_link' => '#booking',
            ],
            [
                'title' => '৩০ কুড়া মালা (৩.৭৫ কাঠা)',
                'plot_size' => '৩.৭৫ কাঠা',
                'price' => 880000.00,
                'features' => [
                    '০৩% ডাউন পেমেন্ট: ৩৮,৪৯,৯৯৯ টাকা',
                    '০৩ কিস্তি: ১০,৮৮,৯৯৯ টাকা',
                    '০৫ কিস্তি: ১,০৩,০০,০০০ টাকা',
                    '১০ কিস্তি: ১,৮৮,০৯,৯৯৯ টাকা',
                    '২০ কিস্তি: ১,২৮,৮০,০০০ টাকা'
                ],
                'is_popular' => true,
                'order' => 2,
                'is_active' => true,
                'cta_text' => 'এখনই বুকিং করুন',
                'cta_link' => '#booking',
            ],
            [
                'title' => '৪০ কুড়া মালা (৫ কাঠা)',
                'plot_size' => '৫ কাঠা',
                'price' => 860000.00,
                'features' => [
                    '০৩% ডাউন পেমেন্ট: ৩৭,৫০,০০০ টাকা',
                    '০৩ কিস্তি: ১৮,০০,০০০ টাকা',
                    '০৫ কিস্তি: ৯,৭৮,০০,০০০ টাকা',
                    '১০ কিস্তি: ৯,৭৮,০০,০০০ টাকা',
                    '২০ কিস্তি: ১,২৭,৮০,০০০ টাকা'
                ],
                'is_popular' => false,
                'order' => 3,
                'is_active' => true,
                'cta_text' => 'বুকিং করুন',
                'cta_link' => '#booking',
            ],
            [
                'title' => '৫০ কুড়া মালা (৬.২৫ কাঠা)',
                'plot_size' => '৬.২৫ কাঠা',
                'price' => 980000.00,
                'features' => [
                    '০৩% ডাউন পেমেন্ট: ৪৫,০০,০০০ টাকা',
                    '০৩ কিস্তি: ২০,০০,০০০ টাকা',
                    '০৫ কিস্তি: ১২,৪০,০০,০০০ টাকা',
                    '১০ কিস্তি: ১১,৯৬,০০,০০০ টাকা',
                    '২০ কিস্তি: ১,৪৮,০০,০০০ টাকা'
                ],
                'is_popular' => false,
                'order' => 4,
                'is_active' => true,
                'cta_text' => 'বুকিং করুন',
                'cta_link' => '#booking',
            ],
            [
                'title' => '৬০ কুড়া মালা (৭.৫ কাঠা)',
                'plot_size' => '৭.৫ কাঠা',
                'price' => 1150000.00,
                'features' => [
                    '০৩% ডাউন পেমেন্ট: ৫৫,০০,০০০ টাকা',
                    '০৩ কিস্তি: ২৫,০০,০০০ টাকা',
                    '০৫ কিস্তি: ১৪,৪০,০০,০০০ টাকা',
                    '১০ কিস্তি: ১৩,৯৬,০০,০০০ টাকা',
                    '২০ কিস্তি: ১,৬৮,০০,০০০ টাকা'
                ],
                'is_popular' => false,
                'order' => 5,
                'is_active' => true,
                'cta_text' => 'বুকিং করুন',
                'cta_link' => '#booking',
            ],
        ];

        foreach ($plans as $plan) {
            PricingPlan::updateOrCreate(
                ['title' => $plan['title']],
                $plan
            );
        }
    }
}
