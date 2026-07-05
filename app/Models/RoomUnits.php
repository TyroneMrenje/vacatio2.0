<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class RoomUnits extends Model
{
    //
    use SoftDeletes,HasUuids;
    protected $keyType ='string';
    public $incrementing = false;
    protected $fillable = ['unit_number','status'];
    protected $table='room_units';

    public function room(){
        return $this->belongsTo(Room::class,'room_id');
    }
}
