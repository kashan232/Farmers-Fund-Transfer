<?php

namespace App\Imports;

use App\Models\LandRevenueFarmerRegistation;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithStartRow;
class FarmersImport implements ToModel, WithStartRow
{
    private $rowNumber = 0;
    /**
    * @param array $row
    *

    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        try{
            if (count($row) !== 8) {
                throw new \Exception("Excel Invalid...");
            }


                if($row[4] == null)
                {
                    throw new \Exception("District Field Empty Row: " .$this->rowNumber);
                }
                if($row[5] == null)
                {
                    throw new \Exception("Tehsil Field Empty Row: " .$this->rowNumber);
                }
                $this->rowNumber++;


                return new LandRevenueFarmerRegistation([

                    // $data['admin_or_user_id'] = Auth::id();
                    // $data['land_emp_id'] = Auth()->user()->user_id;
                    // $data['land_emp_name'] = Auth()->user()->name;

                    'admin_or_user_id' => Auth::id(),
                    'land_emp_id' => Auth()->user()->user_id,
                    'land_emp_name' => Auth()->user()->name,
                    'name' => $row[0],
                    'father_name' => $row[1],
                    'cnic' => $row[2],
                    'mobile' => $row[3],
                    'district' => $row[4],
                    'tehsil' => $row[5],
                    'uc' => $row[6],
                    'tappa' => $row[7],
                    'dah' => $row[8],
                    'village' => $row[9],
                    'gender' => $row[10],
                    'house_type' => $row[11],
                    'owner_type' => $row[12],
                    'female_children_under16' => $row[13],
                    'female_Adults_above16' => $row[14],
                    'male_children_under16' => $row[15],
                    'male_Adults_above16' => $row[16],
                    'total_landing_acre' => $row[17],
                    'total_area_with_hari' => $row[18],
                    'total_area_cultivated_land' => $row[19],
                    'total_fallow_land' => $row[20],
                    'title_name' => $this->StringToJson($row[21]),
                    'title_cnic' => $this->StringToJson($row[22]),
                    'title_number' => $this->StringToJson($row[23]),
                    'title_area' => $this->StringToJson($row[24]),
                    'crops' => $this->StringToJson($row[25]),
                    'crop_area' => $this->StringToJson($row[26]),
                    'crop_average_yeild' => $this->StringToJson($row[27]),
                    'physical_asset_item' => $this->StringToJson($row[28]),
                    'animal_name' => $this->StringToJson($row[29]),
                    'animal_qty' => $this->StringToJson($row[30]),
                    'source_of_irrigation' => $row[31],
                    'source_of_irrigation_engery' => $row[32],
                    'area_length' => $row[33],
                    'line_status' => $row[34],
                    'lined_length' => $row[35],
                    'total_command_area' => $row[36],
                    'account_title' => $row[37],
                    'account_no' => $row[38],
                    'bank_name' => $row[39],
                    'branch_name' => $row[40],
                    'IBAN_number' => $row[41],
                    'branch_code' => $row[42],
                    'front_id_card' => $row[43],
                    'back_id_card' => $row[44],
                    'upload_land_proof' => $row[45],
                    'upload_other_attach' => $row[46],
                    'upload_farmer_pic' => $row[47],
                    'upload_cheque_pic' => $row[48],
                    'verification_status' => null,
                    'declined_reason' => null,
                    'verification_by' => null,
                ]);
                $rowNumber++;
               // dd($this->StringToJson($row[28]));
        }
        catch(\Exception $e){
            \Log::error($e->getMessage());
            throw $e;
        }



    }

    private function StringToJson($e){
        $array = explode(",", $e);
        return json_encode($array);
    }

}
