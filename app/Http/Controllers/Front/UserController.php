<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use App\Models\Sms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Validator;


class UserController extends Controller
{
    public function LoginRegister(){
        return view('front.users.login_register');
    }
    public function userRegister(Request $request){
        if ($request->ajax()){
            $data=$request->all();

            $validadtor=Validator::make($request->all(),[
               'name'=>'required|string|max:100',
                'mobile'=>'required|numeric',
                'email'=>'required|email|max:150|unique:users',
                'password'=>'required|min:6',
                'accept'=>'required'
            ],
            [
                'accept.required'=>'Please accept our Terms & Conditions'
            ]

            );
            if ($validadtor->passes()){
                //Register the User
                $user=new User;
                $user->name=$data['name'];
                $user->mobile=$data['mobile'];
                $user->email=$data['email'];
                $user->password=bcrypt($data['password']);
                $user->status=1;
                $user->save();
                //Send Register Email
                $email=$data['email'];
                $messageData=['name'=>$data['name'],'mobile'=>$data['mobile'],'email'=>$data['email']];
                Mail::send('emails.register',$messageData,function ($message)use($email){
                    $message->to($email)->subject('به فروشگاه x خوش آمدید');

                });
                //Send Register Sms
                $message="کاربر گرامی شما با موفقیت ثبت نام شدید";
                $mobile=$data['mobile'];
                Sms::sendSms($message,$mobile);



                if (Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                    $redirectTo=url('cart');
                    return response()->json(['type'=>'success','url'=>$redirectTo]);
                }


            }else{
                return response()->json(['type'=>'error','errors'=>$validadtor->messages()]);
            }


        }
    }
    public function userLogout(){
        Auth::logout();
        return redirect('/');

    }
}

