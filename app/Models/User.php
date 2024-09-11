<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', 
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
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    /**
     * Create a new model instance.
     *
     * @param  array  $attributes
     * @return void
     */

     public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return ['role' => $this->role];
    }
    
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->attributes['role'] = $this->attributes['role'] ?? 'user'; 
    }

    /**
     * Checks if user is admin.
     * 
     * @return bool
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    /**
     * Checks if user is super admin.
     * 
     * @return bool
     */
    public function isSuperAdmin()
    {
        return $this->role === 'super_admin';
    }

    /**
     * Generate a personal access token for this user.
     *
     * @return string
     */
    public function generateToken()
    {
        $token = $this->createToken('Personal Access Token')->accessToken;
        return $token;
    }
}