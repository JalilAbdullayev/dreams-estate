<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest {
    public function rules(): array {
        return [
            'title' => ['nullable', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'text' => ['nullable', 'string'],
            'images' => ['nullable'],
            'section_status' => ['boolean'],
            'section_title' => ['nullable', 'string', 'max:255'],
            'section_text' => ['nullable', 'string'],
            'section_image' => ['nullable', 'image', 'max:2048'],
        ];
    }

    public function messages(): array {
        $string = 'The :attribute must be a string.';
        $max = 'The :attribute must not be greater than :max characters.';
        return [
            'title.string' => $string,
            'title.max' => $max,
            'subtitle.string' => $string,
            'subtitle.max' => $max,
            'text.string' => $string,
            'section_title.string' => $string,
            'section_title.max' => $max,
            'section_text.string' => $string,
            'section_image.image' => 'Section image must be an image.',
            'section_image.max' => 'Section image must be less than 2MB.',
        ];
    }

    public function authorize(): bool {
        return true;
    }
}
