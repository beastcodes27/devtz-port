<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'author',
        'author_role',
        'category',
        'summary',
        'content',
        'read_time_minutes',
        'tags',
        'cover_image',
        'published_at',
        'is_featured',
    ];

    protected $casts = [
        'tags' => 'array',
        'read_time_minutes' => 'integer',
        'is_featured' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true)->orderBy('published_at', 'desc');
    }
}
