<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class EventSpace extends Model
{
    //
    use SoftDeletes, HasUuids;
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ['name', 'image_path', 'description', 'contact_email'];
    protected $table= 'event_space';

    public function eventspace_booking(){
        return $this->hasMany(EventSpaceBooking::class, 'event_space_id');
    }
}
