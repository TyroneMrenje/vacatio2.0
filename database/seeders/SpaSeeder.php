<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class SpaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $services=[
            'name'=>'Spa', 'image_path'=>'spa/spacoverpage.webp', 'description'=>"Indulge in a rejuvenating spa experience designed to restore balance, relaxation, and well-being. Our spa offers a range of therapeutic massages, revitalizing body treatments, facials, and wellness therapies performed by experienced professionals in a tranquil setting. Whether you're looking to unwind after a long journey or simply treat yourself to a moment of luxury, our spa provides the perfect escape for both body and mind."
        ];

      
            Service::firstOrCreate([
                'name'=>$services['name']
            ],
            [
                'image_path'=>$services['image_path'],
                'description'=>$services['description']
            ]
            );
        
    }
}
