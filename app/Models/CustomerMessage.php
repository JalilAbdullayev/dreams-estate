<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerMessage extends Pivot {
    use SoftDeletes;

    protected $fillable = ['receiver_id', 'property_id', 'name', 'email', 'phone', 'message'];

    public function receiver(): BelongsTo {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function property(): BelongsTo {
        return $this->belongsTo(Property::class, 'property_id');
    }
}
