<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mading extends Model
{
    protected $table = 'mading';

    protected $fillable = [
        'title',
        'slug',
        'content',
        'excerpt',
        'image',
        'category',
        'author_name',
        'author_class',
        'color_accent',
        'is_pinned',
        'published_at',
        'views',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_pinned'    => 'boolean',
    ];

    /**
     * Category labels in Indonesian.
     */
    public static function categoryLabels(): array
    {
        return [
            'pengumuman'   => 'Pengumuman',
            'karya-siswa'  => 'Karya Siswa',
            'cerpen'       => 'Cerpen',
            'tips'         => 'Tips & Trik',
            'foto-kegiatan'=> 'Foto Kegiatan',
            'umum'         => 'Umum',
        ];
    }

    /**
     * Get the human-readable category label.
     */
    public function getCategoryLabelAttribute(): string
    {
        return static::categoryLabels()[$this->category] ?? 'Umum';
    }

    /**
     * Get the short excerpt (auto-generated from content if not set).
     */
    public function getShortExcerptAttribute(): string
    {
        if ($this->excerpt) {
            return $this->excerpt;
        }
        return \Illuminate\Support\Str::limit(strip_tags($this->content), 120);
    }
}
