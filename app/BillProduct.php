<?php

namespace App;

use App\Traits\RestTrait;
use Illuminate\Database\Eloquent\Model;

class BillProduct extends Model
{
    //
    use RestTrait;
    protected $fillable = ['retail_price','quantity','bill_id','product_id'];

    protected $dates = ['created_at','updated_at'];

    public function getLabel()
    {
        return $this->quantity ;
    }

    public function bill(){
        return $this->belongsTo(Bill::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
