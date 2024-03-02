<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;



class AdminLoginController extends Controller
{
    public function login()
    {



        return view('admin.login');

    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            // 'password' => 'required',
        ]);

        // $admin = Admin::find(1);

        // if ($admin) {
        //     $admin->password = Hash::make('12345');
        //     $admin->save();
        // }

        if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            //$user = auth()->guard('admin')->user();
            //if($user->is_admin == 1) {
            // $pass = 123;
            return redirect()->route('adminDashboard')->with(['status' => 'success', 'message' => 'You are Logged in successfully.']);
            //}
        } else {
            return back()->with(['status' => 'danger', 'message' => 'Whoops! invalid email and password.']);
        }
    }

    public function logout(Request $request)
    {
        auth()->guard('admin')->logout();
        Session::flush();
        return redirect()->route('adminLogin')->with(['status' => 'success', 'message' => 'You are logout successfully.']);
    }
}
