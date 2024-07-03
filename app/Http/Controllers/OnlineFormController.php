<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class OnlineFormController extends Controller
{
    public function index()
    {
        return view('auth.online-login');
    }

    public function authenticate(request $request){


        $user = User::where('cnic', $request->cnic)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::guard('web')->login($user);

            return  redirect()->route('home');
        }
        else
        {
                return redirect()->route('online-login-form')->withErrors(['credentials' => 'Invalid Cnic or password'])->withInput();
        }
    }

    public function logout(){
        auth()->logout();
        return  redirect()->route('online-login-form');
     }


}
