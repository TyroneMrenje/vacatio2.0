<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class RoomBookings extends Model
{
    //
    use SoftDeletes, HasUuids;
    protected $keyType ='string';
    public $incrementing = false;
    protected $fillable = ['check_in_date','check_out_date','status','total_price','number_of_guests'];
    protected $table='room_bookings';

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function roomunits(){
        return $this->hasOne(RoomUnits::class,'room_unit_id');
    }
}
