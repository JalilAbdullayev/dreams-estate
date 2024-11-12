<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest {
    public function rules(): array {
        return [
            'phone' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'location' => ['nullable', 'string'],
            'map' => ['nullable', 'string'],
        ];
    }

    public function messages(): array {
        $max = 'The :attribute may not be greater than :max characters.';
        $string = 'The :attribute must be a string.';
        return [
            'email.email' => 'The email must be a valid email address.',
            'email.max' => $max,
            'phone.max' => $max,
            'location.string' => $string,
            'map.string' => $string,
        ];
    }

    public function authorize(): bool {
        return true;
    }
}
