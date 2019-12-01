<?php

namespace App\Api\V1\Requests;

use App\User;
use App\Helpers\RuleHelper;
use Dingo\Api\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            'name'=>'max:255',
            'email'=>'required|email|max:255|unique:users,email',
            'status'=>Rule::in(User::$Status),
            'password'=>'required|min:6|max:255',
        ];
        return RuleHelper::get_rules($this->method(),$rules);
    }
}
