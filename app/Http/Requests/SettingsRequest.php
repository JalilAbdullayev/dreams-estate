<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest {
    public function rules(): array {
        return [
            'title' => ['required','max:255','string'],
            'author' => ['nullable','max:255','string'],
            'keywords' => ['nullable','string'],
            'description' => ['nullable','string'],
            'logo' => ['nullable','image','max:2048'],
            'favicon' => ['nullable','image','max:2048'],
        ];
    }

    public function messages(): array {
        $string = " must be a string.";
        $max = " must be less than 255 characters.";
        $image = " must be an image.";
        $size = " must be less than 2MB.";
        return [
            'title.required' => 'Title is required',
            'title.string' => "Title $string",
            'title.max' => "Title $max",
            'author.string' => "Author $string",
            'author.max' => "Author $max",
            'keywords.string' => "Keywords $string",
            'description.string' => "Description $string",
            'logo.image' => "Logo $image",
            'logo.max' => "Logo $size",
            'favicon.image' => "Favicon $image",
            'favicon.max' => "Favicon $size",
        ];
    }

    public function authorize(): bool {
        return true;
    }
}
