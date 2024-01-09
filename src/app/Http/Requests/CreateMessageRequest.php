<?php

namespace App\Http\Requests;

use Closure;
use Illuminate\Foundation\Http\FormRequest;

class CreateMessageRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string'
            ],
            'email' => [
                'required',
                'email'
            ],
            'message' => [
                'required',
                'string'
            ],
            'consent' => [
                'required',
                function (string $attribute, mixed $value, Closure $fail) {
                    if ($value != 'on') {
                        $fail("Примите политику персональных данных");
                    }
                },
            ]
        ];
    }
}
