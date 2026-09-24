<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'client_name',
        'industry',
        'category',
        'tagline',
        'summary',
        'challenge',
        'solution',
        'outcome',
        'banner_image',
        'screenshots',
        'live_url',
        'github_url',
        'tech_stack',
        'order',
        'is_featured',
    ];

    protected $casts = [
        'tech_stack' => 'array',
        'screenshots' => 'array',
        'is_featured' => 'boolean',
    ];

    /**
     * Relationship to project performance metrics.
     */
    public function metrics(): HasMany
    {
        return $this->hasMany(ProjectMetric::class)->orderBy('order', 'asc');
    }

    /**
     * Scope for featured projects.
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true)->orderBy('order', 'asc');
    }

    /**
     * Scope by category.
     */
    public function scopeCategory($query, ?string $category)
    {
        if ($category && $category !== 'all') {
            return $query->where('category', $category);
        }

        return $query;
    }
}
