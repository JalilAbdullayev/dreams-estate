<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest {
    public function rules(): array {
        return [
            'title' => ['sometimes', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255'],
            'keywords' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'text' => ['nullable', 'string'],
            'image' => ['nullable'],
            'images' => ['nullable'],
            'category_id' => ['sometimes', 'exists:categories,id'],
            'user_id' => ['sometimes', 'exists:users,id']
        ];
    }

    public function messages(): array {
        return [
            'title.required' => 'The title is required.',
            'title.string' => 'The title must be a string.',
            'title.max' => 'The title must not be greater than 255 characters.',
            'slug.string' => 'The slug must be a string.',
            'slug.max' => 'The slug must not be greater than 255 characters.',
            'keywords.string' => 'The keywords must be a string.',
            'description.string' => 'The description must be a string.',
            'text.string' => 'The text must be a string.',
            'category_id.required' => 'The category is required.',
            'category_id.exists' => 'The category does not exist.',
            'user_id.required' => 'The user is required.',
            'user_id.exists' => 'The user does not exist.',
            'image.image' => 'The image must be an image.',
            'image.max' => 'The image size must not be greater than 2MB.',
        ];
    }

    public function authorize(): bool {
        return true;
    }
}
