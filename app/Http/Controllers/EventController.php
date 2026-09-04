<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use App\Models\EventSpace;

class EventController extends Controller
{
    //
    public function getEventDetails(){

        $eventQuery=DB::table('event_space')
        ->select('event_space.id','event_space.name','event_space.image_path','event_space.description','event_space.contact_email')
        ->get();


        return Inertia::render('event/eventspace',[
            'event'=>$eventQuery,
        ]);

    }

    public function getEventSpace( string $id , string $name){

      $eventDetails= DB::table('event_space')
        ->select('event_space.id','event_space.name','event_space.image_path','event_space.description','event_space.contact_email')
        ->where('event_space.id', $id)
        ->where('event_space.name', $name)
        ->first();

    
     return Inertia::render('event/eventbooking',[
        'eventDetails'=>$eventDetails
     ]);

    }

}
 