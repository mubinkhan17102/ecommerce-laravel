<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admin_login');
    }
    public function dashbord(){
        if(session()->has('admin-name')){
            return view('admin.dashbord');;
        }
        return redirect('/');
    }

    public function showDashbord(Request $request){
        $request->validate(
            [
                'email'=>'required|email',
                'password'=>'required'
            ]
        );

        $admin_email = $request->email;
        $admin_pass = $request->password;
        $user = Admin::where('admin_email', $admin_email)->first();
        if(Hash::check($admin_pass,$user['admin_password'])){
            $request->session()->put('admin-name', $user['admin_name']);
            $request->session()->put('admin-email', $user['admin_email']);
            return redirect('admin/dashbord');
        }else{
            return redirect('admin/login');
        }
    }

    public function logout(){
        session()->flush();
        return redirect('/');
    }
}
