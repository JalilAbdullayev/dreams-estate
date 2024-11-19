<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PropertyImageRequest extends FormRequest {
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
            'property_id' => 'sometimes|exists:properties,id',
            'order' => 'nullable|integer',
            'status' => 'nullable|boolean',
        ];
    }

    public function messages(): array {
        return [
            'property_id.required' => 'The property id field is required.',
            'property_id.exists' => 'The property id does not exist.',
            'order.integer' => 'The order must be an integer.',
            'status.boolean' => 'The status must be a boolean.',
        ];
    }
}
