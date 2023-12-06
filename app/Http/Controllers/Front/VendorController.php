<?php

namespace App\Http\Controllers\Front;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class VendorController extends Controller
{
    public function LoginRegister(){
        return view('front.vendors.login_register');

    }
    public function VendorRegister(Request $request){
        if ($request->isMethod('post')){
            $data=$request->all();
            //validate vendor
            $rules=[
                "name"=>"required",
                "email"=>"required|email|unique:admins|unique:vendors",
                "mobile"=>"required|min:10|numeric|unique:admins|unique:vendors",
                "accept"=>"required"


            ];
            $customMessages=[
                "name.required"=>"فیلد نام اجباری می باشد",
                "email.required"=>"فیلد ایمیل اجباری می باشد",
                "email.unique"=>"این ایمیل قبلا ثبت شده",
                "mobile.required"=>"فیلد شماره تماس اجباری می باشد",
                "mobile.unique"=>"این شماره تماس قبلا ثبت شده",
                "accept.required"=>"فیلد پذیرش اجباری می باشد",
            ];
            $validator=Validator::make($data,$rules,$customMessages);
            if ($validator->fails()){
                return Redirect::back()->withErrors($validator);
            }




        }


    }
}
