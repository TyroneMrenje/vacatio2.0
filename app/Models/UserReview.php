<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class UserReview extends Model
{
    //
    use SoftDeletes, HasUuids;
    protected $fillable =['user_id','review','rating'];
    protected $table= 'user_reviews';

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
