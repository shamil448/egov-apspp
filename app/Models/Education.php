<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $table = 'education';

    protected $fillable = [
        'title',
        'content',
        'author',
        'type',
        'image_path',
        'video_path',
        'published_at',
    ];
}
