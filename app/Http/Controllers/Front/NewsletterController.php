<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function addSubscriberEmail(Request $request){
        if ($request->ajax()){
            $data=$request->all();
            $subscribeCount=NewsletterSubscriber::where('email',$data['subscriber_email'])->count();
            if ($subscribeCount>0){
                return "exists";
            }else{
                //Add Newsletter email in subscribers table
                $subscriber=new NewsletterSubscriber;
                $subscriber->email=$data['subscriber_email'];
                $subscriber->status=1;
                $subscriber->save();
                return "saved";
            }
        }

    }
}
