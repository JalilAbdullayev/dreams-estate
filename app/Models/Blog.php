<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model {
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'keywords',
        'description',
        'text',
        'order',
        'status',
        'image',
        'images',
        'category_id',
        'user_id'
    ];

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    protected function casts(): array {
        return [
            'status' => 'boolean',
            'images' => 'array',
        ];
    }

    public function scopeActive() {
        return $this->whereStatus(1)->orderBy('order');
    }
}
