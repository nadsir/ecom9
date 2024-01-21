<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Validator;

class CmsController extends Controller
{
    public function contact(Request $request){
        if ($request->isMethod('post')){
            $data=$request->all();
            $rules=[
                "name"=>'required|string|max:100',
                "email"=>"required|email|max:150",
                "subject"=>"required|max:200",
                "message"=>"required",
            ];
            $customMessages=[
                'name.required'=>'فیلد نام اجباری می باشد.',
                'email.required'=>'فیلد ایمیل اجباری می باشد.',
                'email.email'=>'ایمل وارد شده مجاز نمی باشد.',
                'subject.required'=>'فیلد موضوع اجباری می باشد.',
                'message.required'=>'فیلد پیام اجباری می باشد.',
            ];
            $validator=Validator::make($data,$rules,$customMessages);
            if ($validator->fails()){
                return  redirect()->back()->withErrors($validator)->withInput();
            }

            //Send User query to Admin
            $email="nader.davarmanesh62@gmail.com";
            $messageData=[
                'name'=>$data['name'],
                'email'=>$data['email'],
                'subject'=>$data['subject'],
                'comment'=>$data['message'],

            ];
            Mail::send('emails.enquiry',$messageData,function ($message)use ($email){
               $message->to($email)->subject("Enquiry from Stack Developers Website");
            });
            $message="Thanks for your query.We will get back to you soon.";
            return  redirect()->back()->with('success_message',$message);



        }
        return view('front.pages.contact');
    }
}
