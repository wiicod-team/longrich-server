<?php

namespace App;

use App\Traits\RestTrait;
use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    //
    use RestTrait;
    protected $fillable = ['name'];

    protected $dates = ['created_at','updated_at'];

    public function getLabel()
    {
        return $this->name;
    }

    public function deliveries(){
        return $this->hasMany(Delivery::class);
    }

    public function patners(){
        return $this->hasMany(Patner::class);
    }
}
