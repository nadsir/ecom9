<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use League\CommonMark\Extension\Embed\EmbedRenderer;
use App\Models\Admin;
class   AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function updateAdminPassword(){
        $adminDetails=Admin::where('email',Auth::guard('admin')->user()->email)->first()->toArray();
        return view('admin.settings.update-admin-password')->with(compact('adminDetails'));

    }
    public function checkPassword(Request $request){
        $data=$request->all();
        if (Hash::check($data['password'],Auth::guard('admin')->user()->password)){
            return "true";
        }else{
            return "false";
        }


    }
    public function login(Request $request){
        if ($request->isMethod('post')){
            $data=$request->all();
            /*echo "<pre>";print_r($data);die;*/
            //default validation
/*            $validated=$request->validate([
                'email'=>'required|email|max:255',
                'password'=>'required'
            ]);*/
            //validation with custom message
            $rule=[
                'email'=>'required|email|max:255',
                'password'=>'required'
            ];
            $customMessages=[
              'email.required'=>'فیلد ایمیل اجباری می باشد',
                'email.required'=>'فیلد ایمیل اشتباه وارد شده',
                'password.required'=>'فیلد کلمه عبور اجباری می باشد',
            ];
            $this->validate(  $request,$rule,$customMessages);

            if (Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password'],'status'=>1])){
                return  redirect('admin/dashboard');
            }else{
                return redirect()->back()->with('error_message','نام کاربری یا کلمه عبور اشتباه است');
            }

        }
        return view('admin.login');

    }
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
}
