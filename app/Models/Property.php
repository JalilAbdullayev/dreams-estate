<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model {
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'keywords',
        'image',
        'bedroom',
        'bathroom',
        'garage',
        'year',
        'description',
        'text',
        'address',
        'city',
        'region',
        'price',
        'area',
        'garage_size',
        'floor',
        'type',
        'sale_type',
        'status',
        'verified',
        'user_id',
    ];

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function images(): HasMany {
        return $this->hasMany(PropertyImage::class)->orderBy('order');
    }

    protected function casts(): array {
        return [
            'type' => 'boolean',
            'sale_type' => 'boolean',
            'status' => 'boolean',
            'verified' => 'boolean',
        ];
    }
}
