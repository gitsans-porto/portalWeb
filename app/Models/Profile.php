<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'section',
        'title',
        'short_description',
        'content',
        'image',
        'additional_data',
    ];

    protected $casts = [
        'additional_data' => 'array',
    ];
}
