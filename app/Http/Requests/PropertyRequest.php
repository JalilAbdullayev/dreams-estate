<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest {
    public function rules(): array {
        return [
            'title' => ['sometimes', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'keywords' => ['nullable', 'string'],
            'text' => ['nullable', 'string'],
            'image' => ['nullable'],
            'category_id' => ['sometimes', 'exists:categories,id'],
            'user_id' => ['sometimes', 'exists:users'],
            'bedroom' => ['nullable', 'integer', 'max:255'],
            'bathroom' => ['nullable', 'integer', 'max:255'],
            'garage' => ['nullable', 'integer', 'max:255'],
            'year' => ['nullable', 'integer', 'digits:4', 'min:1800', 'max:' . (int)date('Y') + 10, 'between:1800,' . (int)date('Y') + 10],
            'address' => ['nullable', 'string'],
            'city' => ['nullable', 'string', 'max:255'],
            'region' => ['nullable', 'string', 'max:255'],
            'price' => ['nullable'],
            'area' => ['nullable', 'string', 'max:255'],
            'garage_size' => ['nullable', 'string', 'max:255'],
            'floor' => ['sometimes', 'integer', 'min:1', 'max:255'],
            'type' => ['nullable', 'boolean'],
            'sale_type' => ['nullable', 'boolean'],
            'status' => ['nullable', 'boolean'],
            'verified' => ['nullable', 'boolean'],
            'images' => ['nullable']
        ];
    }

    public function messages(): array {
        return [
            'title.required' => 'The title field is required.',
            'title.string' => 'The title must be a string.',
            'title.max' => 'The title must not be greater than 255 characters.',
            'slug.string' => 'The slug must be a string.',
            'slug.max' => 'The slug must not be greater than 255 characters.',
            'description.string' => 'The description must be a string.',
            'keywords.string' => 'The keywords must be a string.',
            'text.string' => 'The text must be a string.',
            'category_id.required' => 'The category field is required.',
            'category_id.exists' => 'The selected category does not exist.',
            'user_id.required' => 'The user field is required.',
            'user_id.exists' => 'The selected user does not exist.',
            'floor.required' => 'The floor field is required.',
            'floor.integer' => 'The floor must be an integer.',
            'floor.min' => 'The floor must be at least 1.',
            'floor.max' => 'The floor must not be greater than 255.',
            'bedroom.integer' => 'The bedroom must be an integer.',
            'bedroom.max' => 'The bedroom must not be greater than 255.',
            'bathroom.integer' => 'The bathroom must be an integer.',
            'bathroom.max' => 'The bathroom must not be greater than 255.',
            'garage.integer' => 'The garage must be an integer.',
            'garage.max' => 'The garage must not be greater than 255.',
            'year.integer' => 'The year must be an integer.',
            'year.digits' => 'The year must be 4 digits.',
            'year.min' => 'The year must be at least 1800.',
            'year.max' => 'The year must not be greater than ' . (int)date('Y') + 10,
            'year.between' => 'The year must be between 1800 and ' . (int)date('Y') + 10,
            'address.string' => 'The address must be a string.',
            'city.string' => 'The city must be a string.',
            'city.max' => 'The city must not be greater than 255.',
            'region.string' => 'The region must be a string.',
            'region.max' => 'The region must not be greater than 255.',
            'area.string' => 'The area must be a string.',
            'area.max' => 'The area must not be greater than 255.',
            'garage_size.string' => 'The garage size must be a string.',
            'garage_size.max' => 'The garage size must not be greater than 255.',
            'type.boolean' => 'The type must be a boolean.',
            'sale_type.boolean' => 'The sale type must be a boolean.',
            'status.boolean' => 'The status must be a boolean.',
            'verified.boolean' => 'The verified must be a boolean.',
        ];
    }

    public function authorize(): bool {
        return true;
    }
}
