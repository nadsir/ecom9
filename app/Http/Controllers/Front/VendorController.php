<?php

namespace App\Http\Controllers\Front;

use App\Models\Admin;

use App\Models\Vendor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
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


            //چون اطلاعات در دو دیتابیس ذخیره سازی می شوند باید اطمینان حاصل شود برای هین از متد زیز استفاده میکنیم
            DB::beginTransaction();


            //create vendors account

            //insert the vendor details in vendors table
            $vendor=new Vendor;
            $vendor->name=$data['name'];
            $vendor->mobile=$data['mobile'];
            $vendor->email=$data['email'];
            $vendor->status=0;
            date_default_timezone_set("Asia/Tehran");
            $vendor->created_at=date("Y-m-d H:i:s");
            $vendor->updated_at=date("Y-m-d H:i:s");
            $vendor->save();

            $vendor_id=DB::getPdo()->lastInsertId();

            //insert the vendor details in admins table

            $admin=new Admin;
            $admin->type='vendor';
            $admin->vendor_id=$vendor_id;
            $admin->name=$data['name'];
            $admin->mobile=$data['mobile'];
            $admin->email=$data['email'];
            $admin->password=bcrypt($data['password']);
            $admin->status=0;
            date_default_timezone_set("Asia/Tehran");
            $admin->created_at=date("Y-m-d H:i:s");
            $admin->updated_at=date("Y-m-d H:i:s");
            $admin->save();
            //send confirmation email to the vendor
            $email=$data['email'];
            $messageData=[
                'email'=>$data['email'],
                'name'=>$data['name'],
                'code'=>base64_encode($data['email'])
            ];
            Mail::send('emails.vendor_confirmation',$messageData,function($message)use($email){
                $message->to($email)->subject('confirm your vendor Account');
            });
            DB::commit();



            //Redirect back vendor with success message
            $message="با تشکر از شما همکار عزیز برای ثبت نام در سایت ما . ایمیل تاییدیه به ایمیل آدرس شما ارسال گردید";
            return  redirect()->back()->with('success_message',$message);





        }


    }
    public function confirmVendor($email){
        //Decode Vendor Email
        $email=base64_decode($email);
        //Check vendor Email exists
        $vendorCount=Vendor::where('email',$email)->count();
        if ($vendorCount>0){
            //Vendor Email is already activated or not
            $vendorDetails=Vendor::where('email',$email)->first();
            if ($vendorDetails->confirm == "Yes"){
                $message="حساب کاربری شما ساخته شده می توانید لاگین کنید.";
                return redirect('vendor/login-register')->with('error_message',$message);
            }else{
                //Update confirm column to Yes in both admins / vendor tables to activate
                Admin::where('email',$email)->update(['confirm'=>'Yes']);
                Vendor::where('email',$email)->update(['confirm'=>'Yes']);

                //Send Register Email

                $messageData=[
                    'email'=>$email,
                    'name'=>$vendorDetails->name,
                    'mobile'=>$vendorDetails->mobile
                ];
                Mail::send('emails.vendor_confirmed',$messageData,function($message)use($email){
                    $message->to($email)->subject('حساب کاربری فروش شما فعال گردید');

                });



                //Redirect to Vendor Login/Register page with Success message
                $message="ایمیل فروش شما فعال گردید . شما میتوانید وارد شده و اطلاعات خود را تکمیل کنید";
                return redirect('vendor/login-register')->with('success_message',$message);
            }

        }else{
            abort(404);
        }

    }
}
