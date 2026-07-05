<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class RoomAddOnsBookings extends Model
{
    //
    use SoftDeletes, HasUuids;
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ['price_at_booking'];
    protected $table= 'room_booking_add_ons';

    public function room_add_ons(){
        return $this->hasMany(RoomAdd_Ons::class,'room_add_on_id');

    }

    public function room_bookings(){
        return $this->belongsTo(RoomBookings::class,'room_booking_id');
    }
}
