<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class DistrictOfficer extends Model
{
    use HasFactory, SoftDeletes;

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
        'usertype'
    ];
}
