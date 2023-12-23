<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use App\Models\Cart;
use App\Models\Sms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Validator;
use Session;


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
            ]);
            if ($validadtor->passes()){
                //Register the User
                $user=new User;
                $user->name=$data['name'];
                $user->mobile=$data['mobile'];
                $user->email=$data['email'];
                $user->password=bcrypt($data['password']);
                $user->status=0;
                $user->save();
                /*Activate the user only when user confirms his email account*/
                $email=$data['email'];
                $messageData=['name'=>$data['name'],'email'=>$data['email'],'code'=>base64_encode($data['email'])];
                Mail::send('emails.confirmation',$messageData,function ($message)use($email){
                    $message->to($email)->subject('تایید اکانت شما در فروشگاه X');
                });
                $redirectTo=url('cart');
                //Redirect back user with success message
                /*$redirectTo=url('user/login-register');*/
                return response()->json(['type'=>'success','message'=>'لطفا ایمیل ارسال شده توسط ما را تایید کنید .','url'=>$redirectTo]);


                /*Activate the user  straight way without sending any confirmation email*/

/*                //Send Register Email
                $email=$data['email'];
                $messageData=['name'=>$data['name'],'mobile'=>$data['mobile'],'email'=>$data['email']];
                Mail::send('emails.register',$messageData,function ($message)use($email){
                    $message->to($email)->subject('به فروشگاه x خوش آمدید');
                });*/
/*                //Send Register Sms
                $message="کاربر گرامی شما با موفقیت ثبت نام شدید";
                $mobile=$data['mobile'];
                Sms::sendSms($message,$mobile);*/



/*                if (Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                    $redirectTo=url('cart');
                    //Update User Cart with user id
                    if (!empty(Session::get('session_id'))){
                        $user_id=Auth::user()->id;
                        $session_id=Session::get('session_id');
                        Cart::where('session_id',$session_id)->update(['user_id'=>$user_id]);
                    }
                    return response()->json(['type'=>'success','url'=>$redirectTo]);
                }
*/

            }else{
                return response()->json(['type'=>'error','errors'=>$validadtor->messages()]);
            }


        }
    }
    public function forgotPassword(Request $request){
        if ($request->ajax()){
            $data=$request->all();
            $validadtor=Validator::make($request->all(),[
                'email'=>'required|email|max:150|exists:users',
            ],
                [
                    'email.exists'=>'ایمیل وجود ندارد .'
                ]);
            if($validadtor->passes()){
                //Generate New Password
                 $new_password=Str::random(16);
                 //Update New Password
                 User::where('email',$data['email'])->update(['password'=>bcrypt($new_password)]);
                 //Get User Details
                $userDetails=User::where('email',$data['email'])->first()->toArray();
                 //Send Email to User
                $email=$data['email'];
                $messageData=['name'=>$userDetails['name'],'email'=>$userDetails['email'],'password'=>$new_password];
                Mail::send('emails.user_forgot_password',$messageData,function ($message) use($email){
                    $message->to($email)->subject('پسورد جدید سایت x');
                });
                //Show Success Message
                return response()->json(['type'=>'success','message'=>'پسورد جدید به ایمیل شما ارسال شد.']);


            }else{
                return response()->json(['type'=>'error','errors'=>$validadtor->messages()]);
            }

        }else{
            return view('front.users.forgot_password');
        }

    }
    public function userLogin(Request $request){
        if ($request->ajax()){
            $data=$request->all();
            $validadtor=Validator::make($request->all(),[

                'email'=>'required|email|max:150|exists:users',
                'password'=>'required|min:6',

            ],
                [
                    'email.required'=>'پر کردن فیلد ایمیل اجباری است.',
                    'email.email'=>'فرمت ایمیل نا معتبر می باشد.',
                ]);
            if ($validadtor->passes()) {
                if (Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                    if (Auth::user()->status==0){
                        Auth::logout();
                        return response()->json(['type'=>'inactive','message'=>'اکانت شما فعال نشده است ! لطفا اکانت خود را فعال نمایید.']);

                    }
                    //Update User Cart with user id
                    if (!empty(Session::get('session_id'))){
                        $user_id=Auth::user()->id;
                        $session_id=Session::get('session_id');
                        Cart::where('session_id',$session_id)->update(['user_id'=>$user_id]);
                    }
                    $redirectTo=url('cart');
                    return response()->json(['type'=>'success','url'=>$redirectTo]);
                }else{
                    return response()->json(['type'=>'incorrect','message'=>'نام کاربری یا رمز عبور اشتباه می باشد.']);
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
    public function confirmAccount($code){
        $email=base64_decode($code);
        $userCount=User::where('email',$email)->count();
        if ($userCount>0){
            $userDetails=User::where('email',$email)->first();
            if ($userDetails->status==1){
                //Redirect the user to Login/Register Page with error message
                return redirect('user/login-register')->with('error_message','اکانت شما در حال حاضر فعال می باشد.');
            }else{
                User::where('email',$email)->update(['status'=>1]);
                //Send Welcome Email
                $messageData=['name'=>$userDetails->name,'mobile'=>$userDetails->mobile,'email'=>$email];
                Mail::send('emails.register',$messageData,function ($message)use($email) {
                    $message->to($email)->subject('به فروشگاه x خوش آمدید');
                });
                return redirect('user/login-register')->with('success_message','اکانت شما فعال می باشد شما میتوانید لاگین کنید.');


            }
        }else{
            abort(404);
        }
    }
}

