<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Partner;

class PartnerSeeder extends Seeder
{
    public function run(): void
    {
        $partners = [
            [
                'name' => 'জলছায়া',
                'logo_path' => '/images/projects/joljochna1.png',
                'website_url' => 'https://www.nexxgroup.biz',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'name' => 'Nexx Group',
                'logo_path' => '/images/projects/joljochna1.png',
                'website_url' => 'https://www.nexxgroup.biz',
                'is_active' => true,
                'order' => 2,
            ],
            [
                'name' => 'Partner 3',
                'logo_path' => '/images/projects/joljochna1.png',
                'website_url' => '#',
                'is_active' => true,
                'order' => 3,
            ],
            [
                'name' => 'Partner 4',
                'logo_path' => '/images/projects/joljochna1.png',
                'website_url' => '#',
                'is_active' => true,
                'order' => 4,
            ],
        ];

        foreach ($partners as $partner) {
            Partner::updateOrCreate(
                ['name' => $partner['name']],
                $partner
            );
        }
    }
}
