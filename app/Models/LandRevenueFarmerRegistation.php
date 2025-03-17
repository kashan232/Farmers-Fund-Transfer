<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LandRevenueFarmerRegistation extends Model
{
    use HasFactory;
    use SoftDeletes;



    protected $fillable = [
        'admin_or_user_id',
        'user_type',
        'land_emp_id',
        'land_emp_name',
        'name',
        'father_name',
        'cnic',
        'cnic_issue_date',
        'cnic_expiry_date',
        'mobile',
        'district',
        'tehsil',
        'uc',
        'tappa',
        'dah',
        'village',
        'gender',
        'house_type',
        'owner_type',
        'full_name_of_next_kin',
        'cnic_of_next_kin',
        'mobile_of_next_kin',
        'female_children_under16',
        'female_Adults_above16',
        'male_children_under16',
        'male_Adults_above16',
        'total_landing_acre',
        'total_area_with_hari',
        'total_area_cultivated_land',
        'total_fallow_land',
        'land_share',
        'land_area_as_per_share',
        'survey_no',
        'title_name',
        'title_father_name',
        'title_cnic',
        'title_number',
        'title_area',
        'crop_season',
        'crops',
        'crops_orchard',
        'crop_area',
        'crop_average_yeild',
        'physical_asset_item',
        'animal_name',
        'animal_qty',
        'source_of_irrigation',
        'source_of_irrigation_engery',
        'area_length',
        'line_status',
        'lined_length',
        'total_command_area',
        'account_title',
        'account_no',
        'bank_name',
        'branch_name',
        'IBAN_number',
        'branch_code',
        'front_id_card',
        'back_id_card',
        'upload_land_proof',
        'upload_other_attach',
        'upload_farmer_pic',
        'upload_cheque_pic',
        'form_seven_pic',
        'verification_status',
        'declined_reason',
        'verification_by',
        'GpsCordinates',
        'FancingCoordinates',
        'sq_meters',
        'sq_yards',
        'acres',
        'partially_line',
        'surname',
        'no_objection_affidavit_pic'

    ];


}
