<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LandRevenueDepartment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'admin_or_user_id',
        'full_name',
        'contact_number',
        'address',
        'email_address',
        'district',
        'tehsil',
        'username',
        'password'
    ];
}
