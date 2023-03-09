<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Client\Response;

class adverstingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'ad_title'=>'Required',
            'Type_cooperation'=>'Required',
            'minimum_salary'=>'Required',
            'ad_content'=>'Required|min:40',

        ];
    }
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $errors = $this->validator->errors();

        throw new \Illuminate\Http\Exceptions\HttpResponseException(
            Response::error($errors)
        );
    }

}
