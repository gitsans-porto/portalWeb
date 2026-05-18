<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectCurriculum extends Model
{
    use HasFactory;

    protected $table = 'subject_curriculum';

    protected $fillable = ['subject_id', 'major_id', 'grade', 'report_label'];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function major()
    {
        return $this->belongsTo(Major::class);
    }
}
