<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest {
    public function rules(): array {
        return [
            'name' => ['required', 'string', 'max:255'],
            'status' => ['boolean'],
            'order' => ['nullable', 'integer', 'max:255'],
        ];
    }

    public function messages(): array {
        return [
            'name.required' => 'Name is required.',
            'name.string' => 'Name must be a string.',
            'name.max' => 'Name must not exceed 255 characters.',
            'status.boolean' => 'Status must be a boolean.',
            'order.integer' => 'Order must be an integer.',
            'order.max' => 'Order must not exceed 255.',
        ];
    }

    public function authorize(): bool {
        return true;
    }
}
