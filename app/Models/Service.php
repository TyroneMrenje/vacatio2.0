<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;


class Service extends Model
{
    //
    use SoftDeletes, HasUuids;
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable=['name','image_path','description'];
    protected $table= 'service';

    public function service_menu(){
        return $this->hasMany(ServiceMenu::class,'service_id');
    }
}
