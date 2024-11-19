<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PropertyImage extends Model {
    protected $fillable = [
        'property_id',
        'image',
        'order',
        'status'
    ];

    public function property(): BelongsTo {
        return $this->belongsTo(Property::class);
    }

    protected $casts = [
        'status' => 'boolean'
    ];
}
