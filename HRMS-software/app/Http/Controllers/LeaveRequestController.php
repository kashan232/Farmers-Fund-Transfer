<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveRequestController extends Controller
{
    public function all_leaverequest()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            // $LeaveTypes = LeaveType::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.leave_request.leave_request', [
                // 'LeaveTypes' => $LeaveTypes,
            ]);
        } else {
            return redirect()->back();
        }
    }
}
