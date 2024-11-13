<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class About extends Model {
    use SoftDeletes, HasFactory;

    protected $table = 'about';

    protected $fillable = [
        'title',
        'subtitle',
        'text',
        'images',
        'section_status',
        'section_title',
        'section_text',
        'section_image',
    ];

    protected function casts(): array {
        return [
            'images' => 'array',
            'section_status' => 'boolean',
        ];
    }
}
