<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AgricultureUserFarmerRegistration extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'admin_or_user_id',
        'agri_user_emp_id',
        'agri_user_emp_name',
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
        'bank_branch_name',
        'bank_branch_code',
        'bank_account_title',
        'bank_account_number',
        'latitude',
        'longitude',
        'front_id_card',
        'back_id_card',
        'upload_land_proof',
        'upload_other_attach',
        'upload_farmer_pic',
        'upload_cheque_pic',
        'verification_status',
    ];
}
