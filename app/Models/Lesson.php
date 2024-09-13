<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

 /**
         * Get all of the comments for the Lesson
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasMany
         */
        public function course(): BelongTo
        {
            return $this->belongsTo(Course::class);
        }

}

