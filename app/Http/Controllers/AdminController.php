<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function AdminDashboard(){
        return view('admin.index');
    }


    public function AdminLogout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('admin/login');
    }

    public function AdminLogin(Request $request){
        return view('admin.admin_login');
    }


    public function AdminProfile(Request $request){
        $data['getRecord'] = User::find(Auth::user()->id);
        return view('admin.admin_profile', $data);
    }

    public function AdminProfileUpdate(Request $request){


        // $user = $request()->validate([
        //   'email'=> 'requrired|unique:users,email,' .Auth::user()->id
        // ]);

        $user = User::find(Auth::user()->id);
        // dd($user);
        
        $user->name = trim($request->name);
        $user->username = trim($request->username);
        $user->phone = trim($request->phone);
        $user->address = trim($request->address);

        if(!empty($request->password)){
         $user->password = Hash::make($request->password);      
        }

        if(!empty($request->file('photo'))){
              $file = $request->file('photo');
              $randomStr = Str::random(30);
              $filename = $randomStr .'.' .$file->getClientOriginalExtension();
              $file->move('upload/', $filename);
              $user->photo = $filename;
        }

        $user->save();

        return redirect('/admin/profile')->with('success', 'Profilce Update Successfully');






    }
}
