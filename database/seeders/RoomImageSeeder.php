<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Room as RoomModel;
use App\Models\RoomImages;

class RoomImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $roomImages=[
            ['name' => 'Deluxe', 'location' => 'bathroom', 'image_url' => 'hotel/bathroom/deluxe_bath.jpg'],
            ['name' => 'Luxury', 'location' => 'bathroom', 'image_url' => 'hotel/bathroom/lux_bathroom.webp'],
            ['name' => 'Executive Suite', 'location' => 'bathroom', 'image_url' => 'hotel/bathroom/exec_bath.jpeg'],
            ['name' => 'Deluxe', 'location' => 'livingroom', 'image_url'=>'hotel/livingroom/deluxe_living.png'],
            ['name' => 'Luxury', 'location' => 'livingroom', 'image_url'=>'hotel/livingroom/lux_living.webp'],
            ['name' => 'Executive Suite', 'location' => 'livingroom', 'image_url' => 'hotel/livingroom/exec_living.jpeg'],
            ['name' => 'Deluxe', 'location' => 'view', 'image_url' => 'hotel/view/deluxe_view.jpeg'],
            ['name' => 'Luxury', 'location' => 'view', 'image_url' => 'hotel/view/lux_view.avif'],
            ['name' => 'Executive Suite', 'location' => 'view', 'image_url' => 'hotel/view/exec_view.jpeg'],
        ];

        foreach($roomImages as $roomImage){
            $room= RoomModel::where('name', $roomImage['name'])->first();

            if($room){
                $roomId= $room->id;

                RoomImages::updateOrcreate(
                    [
                        'room_id'=>$roomId,
                        'image_url'=>$roomImage['image_url']

                    ],
                    [
                        'location'=>$roomImage['location'],
                        
                    ]);
            }
        }

    }
}
