<?php

namespace App;

use App\Traits\RestTrait;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    //
    use RestTrait;
    protected $fillable = ['is_express','status','road','district','information','bill_id','town_id'];

    protected $dates = ['delivery_date','delivery_max_date','created_at','updated_at'];

    public static $Status= ['new','pending','delivered'];


    public function getLabel()
    {
        return $this->district.' '.$this->information ;
    }

    public function bill(){
        return $this->belongsTo(Bill::class);
    }

    public function town(){
        return $this->belongsTo(Town::class);
    }
}
