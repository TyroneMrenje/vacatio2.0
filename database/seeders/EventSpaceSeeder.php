<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EventSpace;

class EventSpaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $eventSpaces=[
            ['name'=>'Garden','image_path'=>'event/garden/garden_venue.jpeg', 'description'=>'A beautifully landscaped outdoor venue perfect for weddings, private celebrations, cocktail receptions, and social gatherings. Enjoy a serene atmosphere surrounded by lush greenery and natural beauty.', 'contact_email'=>'vacatiogarden@gmail.com'],

            ['name'=>'Meeting Room','image_path'=>'event/office/officio.jpeg', 'description'=>"A modern and professional meeting space designed for presentations, workshops, interviews, and business meetings. Equipped with comfortable seating and essential facilities for productive sessions.", 'contact_email'=>'vacatioffice@gmail.com'],

            ['name'=>'Corporate Hall','image_path'=>'event/hall/corporatehaal.jpg', 'description'=>"A spacious, fully equipped venue ideal for conferences, exhibitions, product launches, gala dinners, and large corporate events. Designed to accommodate large audiences while providing a premium event experience.", 'contact_email'=>'vacatiohall@gmail.com'],
               
        ];

        foreach($eventSpaces as $eventSpace){
            EventSpace::firstOrCreate([
                'name'=>$eventSpace['name']
            ],[
                'image_path'=>$eventSpace['image_path'],
                'description'=>$eventSpace['description'],
                'contact_email'=>$eventSpace['contact_email']

            ]);
        }

    }
}
