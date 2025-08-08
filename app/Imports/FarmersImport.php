<?php

namespace App\Imports;

use App\Models\HardCopyFarmer;
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
            // if (count($row) !== 8) {
            //     throw new \Exception("Excel Invalid...");
            // }





                // Example usage
                $cnic_issue_date = $row[5];
                if (is_numeric($cnic_issue_date)) {
                    $cnic_issue_date = $this->excelDateToDate($cnic_issue_date);
                }
                else{
                    $cnic_issue_date = $row[5];
                }


                // Example usage
                $cnic_expiry_date = $row[5];
                if (is_numeric($cnic_expiry_date)) {
                    $cnic_expiry_date = $this->excelDateToDate($cnic_expiry_date);
                }
                else{
                    $cnic_expiry_date = $row[5];
                }


                // Example usage
                $date_of_birth = $row[5];
                if (is_numeric($date_of_birth)) {
                    $date_of_birth = $this->excelDateToDate($date_of_birth);
                }
                else{
                    $date_of_birth = $row[5];
                }

                return new HardCopyFarmer([

                    // $data['admin_or_user_id'] = Auth::id();
                    // $data['land_emp_id'] = Auth()->user()->user_id;
                    // $data['land_emp_name'] = Auth()->user()->name;

                    'name' => $row[1],
                    'father_name' => $row[2],
                    'mother_maiden_name' => $row[3],
                    'cnic' => $row[4],
                    'cnic_issue_date' => $cnic_issue_date,
                    'cnic_expiry_date' => $cnic_expiry_date,
                    'date_of_birth' => $date_of_birth,
                    'gender' => $row[9],
                    'correspondence_address' => $row[11],
                    'permanent_address' => $row[11],
                    'district' => $row[13],
                    'mobile' => $row[14],
                    'survey_no' => $row[15],
                    'total_landing_acre' => $row[16],
                    'total_area_cultivated_land' => $row[17],
                ]);
                $rowNumber++;
               // dd($this->StringToJson($row[28]));
        }
        catch(\Exception $e){
            \Log::error($e->getMessage());
            throw $e;
        }



    }


     function excelDateToDate($serial) {
        $unixDate = ($serial - 25569) * 86400; // Convert Excel serial date to Unix timestamp
        return date('Y-m-d', $unixDate); // Format it to '22-07-2024'
    }


    private function StringToJson($e){
        $array = explode(",", $e);
        return json_encode($array);
    }

}
