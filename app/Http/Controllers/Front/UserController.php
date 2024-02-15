<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use App\Models\Cart;
use App\Models\Country;
use App\Models\Sms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
                'name.required'=>'لطفا فیلد نام کاربری را پر کنید',
                'name.string'=>'فیلد نام فقط باید حرف باشد',
                'name.max'=>'تعداد حروف بیشتر از صد کارکتر می باشد',
                'mobile.required'=>'لطفا فیلد شماره همراه را پر کنید',
                'mobile.numeric'=>'فیلد شماره تلفن باید عدد باشد',
                'email.required'=>'لطفا فیلد ایمیل را پر کنید',
                'email.email'=>'فرمت ایمیل نادرست می باشد',
                'email.max'=>'تعداد کارکترها بیشتر از صد کارکتر می باشد',
                'email.unique'=>'ایمیل تکراری می باشد',
                'password.required'=>'لطفا فیلد گذر واژه را پر کنید',
                'password.min'=>'گذر واژه باید بیشتر از شش کارکتر باشد',
                'accept.required'=>'لطفا قوانین سایت را بپذیرید',
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
                    $message->to($email)->subject('تایید اکانت شما در فروشگاه پارس اگزوز');
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
    public function userAccount(Request $request){
        if ($request->ajax()){
            $data=$request->all();
            /*echo "<pre>";print_r($data);die;*/
            $validadtor=Validator::make($request->all(),[
                'name'=>'required|string|max:100',
                'city'=>'required|string|max:100',
                'state'=>'required|string|max:100',
                'address'=>'required|string|max:100',
                'country'=>'required|string|max:100',
                'mobile'=>'required|numeric',
                'pincode'=>'required|numeric',

            ],
                [
                    'name.required'=>'فیلد نام خالی می باشد '
                ]);
            if ($validadtor->passes()){
                //Update User Details
                User::where('id',Auth::user()->id)->update([
                   'name'=>$data['name'],
                    'mobile'=>$data['mobile'],
                    'city'=>$data['city'],
                    'state'=>$data['state'],
                    'country'=>$data['country'],
                    'pincode'=>$data['pincode'],
                    'address'=>$data['address']
                ]);
                //Redirect back user with success message
                return response()->json(['type'=>'success','message'=>'اطلاعات ناحیه کاربری شما با موفقیت بروزرسانی شد .']);


            }else{
                return response()->json(['type'=>'error','errors'=>$validadtor->messages()]);
            }


        }else{
            $countries=Country::where('status',1)->get()->toArray();
            return view('front.users.user_account')->with(compact('countries'));
        }


    }
    public function userUpdatePassword(Request $request){
        if ($request->ajax()){
            $data=$request->all();

            $validadtor=Validator::make($request->all(),[
                'current_password'=>'required',
                'new_password'=>'required|string|min:6',
                'confirm_password'=>'required|min:6|same:new_password',


            ],
                [
                    'current_password.required'=>'فیلد نام خالی می باشد '
                ]);
            if ($validadtor->passes()){
                $current_password=$data['current_password'];
                $checkPassword=User::where('id',Auth::user()->id)->first();
                if (Hash::check($current_password,$checkPassword->password)){
                    //Update User Current Password
                    $user=User::find(Auth::user()->id);
                    $user->password=bcrypt($data['new_password']);
                    $user->save();
                    return response()->json(['type'=>'success','message'=>'رمز عبور شما با موفقیت بروزرسانی شد .']);

                }else{
                    //Redirect back user with success message
                    return response()->json(['type'=>'incorrect','message'=>'رمز عبور فعلی شما نا معتبر می باشد .']);
                }



                //Redirect back user with success message
                return response()->json(['type'=>'success','message'=>'اطلاعات ناحیه کاربری شما با موفقیت بروزرسانی شد .']);


            }else{
                return response()->json(['type'=>'error','errors'=>$validadtor->messages()]);
            }


        }else{
            $countries=Country::where('status',1)->get()->toArray();
            return view('front.users.user_account')->with(compact('countries'));
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
                    'email.exists'=>'ایمیل مورد نظر اشتباه وارد شده',
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
        Session::flush();
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

