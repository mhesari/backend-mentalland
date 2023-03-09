<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Client\Response;

class employerprofileRequest extends FormRequest
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
            'company_english'=>'Required|regex:/^[a-zA-Z]+$/u',
            'company_persian'=>'Required',
            'company_logo'=>'mimes:jpg,png,webp',
            'address_company'=>'Required|min:15',
            'Activity_company'=>'Required',
            'bio_company'=>'Required|min:16',
            'website_company'=>'Required|url',
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
