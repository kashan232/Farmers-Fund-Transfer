<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AgricultureFarmersRegistration extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'admin_or_user_id',
        'name',
        'father_name',
        'gender',
        'cnic',
        'province',
        'district',
        'tehsil',
        'uc',
        'tappa',
        'area',
        'chak_goth_killi',
        'khasra_survey',
        'mobile',
        'area_category',
        'ownership',
        'aid_type',
        'is_distributed',
        'cheque_amount',
        'cheque_number',
        'created_on',
        'created_by',
        'is_verified',
        'rejection_reason',
        'verified_by',
        'verified_on',
        'registration_sms_date_time',
        'seed_given_sms_date_time',
        'receiver_mobile_no',
        'total_area',
        'seed_required_qty',
        'seed_variety',
        'seed_given_qty',
        'seed_variety_given',
        'seed_given_by',
        'seed_given_date',
        'is_sent_bisp',
        'bank_id',
        'bank_account_title',
        'bank_account_number',
    ];
}