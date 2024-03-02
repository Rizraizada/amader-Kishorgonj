<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserLoginController extends Controller
{
    public function login()
    {
        return view('user.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->guard('web')->attempt(['email' => $request->input('email'),  'password' => $request->input('password')])) {
            //$user = auth()->guard('web')->user();
            //if($user->is_admin == 1) {
            return redirect()->route('userDashboard')->with(['status'=>'success', 'message'=>'You are Logged in sucessfully.']);
            //}
        } else {
            return back()->with(['status' => 'danger', 'message' => 'Whoops! invalid email and password.']);
        }
    }

    public function logout(Request $request)
    {
        auth()->logout();
        Session::flush();
        return redirect()->route('userLogin')->with(['status' => 'success', 'message' => 'You are logout successfully.']);
    }
}
