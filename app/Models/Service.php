<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'slug',
        'name',
        'tagline',
        'description',
        'long_description',
        'color',
        'icon',
        'url',
        'audiences',
        'sop',
    ];

    protected $casts = [
        'audiences' => 'json',
        'sop' => 'json',
    ];
}
