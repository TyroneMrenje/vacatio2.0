<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class ServiceBooking extends Model
{
    //
    use SoftDeletes, HasUUids;
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ['appointment_date','appointment_time','status','number_of_guests','total_price'];
    protected $table='service_booking';

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function service_menu(){
        return $this->belongsTo(ServiceMenu::class, 'service_menu_id');
    }

}
