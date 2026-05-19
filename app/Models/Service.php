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
        'docs_url',
        'audiences',
        'features',
        'sop',
        'faq',
    ];

    protected $casts = [
        'audiences' => 'json',
        'features'  => 'json',
        'sop'       => 'json',
        'faq'       => 'json',
    ];
}
