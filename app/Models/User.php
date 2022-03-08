<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

  

    public function educations()
    {
        return $this->hasMany(Education::class);
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    public function requests()
    {
        return $this->hasMany(DeleteRequest::class, 'admin_id');
    }

    public function requestedUser()
    {
        return $this->hasMany(DeleteRequest::class, 'user_id');

    }

    public function department()
    {
        // return 120;
        return $this->belongsTo(Department::class);
    }

    public function emergencyContact()
    {
        return $this->hasOne(EmergencyContact::class);
    }

    public function requestLeaves()
    {
        return $this->hasMany(RequestedLeave::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }
}
