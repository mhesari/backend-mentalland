<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Client\Response;

class settingRequest extends FormRequest
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
            'title_s'=>'Required',
            'seo_s'=>'Required',
            'favicon_setting'=>'mimes:png',
            'logo_setting'=>'mimes:png',
            'aboutUs_setting'=>'Required|min:50',
            'copyright_website'=>'Required',
            'keyword_seo'=>'Required',

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
