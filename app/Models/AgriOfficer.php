<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgriOfficer extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_or_user_id',
        'full_name',
        'contact_number',
        'email_address',
        'address',
        'cnic',
        'district',
        'tehsil',
        'ucs',
        'tappas',
        'username',
        'password',
        'img',
    ];
}
