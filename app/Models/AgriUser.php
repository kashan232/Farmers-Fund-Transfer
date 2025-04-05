<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AgriUser extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'admin_or_user_id',
        'user_name',
        'number',
        'email',
        'cnic',
        'cnic',
        'district',
        'tehsil',
        'ucs',
        'tappas',
        'password',
        'img',
    ];
}
