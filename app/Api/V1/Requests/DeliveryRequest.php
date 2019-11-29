<?php

namespace App\Api\V1\Requests;

use App\Delivery;
use App\Helpers\RuleHelper;
use Dingo\Api\Http\FormRequest;
use Illuminate\Validation\Rule;

class DeliveryRequest extends FormRequest
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
            'is_express'=>'boolean',
            'delivery_date'=>'date|required',
            'delivery_max_date'=>'date|required|after:delivery_date',
            'road'=>'required|max:255',
            'district'=>'required|max:255',
            'information'=>'required|max:255',
            'status'=>Rule::in(Delivery::$Status),
            'bill_id'=>'required|integer|exists:bills,id',
            'town_id'=>'required|integer|exists:towns,id'
        ];
        return RuleHelper::get_rules($this->method(),$rules);
    }
}
