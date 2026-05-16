<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = ['subject_id', 'title', 'teacher_name', 'file_path', 'file_type', 'grade', 'major'];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
