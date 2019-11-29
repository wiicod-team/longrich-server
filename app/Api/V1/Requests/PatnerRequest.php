<?php

namespace App\Api\V1\Requests;

use App\Patner;
use App\Helpers\RuleHelper;
use Dingo\Api\Http\FormRequest;
use Illuminate\Validation\Rule;

class PatnerRequest extends FormRequest
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
            'town_id'=>'required|integer|exists:towns,id'
        ];
        return RuleHelper::get_rules($this->method(),$rules);
    }
}
