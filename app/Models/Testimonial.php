<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_name',
        'client_role',
        'company',
        'quote',
        'avatar_url',
        'rating',
        'project_type',
        'order',
        'is_featured',
    ];

    protected $casts = [
        'rating' => 'integer',
        'is_featured' => 'boolean',
    ];

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true)->orderBy('order', 'asc');
    }
}
