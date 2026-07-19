<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class ServiceMenu extends Model
{
    //
    use HasUuids;
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ['id','service_id','name','price','description'];
    protected $table='service_menu';

    public function service(){
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function service_booking(){
        return $this->hasMany(ServiceBooking::class,'service_menu_id');
    }

}
