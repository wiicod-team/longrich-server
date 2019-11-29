<?php

namespace App;

use App\Traits\RestTrait;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    use RestTrait;
    protected $fillable = ['name','phone','status','gender','user_id'];

    protected $dates = ['created_at','updated_at'];

    public static $Status= ['new','active','disable'];


    public function getLabel()
    {
        return $this->name.' '.$this->gender ;
    }


    public function bills(){
        return $this->hasMany(Bill::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
