<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'requirements', 'overview', 'images', 'tutor', 'available_seats',
        'age_range', 'duration', 'price', 'session_time', 'images'
    ];
    protected $cast = [
        'requirement' => 'array',
        'images' => 'array',
        'session_time' => 'array',
    ];
}
