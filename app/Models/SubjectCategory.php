<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function subject(){
            return $this->hasMany(Subject::class);
    }
}
