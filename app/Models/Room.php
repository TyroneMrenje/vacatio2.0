<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    //
    use SoftDeletes, HasUuids;
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ['name','amenities','description','bed_size','area_size','view','max_occupancy','price'];
    protected $table= 'rooms';

    public function room_images(){
        return $this->hasMany(RoomImages::class,'room_id');
    }

    public function room_units(){
        return $this->hasMany(RoomUnits::class,'room_id');
    }
}
