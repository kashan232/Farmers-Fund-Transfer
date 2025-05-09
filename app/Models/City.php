<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public function branches()
    {
        return $this->hasMany(BankBranch::class);
    }

    public function farmers()
    {
        return $this->hasMany(LandRevenueFarmerRegistation::class, 'city');
    }



}
