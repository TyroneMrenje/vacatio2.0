<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class RoomController extends Controller
{
    //
    public function getRoom(){

        $location= "livingroom";

        $room= DB::table('rooms')
        ->join('room_images', 'rooms.id', '=', 'room_images.room_id')
        ->select('rooms.id','rooms.name','rooms.description','rooms.bed_size','rooms.area_size','room_images.image_url', 'room_images.location', 'room_images.room_id')
        ->where('room_images.location','like', "%{$location}%")
        ->orderBy('price','asc')
        ->get();
        
        return Inertia::render('room/room',[
            'roomies'=>$room
        ]);
      
    }

    public function getRoomQuery(string $id,string $room){
        abort_if(!DB::table('rooms')->where('name', $room)->exists(), 404);

        $locationA="livingroom";
        $locationB="bathroom";
        $locationC="view";

        $locationAQuery=Db::table('room_images')
        ->select('room_images.id','room_images.image_url', 'room_images.location', 'room_images.room_id')
        ->where('room_images.location','like', "%{$locationA}%")
        ->where('room_images.room_id',$id)
        ;

        $locationBQuery=Db::table('room_images')
        ->select('room_images.id','room_images.image_url', 'room_images.location', 'room_images.room_id')
        ->where('room_images.location','like', "%{$locationB}%")
        ->where('room_images.room_id',$id)
        ;

        $locationCQuery=Db::table('room_images')
        ->select('room_images.id','room_images.image_url', 'room_images.location', 'room_images.room_id')
        ->where('room_images.location','like', "%{$locationC}%")
        ->where('room_images.room_id',$id)
        ;

        $roomDescriptions= DB::table('rooms')
        ->select('rooms.id','rooms.name','rooms.description','rooms.amenities','rooms.view','rooms.max_occupancy','rooms.bed_size','rooms.area_size')
        ->where('rooms.id',$id);

        $results=DB::query()
        ->fromSub($roomDescriptions, 'room_description')
        ->joinSub($locationAQuery,'locationA', 'locationA.room_id', '=', 'room_description.id')
        ->joinSub($locationBQuery,'locationB', 'locationB.room_id', '=', 'room_description.id')
        ->joinSub($locationCQuery,'locationC', 'locationC.room_id', '=', 'room_description.id')
        ->select(
            'room_description.id', 'room_description.name', 'room_description.description',
            'room_description.amenities', 'room_description.view', 'room_description.max_occupancy',
            'room_description.bed_size', 'room_description.area_size',
            'locationA.image_url as living_room_image', 'locationA.location as living_room_location',
            'locationB.image_url as bathroom_image', 'locationB.location as bathroom_location',
            'locationC.image_url as view_image', 'locationC.location as view_location'
        )
        ->first();

        $results->amenities= json_decode($results->amenities,true) ?? [];

        return inertia::render('room/room-page',[
            'roomDetails'=>$results
        ]);
    }
}
