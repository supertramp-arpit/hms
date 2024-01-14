<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AdminLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function admin_login(){
        return view('Backend.Auth.Login');
    }

    public function login(Request $request){
        #admin
        $data = AdminLogin::where('email', $request->email)->first();
         
        if ($data) {
          if (Hash::check($request->password, $data->password)) {
            $request->session()->put('admin-auth', $data);
             return redirect('admin/dashboard')->with('succesfully logged in');
          }
        }
        return redirect()->back()->with(['error'=>'Oppes! You have entered invalid credentials']);
    }

    public function admin_logout(){
        session()->forget('admin-auth');
        return redirect('/admin/login');
    }
}
