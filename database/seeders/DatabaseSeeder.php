<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        $this->call([
            FooterSettingSeeder::class,
            OurProjectSeeder::class,
            SocialMediaSeeder::class,
            TestimonialSeeder::class,
            HeaderSettingSeeder::class,
            FeatureSeeder::class,
            PricingSeeder::class,
            HeroSliderSeeder::class,
            AboutSectionSeeder::class,
            TeamMemberSeeder::class,
            ProjectSectionSeeder::class,
            VideoSeeder::class,
            AmenitySeeder::class,
            GallerySeeder::class,
            DiscountOfferSeeder::class,
            NewsSeeder::class,
            WhyChooseFaqSeeder::class,
            EventSeeder::class,
            PartnerSeeder::class,
            ProkolpoSeeder::class,
            OtherMembersSeeder::class,
        ]);
    }
}
