<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IssueReport extends Model
{
    protected $fillable = [
        'tracking_code',
        'type',
        'full_name',
        'role',
        'service_id',
        'category',
        'description',
        'admin_feedback',
        'status',
        'handled_at'
    ];

    protected $casts = [
        'handled_at' => 'datetime',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
