<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class RoomUnits extends Model
{
    //
    use HasUuids;
    protected $keyType ='string';
    public $incrementing = false;
    protected $fillable = ['id','room_id','unit_number','status'];
    protected $table='room_units';

    public function room(){
        return $this->belongsTo(Room::class,'room_id');
    }
}
