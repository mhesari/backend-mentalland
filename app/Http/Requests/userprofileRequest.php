<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Client\Response;

class userprofileRequest extends FormRequest
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
            'Fname'=>'Required',
            'Lname'=>'Required',
            'date_birthday'=>'Required',
            'Expected_Salary'=>'Required',
            'avatar'=>'mimes:jpg,png',
            'phone_number'=>'Required|regex:/(09)[0-9]{9}/|digits:11|numeric',
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
