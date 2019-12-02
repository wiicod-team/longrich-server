<?php

namespace App;

use App\Traits\RestTrait;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    //
    use RestTrait;
    protected $fillable = ['amount','payment_code','status','payment_method','customer_id'];
    protected $dates = ['created_at','updated_at'];

    public static $Status= ['new','pending','paid','delivered'];

    public function getLabel()
    {
        return $this->amount.' '.$this->payment_code ;
    }


    public function customer(){
        return $this->belongsTo(Customer::class);
    }


    public function bill_products(){
        return $this->hasMany(BillProduct::class);
    }

    public function deliveries(){
        return $this->hasMany(Delivery::class);
    }


    public function products(){
        return $this->belongsToMany(Product::class,'bill_products')
            ->withPivot(['quantity','retail_price']);
    }

}
