<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    // Specify the table associated with the model
    protected $table = 'videos';

    // Specify the fields that are mass assignable
    protected $fillable = [
        'youtube_id',
        'title',
        'description',
        'thumbnail_url',
        'duration',
        'channel_id',
        'channel_title',
        'published_at'
    ];

    // Specify the fields that should be cast to native types
    protected $casts = [
        'published_at' => 'datetime',
    ];
}
