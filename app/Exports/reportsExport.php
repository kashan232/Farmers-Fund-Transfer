<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\LandRevenueFarmerRegistation;
use Maatwebsite\Excel\Concerns\WithProperties;
use Maatwebsite\Excel\Concerns\WithHeadings;

class reportsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return LandRevenueFarmerRegistation::select(
            'name',
            'father_name',
            'cnic',
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
            'title_name',
            'title_cnic',
            'title_number',
            'title_area',
            'crops',
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
        )->get();
    }

    public function headings(): array
    {
        return [
            'Name',
            'Father Name',
            'CNIC',
            'Mobile',
            'District',
            'Tehsil',
            'UC',
            'Tappa',
            'Dah',
            'Village',
            'Gender',
            'House Type',
            'Owner Type',
            'Full Name of Next Kin',
            'CNIC of Next Kin',
            'Mobile of Next Kin',
            'Female Children under 16',
            'Female Adults above 16',
            'Male Children under 16',
            'Male Adults above 16',
            'Total Land Acreage',
            'Total Area with Hari',
            'Total Area Cultivated Land',
            'Total Fallow Land',
            'Title Name',
            'Title CNIC',
            'Title Number',
            'Title Area',
            'Crops',
            'Crop Area',
            'Crop Average Yield',
            'Physical Asset Item',
            'Animal Name',
            'Animal Quantity',
            'Source of Irrigation',
            'Source of Irrigation Energy',
            'Area Length',
            'Line Status',
            'Lined Length',
            'Total Command Area',
            'Account Title',
            'Account Number',
            'Bank Name',
            'Branch Name',
            'IBAN Number',
            'Branch Code',
            'Front ID Card',
            'Back ID Card',
            'Upload Land Proof',
            'Upload Other Attachment',
            'Upload Farmer Picture',
            'Upload Cheque Picture',
        ];
    }
}
