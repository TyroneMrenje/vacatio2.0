<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class RoomImages extends Model
{
    use  HasUuids;
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ['id','room_id','image_url','location'];
    protected $table='room_images';

    public function room(){
        return $this->belongsTo(Room::class,'room_id');
    }
}
