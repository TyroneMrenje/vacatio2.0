<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class EventSpaceBooking extends Model
{
    //
    use SoftDeletes, HasUuids;
    protected $fillable = ['event_space_id','user_id','booking_date','booking_time','number_of_guests', 'status'];
    protected $table= 'event_space_booking';

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function event_space(){
        return $this->belongsTo(EventSpace::class,'event_space_id');
    }
}
