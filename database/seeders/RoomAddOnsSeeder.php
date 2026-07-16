<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RoomAdd_Ons as AddOnsModel;

class RoomAddOnsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $roomaddons=[
            ['name'=>'Concierge', 'description'=>'Enjoy personalized assistance throughout your stay. Our concierge team is available to help with reservations, local recommendations, transportation arrangements, and special requests.', 'price'=>10700.00],
            ['name'=>'Transportation To/From SGR', 'description'=>'Travel with ease using our reliable transfer service to and from SGR. Enjoy comfortable, punctual transportation with professional drivers for a stress-free journey.', 'price'=>6500.00],//per person
            ['name'=>'Late Checkout', 'description'=>'Extend your stay and enjoy extra time to relax before departure. Late checkout lets you keep your room beyond the standard checkout time, subject to availability.', 'price'=>1800.00], //per hour
            ['name'=>'Romance Package', 'description'=>'Celebrate a special occasion with a romantic room setup featuring fresh flowers, sparkling wine or champagne, chocolates, and a candlelit ambiance for an unforgettable experience.','price'=>17900.00],
            ['name'=>'Dhow & Village Tours', 'description'=>"Discover the region's rich culture and coastal heritage with guided dhow cruises and authentic village tours. Experience breathtaking scenery, local traditions, and memorable encounters.",'price'=>2200.00],
            ['name'=>'Snorkelling & Sea Diving', 'description'=>"Explore the vibrant underwater world with guided snorkelling and scuba diving adventures. Discover colorful coral reefs, tropical marine life, and crystal-clear waters suitable for beginners and experienced divers alike.", 'price'=>12700.00]
        ];

        foreach($roomaddons as $roomaddon){
            AddOnsModel::firstOrCreate([
                'name'=>$roomaddon['name']
            ],
            [
                'description'=>$roomaddon['description'],
                'price'=>$roomaddon['price']
            ]);
        }
    }
}
