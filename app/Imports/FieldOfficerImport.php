<?php

namespace App\Imports;

use App\Models\FieldOfficer;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str; // Random password generate karne ke liye

class FieldOfficerImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // **Random Password Generate Karein**
        $randomPassword = Str::random(8); // 8 character ka strong password

        // **Field Officer Create Karein (Plain Password)**
        $fieldOfficer = FieldOfficer::create([
            'admin_or_user_id' => $row['admin_or_user_id'],
            'full_name'        => $row['full_name'],
            'contact_number'   => $row['contact_number'],
            'cnic'             => $row['cnic'],
            'email_address'    => $row['email_address'],
            'district'         => $row['district'],
            'tehsil'           => $row['tehsil'],
            'tappas'           => $row['tappas'],
            'password'         => $randomPassword, // **Plain text password**
            'created_at'       => now(),
            'updated_at'       => now()
        ]);

        // **User Create Karein (Hashed Password)**
        User::create([
            'user_id'   => $fieldOfficer->id, // FieldOfficer ki ID User me store karein
            'name'      => $row['full_name'],
            'email'     => $row['email_address'],
            'usertype'  => 'Field_Officer',
            'district'         => $row['district'],
            'tehsil'           => $row['tehsil'],
            'tappas'           => $row['tappas'],
            'password'  => Hash::make($randomPassword), // **Hashed password**
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return $fieldOfficer;
    }
}
