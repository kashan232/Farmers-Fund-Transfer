<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tehsil extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'admin_or_user_id',
        'district',
        'tehsil',
    ];

    public function farmers()
    {
        return $this->hasMany(LandRevenueFarmerRegistation::class, 'tehsil', 'tehsil');
    }
}
