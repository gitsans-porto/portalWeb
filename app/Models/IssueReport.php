<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IssueReport extends Model
{
    protected $fillable = [
        'full_name',
        'role',
        'class_nip',
        'service_id',
        'category',
        'description',
        'status'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
