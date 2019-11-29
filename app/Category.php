<?php

namespace App;

use App\Traits\RestTrait;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    use RestTrait;
    protected $fillable = ['name','status','description'];

    protected $dates = ['created_at','updated_at'];

    public static $Status= ['new','old','finish'];


    public function getLabel()
    {
        return $this->name;
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
