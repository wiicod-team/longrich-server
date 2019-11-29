<?php

namespace App;

use App\Traits\RestTrait;
use Illuminate\Database\Eloquent\Model;

class Patner extends Model
{
    //
    use RestTrait;
    protected $fillable = ['name','phone','town_id'];

    protected $dates = ['created_at','updated_at'];

    public function getLabel()
    {
        return $this->name.' '.$this->phone ;
    }

    public function town(){
        return $this->belongsTo(Town::class);
    }
}
