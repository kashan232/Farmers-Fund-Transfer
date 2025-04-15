<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DDOfficer extends Model
{
    use HasFactory;
    protected $table = 'd_d_officers';

    protected $fillable = [
        'admin_or_user_id',
        'full_name',
        'contact_number',
        'address',
        'email_address',
        'district',
        'tehsil',
        'ucs',
        'tappas',
        'username',
        'password'
    ];
}
