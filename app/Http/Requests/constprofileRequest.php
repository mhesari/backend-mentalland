<?php

namespace App\Http\Requests;

use App\Rules\Nationalcode;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Client\Response;

class constprofileRequest extends FormRequest
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
            'codemeli' => ['required', new Nationalcode],
            'avatar'=>'mimes:jpg,png,webp',
            'phone_number'=>'Required|regex:/(09)[0-9]{9}/|digits:11|numeric',
            'degree_education'=>'Required|mimes:jpg,png,webp',
            'university'=>'Required',
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
