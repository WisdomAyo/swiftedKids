<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

        protected $fillable = [
            'name', 'email', 'password',  'phone_number', 'dob', 'gender', 'bio', 'profile_image', 'role', 'nin',
        ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function role()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole(string $role): bool
    {
        // Since $this->role is a string, directly compare it
        return $this->role === $role;
    }

    public function specialties(){
        return $this->hasMany(Specialty::class);
    }

    public function videos(){
        return $this->hasMany(Video::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'skill_user'); // Explicitly define the pivot table
    }

    public function education(){
        return $this->hasMany(Education::class);
    }

    public function socialMediaHandles()
    {
        // Ensure that this returns an empty collection if there are no related records
        return $this->hasMany(SocialMediaHandle::class);
    }

}
