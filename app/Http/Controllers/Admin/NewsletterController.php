<?php

namespace App\Http\Controllers\Admin;

use App\Exports\subscribersExport;
use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscriber;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Session;

class NewsletterController extends Controller
{
    public function subscribers(){
        Session::put('page','subscribers');
        $subscribers=NewsletterSubscriber::get()->toArray();
        return  view('admin.subscribers.subscribers')->with(compact('subscribers'));
    }
    public function updateSubscriberStatus(Request $request){
        Session::put('page','subscribers');
        $data=$request->all();
        if ($data['status']=='Active'){
            $status=0;
        }else{
            $status=1;
        }
        NewsletterSubscriber::where('id',$data['subscriber_id'])->update(['status'=>$status]);
        return response()->json(['status'=>$status,'subscriber_id',$data['subscriber_id']]);
    }
    public function deleteSubscriber($id){
        //Delete Section
        NewsletterSubscriber::where('id',$id)->delete();
        $message="بخش مورد نظر با موفقیت حذف شد !";
        return redirect()->back()->with('success_message',$message);

    }
    public function exportSubscribers(){
        return Excel::download(new subscribersExport ,'subscribers.xlsx');

    }

}
