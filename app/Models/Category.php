<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model {
    use SoftDeletes;

    protected $fillable = [
        'name',
        'status',
        'order',
    ];

    protected function casts(): array {
        return [
            'status' => 'boolean',
        ];
    }

    public function scopeActive() {
        $this->whereStatus(1)->orderBy('order');
    }
}
