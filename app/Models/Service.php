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
        'faq',
    ];

    protected $casts = [
        'audiences' => 'json',
        'sop' => 'json',
        'faq' => 'json',
    ];
}
