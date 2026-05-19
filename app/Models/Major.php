<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'image_path'];

    public function curriculums()
    {
        return $this->hasMany(SubjectCurriculum::class);
    }

    // Hitung jumlah mapel aktif (mapel yang ada di kurikulum jurusan ini)
    public function activeSubjectsCount()
    {
        return $this->curriculums()->distinct('subject_id')->count('subject_id');
    }
}
