<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AllBlogs extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'blogger_id',
        'blog_name',
        'blog_slug',
        'blog_description',
        'region',
        'avg_post',
        'categories'
    ];

    protected $casts = [
        'categories' => 'array'
    ];
}
