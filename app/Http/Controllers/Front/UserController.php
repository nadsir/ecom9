<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
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
                'mobile'=>'required|numeric|digits:10',
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

