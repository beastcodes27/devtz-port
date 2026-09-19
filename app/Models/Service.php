<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'tagline',
        'description',
        'icon',
        'features',
        'tech_stack',
        'order',
        'is_featured',
    ];

    protected $casts = [
        'features' => 'array',
        'tech_stack' => 'array',
        'is_featured' => 'boolean',
    ];

    /**
     * Scope for featured services ordered by order field.
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true)->orderBy('order', 'asc');
    }
}
