<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FAQRequest extends FormRequest {
    public function rules(): array {
        return [
            'title' => ['sometimes', 'string'],
            'description' => ['sometimes', 'string'],
            'status' => ['boolean'],
            'order' => ['nullable', 'integer'],
        ];
    }

    public function messages(): array {
        $required = 'The :attribute is required.';
        $string = 'The :attribute must be a string.';
        return [
            'title.string' => $string,
            'title.required' => $required,
            'description.string' => $string,
            'description.required' => $required,
            'status.boolean' => 'The status must be a boolean.',
            'order.integer' => 'The order must be an integer.',
        ];
    }

    public function authorize(): bool {
        return true;
    }
}
