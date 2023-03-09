<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Client\Response;

class EventsRequest extends FormRequest
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
            'title_event'=>'Required',
            'thumbnail_events'=>'mimes:jpg,png,webp',
            'teacher_image_events'=>'mimes:jpg,png,webp',
            'teacher_events'=>'Required',
            'time_events'=>'Required',
            'date_events'=>'Required',
            'view_register'=>'Required|numeric',
            'price_event'=>'Required',
            'description_events'=>'Required|min:20',
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
