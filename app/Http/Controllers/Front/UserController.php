<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function LoginRegister(){
        return view('front.users.login_register');
    }
    public function userRegister(Request $request){
        if ($request->ajax()){
            $data=$request->all();
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
                return response()->json(['url'=>$redirectTo]);
            }

        }
    }
}

