<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class SpaController extends Controller
{
    //
    public function SpaPage(){

    $service1='TREATMENTS';
    $service2='VACATIO BODY CEREMONIES';
    $service3='FACIAL TREATMENTS';


    $spacoverpage= DB::table('service')
    ->select('service.id','service.name','service.image_path','service.description')
    ->first();

    $treatments=DB::table('service_menu')
        ->select('service_menu.id','service_menu.name','service_menu.price','service_menu.description','service_menu.title','service_menu.time')
        ->where('service_menu.title', 'like', "%{$service1}%")
        ->get()
        ;

        $vacatio_body_ceremonies=DB::table('service_menu')
        ->select('service_menu.id','service_menu.name','service_menu.price','service_menu.description','service_menu.title','service_menu.time')
        ->where('service_menu.title', 'like', "%{$service2}%")
        ->get()
        ;

        $facial_treatments=DB::table('service_menu')
        ->select('service_menu.id','service_menu.name','service_menu.price','service_menu.description','service_menu.title','service_menu.time')
        ->where('service_menu.title', 'like', "%{$service3}%")
        ->get()
        ;


    return Inertia::render('services/spa',[
        'spacoverpage' => $spacoverpage,
        'treatments'=>$treatments,
        'bodyceremonies'=>$vacatio_body_ceremonies,
        'facialtreatments'=>$facial_treatments
    ]);
    }

    
}
