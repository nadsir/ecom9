<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CmsController extends Controller
{
    public function contact(Request $request){
        if ($request->isMethod('post')){
            $data=$request->all();

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
