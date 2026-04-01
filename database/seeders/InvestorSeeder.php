<?php

namespace Database\Seeders;

use App\Models\Investor;
use App\Models\Booking;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class InvestorSeeder extends Seeder
{
    public function run(): void
    {
        // Create a test investor
        $investor = Investor::updateOrCreate(
            ['email' => 'investor@example.com'],
            [
                'name' => 'Test Investor',
                'phone' => '01711000000',
                'password' => Hash::make('password'),
                'address' => 'Dhaka, Bangladesh',
                'status' => 'active',
            ]
        );

        // Create a sample purchase/booking for this investor
        $booking = Booking::updateOrCreate(
            [
                'investor_id' => $investor->id,
                'project_name' => 'Jol Chaya Eco Resort',
            ],
            [
                'unit_name' => 'Plot-A1',
                'total_amount' => 1200000,
                'paid_amount' => 200000,
                'booking_date' => Carbon::now()->subMonths(2),
                'status' => 'confirmed',
            ]
        );

        // Create EMI Schedule
        $emiAmount = 50000;
        for ($i = 1; $i <= 24; $i++) {
            \DB::table('emi_schedules')->updateOrInsert(
                [
                    'booking_id' => $booking->id,
                    'installment_no' => $i,
                ],
                [
                    'amount' => $emiAmount,
                    'due_date' => Carbon::now()->subMonths(2)->addMonths($i)->startOfMonth()->addDays(9),
                    'status' => $i <= 2 ? 'paid' : 'pending',
                    'paid_at' => $i <= 2 ? Carbon::now()->subMonths(3 - $i) : null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
