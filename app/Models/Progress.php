<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'video_id',
        'duration_watched',
        // Add other fields as needed
    ];

    // Define relationships if any (e.g., with User or Video models)
}
