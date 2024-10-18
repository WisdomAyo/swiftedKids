<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMediaHandle extends Model
{
    use HasFactory;

    protected $fillable = ['platform', 'url'];


      // Define the relationship with User or Teacher (depending on your setup)
      public function user()
      {
          return $this->belongsTo(User::class); // Assuming you are using the User model
      }
}
