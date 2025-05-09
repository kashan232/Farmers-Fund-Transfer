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
    public function farmers()
    {
        return $this->hasMany(LandRevenueFarmerRegistation::class, 'user_id');
    }

    // In User.php
    public function fieldOfficer()
    {
        return $this->belongsTo(FieldOfficer::class, 'user_id', 'id');
    }


    public function agriOfficer()
    {
        return $this->belongsTo(AgriOfficer::class, 'user_id', 'id');
    }

    public function ddOfficer()
    {
        return $this->belongsTo(DDOfficer::class, 'user_id', 'id');
    }


    public function lrdOfficer()
    {
        return $this->belongsTo(LandRevenueDepartment::class, 'user_id', 'id');
    }


    public function adOfficer()
    {
        return $this->belongsTo(DistrictOfficer::class, 'user_id', 'id');
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $guarded = [];
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
}
