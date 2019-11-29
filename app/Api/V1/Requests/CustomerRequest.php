<?php

namespace App\Api\V1\Requests;

use App\Customer;
use App\Helpers\RuleHelper;
use Dingo\Api\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerRequest extends FormRequest
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
            'phone'=>'required|min:9|max:15',
            'gender'=>'required|max:1',
            'payment_method'=>'required|max:255',
            'status'=>Rule::in(Customer::$Status),
            'user_id'=>'required|integer|exists:users,id|unique:customers,user_id'
        ];
        return RuleHelper::get_rules($this->method(),$rules);
    }
}
