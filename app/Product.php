<?php

namespace App;

use App\Traits\RestTrait;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    use RestTrait;
    protected $fillable = ['name','status','description','weight','dosage','price',
        'price_promo','composition','picture1','picture2','picture3','category_id'];

    protected $dates = ['created_at','updated_at'];

    public static $Status= ['new','available','finish'];


    public function  __construct(array $attributes = [])
    {
        $this->files = ['picture1','picture2','picture3'];
        parent::__construct($attributes);
    }

    public function getPicture1Attribute($val)
    {
        if($val==null){
            return null;
        }
        return env('APP_URL').$val;
    }

    public function getPicture2Attribute($val)
    {
        if($val==null){
            return null;
        }
        return env('APP_URL').$val;
    }

    public function getPicture3Attribute($val)
    {
        if($val==null){
            return null;
        }
        return env('APP_URL').$val;
    }

    public function getLabel()
    {
        return $this->name.' '.$this->status ;
    }

    public function bill_products(){
        return $this->hasMany(BillProduct::class);
    }

    public function bills(){
        return $this->belongsToMany(Bill::class,'bill_products')
            ->withPivot(['quantity','retail_price']);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
