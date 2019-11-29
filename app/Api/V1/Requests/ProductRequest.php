<?php

namespace App\Api\V1\Requests;

use App\Product;
use App\Helpers\RuleHelper;
use Dingo\Api\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        $rules = [
            'name'=>'required|max:255',
            'description'=>'required|max:255',
            'dosage'=>'required|max:255',
            'composition'=>'required|max:255',
            'weight'=>'required|numeric',
            'price'=>'required|numeric',
            'price_promo'=>'numeric',
            'payment_method'=>'required|max:255',
            'status'=>Rule::in(Product::$Status),
            'picture1'=>'required|image',
            'picture2'=>'image',
            'picture3'=>'image',
            'category_id'=>'required|integer|exists:categories,id'
        ];
        return RuleHelper::get_rules($this->method(),$rules);
    }
}
