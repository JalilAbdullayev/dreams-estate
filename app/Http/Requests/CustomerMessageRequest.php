<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CustomerMessageRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array {
        return [
            'receiver_id' => ['required', 'exists:users,id'],
            'property_id' => ['required', 'exists:properties,id'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string'],
        ];
    }

    public function messages(): array {
        $required = 'The :attribute is required.';
        $string = 'The :attribute must be a string';
        $max = 'The :attribute must not be greater than :max characters';
        return [
            'receiver_id.required' => $required,
            'receiver_id.exists' => 'The selected receiver does not exist.',
            'property_id.required' => $required,
            'property_id.exists' => 'The selected property does not exist.',
            'name.required' => $required,
            'name.string' => $string,
            'name.max' => $max,
            'email.email' => 'The email should be a valid email',
            'email.max' => $max,
            'phone.required' => $required,
            'phone.string' => $string,
            'phone.max' => $max,
            'subject.string' => $string,
            'subject.max' => $max,
            'message.required' => $required,
            'message.string' => $string
        ];
    }
}
