<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_id', 'title', 'description', 'teacher_name',
        'file_path', 'file_url', 'file_type', 'status', 'grade', 'major'
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
