<?php

namespace App\Api\V1\Requests;

use App\Bill;
use App\Helpers\RuleHelper;
use Dingo\Api\Http\FormRequest;
use Illuminate\Validation\Rule;

class BillRequest extends FormRequest
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
            'amount'=>'required|numeric',
            'payment_code'=>'max:255',
            'payment_method'=>'required|max:255',
            'status'=>Rule::in(Bill::$Status),
            'customer_id'=>'required|integer|exists:customers,id'
        ];
        return RuleHelper::get_rules($this->method(),$rules);
    }
}
