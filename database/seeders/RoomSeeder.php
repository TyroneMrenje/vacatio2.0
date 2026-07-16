<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Room as RoomModel;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $rooms=[
            ['name' => 'Deluxe','amenities' => ['Coffee and/or tea making facilities', 'Half Board', 'Complimentary minibar (soft drinks only)', 'Baby bed allowed', 'Desk', 'Connecting room(s) available'], 'description' => 'The Deluxe Room offers a comfortable and stylish stay, perfect for both business and leisure travelers. Enjoy a spacious layout with modern furnishings, a plush queen-size bed, complimentary high-speed Wi-Fi, air conditioning, a flat-screen TV, and a well-appointed en-suite bathroom. Large windows provide plenty of natural light, creating a relaxing atmosphere after a day of work or exploration.', 'bed_size'=>'King Bed or 2 Twin Beds', 'area_size'=> 32, 'view' => 'Beach view', 'max_occupancy'=>3, 'price'=>28900.00],
            
            ['name' => 'Luxury','amenities' => ['Balcony','Coffee and/or tea making facilities', 'Full Board', 'Complimentary minibar (soft drinks only)', 'Desk', 'Bathtub and separate shower','Connecting room(s) available'], 'description' => 'The Luxury Room provides an elevated accommodation experience with refined interiors, premium furnishings, and enhanced comfort. Featuring a king-size bed with luxury linens, a generous seating area, elegant décor, a minibar, coffee station, high-speed Wi-Fi, smart TV, and a spacious bathroom with premium toiletries, this room is designed for guests seeking both sophistication and relaxation. Select rooms also include a private balcony with scenic views.', 'bed_size' => 'King Bed', 'area_size' => 37, 'view' => 'Beach view', 'max_occupancy'=>2, 'price'=> 37300.00],

            ['name'=> 'Executive Suite', 'amenities' =>['Balcony','Coffee and/or tea making facilities','Full Board','Complimentary minibar (soft drinks only)', 'Safe' , 'Desk', 'Baby bed allowed','Bathtub and separate shower', 'Connecting room(s) available'], 'description'=> 'The Executive Room represents the pinnacle of comfort and exclusivity, crafted for discerning travelers who expect exceptional service and premium amenities. This expansive suite features a luxurious king-size bed, a separate lounge area, dedicated workspace, panoramic views, complimentary minibar, espresso machine, smart entertainment system, and a spacious spa-inspired bathroom with a rainfall shower and soaking tub. Guests also enjoy priority services, executive-level amenities, and an atmosphere of elegance that delivers an unforgettable stay.','bed_size'=>'King Bed', 'area_size'=> 41, 'view' => 'City view', 'max_occupancy'=>2, 'price'=>52500.00 ]
        ];

        foreach($rooms as $room){
          RoomModel::firstOrCreate([
            'name'=> $room['name'],
            'description'=>$room['description'],
            'area_size'=>$room['area_size'],
            'bed_size'=>$room['bed_size'],
            'price'=>$room['price'],
            'view'=>$room['view'],
            'max_occupancy'=>$room['max_occupancy'],
          ],
          [
            'amenities'=>$room['amenities']
          ],
          );
        }
    }
}
