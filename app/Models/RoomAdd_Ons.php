<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class RoomAdd_Ons extends Model
{
    //
     use  HasUuids;
    protected $keyType ='string';
    public $incrementing = false; 
    protected $fillable = ['id','name','description','price'];
    protected $table='room_add_ons';

    public function room_booking_add_ons(){
        return $this->belongsToMany(RoomAddOnsBookings::class,'room_add_on_id');
    }

}
