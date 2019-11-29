<?php

namespace App\Api\V1\Requests;

use App\BillProduct;
use App\Helpers\RuleHelper;
use Dingo\Api\Http\FormRequest;
use Illuminate\Validation\Rule;

class BillProductRequest extends FormRequest
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
            'retail_price'=>'required|numeric',
            'quantity'=>'required|numeric',
            'bill_id'=>'required|integer|exists:bills,id',
            'product_id'=>'required|integer|exists:products,id'
        ];
        return RuleHelper::get_rules($this->method(),$rules);
    }
}
