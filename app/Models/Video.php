<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;


    protected $fillable = ['video_type', 'youtube_link'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
