<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model {
    use SoftDeletes, HasFactory;

    protected $table = 'contact';

    protected $fillable = [
        'phone',
        'email',
        'location',
        'map',
    ];
}
