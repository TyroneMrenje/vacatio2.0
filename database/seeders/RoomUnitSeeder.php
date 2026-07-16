<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Room as RoomModel;
use App\Models\RoomUnits;

class RoomUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $roomUnits=[
            ['name'=>'Deluxe', 'unit_number'=>'DEL_001'],
            ['name'=>'Deluxe', 'unit_number'=>'DEL_002'],
            ['name'=>'Deluxe', 'unit_number'=>'DEL_003'],
            ['name'=>'Deluxe', 'unit_number'=>'DEL_004'],
            ['name'=>'Deluxe', 'unit_number'=>'DEL_005'],
            ['name'=>'Deluxe', 'unit_number'=>'DEL_006'],
            ['name'=>'Deluxe', 'unit_number'=>'DEL_007'],
            ['name'=>'Deluxe', 'unit_number'=>'DEL_008'],
            ['name'=>'Deluxe', 'unit_number'=>'DEL_009'],
            ['name'=>'Deluxe', 'unit_number'=>'DEL_010'],
            ['name'=>'Deluxe', 'unit_number'=>'DEL_011'],
            ['name'=>'Deluxe', 'unit_number'=>'DEL_012'],
            ['name'=>'Deluxe', 'unit_number'=>'DEL_013'],
            ['name'=>'Deluxe', 'unit_number'=>'DEL_014'],
            ['name'=>'Deluxe', 'unit_number'=>'DEL_015'],
            ['name'=>'Deluxe', 'unit_number'=>'DEL_016'],
            ['name'=>'Deluxe', 'unit_number'=>'DEL_017'],
            ['name'=>'Deluxe', 'unit_number'=>'DEL_018'],
            ['name'=>'Deluxe', 'unit_number'=>'DEL_019'],
            ['name'=>'Luxury', 'unit_number'=>'LUX_001'],
            ['name'=>'Luxury', 'unit_number'=>'LUX_002'],
            ['name'=>'Luxury', 'unit_number'=>'LUX_003'],
            ['name'=>'Luxury', 'unit_number'=>'LUX_004'],
            ['name'=>'Luxury', 'unit_number'=>'LUX_005'],
            ['name'=>'Luxury', 'unit_number'=>'LUX_006'],
            ['name'=>'Luxury', 'unit_number'=>'LUX_007'],
            ['name'=>'Luxury', 'unit_number'=>'LUX_008'],
            ['name'=>'Luxury', 'unit_number'=>'LUX_009'],
            ['name'=>'Luxury', 'unit_number'=>'LUX_010'],
            ['name'=>'Luxury', 'unit_number'=>'LUX_011'],
            ['name'=>'Luxury', 'unit_number'=>'LUX_012'],
            ['name'=>'Luxury', 'unit_number'=>'LUX_013'],
            ['name'=>'Luxury', 'unit_number'=>'LUX_014'],
            ['name'=>'Executive Suite', 'unit_number'=>'EXEC_OO1'],
            ['name'=>'Executive Suite', 'unit_number'=>'EXEC_OO2'],
            ['name'=>'Executive Suite', 'unit_number'=>'EXEC_OO3'],
            ['name'=>'Executive Suite', 'unit_number'=>'EXEC_OO4'],
            ['name'=>'Executive Suite', 'unit_number'=>'EXEC_OO5'],
            ['name'=>'Executive Suite', 'unit_number'=>'EXEC_OO6'],
            ['name'=>'Executive Suite', 'unit_number'=>'EXEC_OO7'],
            ['name'=>'Executive Suite', 'unit_number'=>'EXEC_OO8'],
            ['name'=>'Executive Suite', 'unit_number'=>'EXEC_OO9'],
            ['name'=>'Executive Suite', 'unit_number'=>'EXEC_O10'],
            ['name'=>'Executive Suite', 'unit_number'=>'EXEC_O11'],
            ['name'=>'Executive Suite', 'unit_number'=>'EXEC_O12'],
            ['name'=>'Executive Suite', 'unit_number'=>'EXEC_O15'],
            
        ];

         foreach($roomUnits as $roomUnit){
            $room= RoomModel::where('name', $roomUnit['name'])->first();

            if($room){
                $roomId=$room->id;

                RoomUnits::firstOrCreate([
                    'room_id'=>$roomId,
                    'unit_number'=>$roomUnit['unit_number']

                ],[

                ]);                
            }

         }
    }
}
