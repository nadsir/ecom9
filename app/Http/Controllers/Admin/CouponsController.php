<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Coupon;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class CouponsController extends Controller
{
    public function coupons(){
        Session::put('page','coupon');
        $coupons=Coupon::get()->toArray();
       return view('admin.coupons.coupons')->with(compact('coupons'));
    }
    public function updateCouponStatus(Request $request){
        Session::put('page','coupon');
        $data=$request->all();
        if ($data['status']=='Active'){
            $status=0;
        }else{
            $status=1;
        }
        Coupon::where('id',$data['coupon_id'])->update(['status'=>$status]);
        return response()->json(['status'=>$status,'coupon_id',$data['coupon_id']]);
    }
    public function deleteCoupon($id){
        //Delete Section
        Coupon::where('id',$id)->delete();
        $message="بخش مورد نظر با موفقیت حذف شد !";
        return redirect()->back()->with('success_message',$message);

    }
    public function addEditCoupon(Request $request,$id=null){
        if ($id==""){
            //Add Coupon
            $title="اضافه کردن کوپن";
            $coupon=new Coupon;
            $message="کوپن با موفقیت اضافه شد";
        }else{
            //Update Coupon
            $title="بروزرسانی کوپن";
            $coupon=Coupon::find($id);
            $message="کوپن با موفقیت بروزرسانی شد";

        }
        if ($request->isMethod('post')){
            $data=$request->all();
            $rules=[
                'categories'=>'required',
                'brands'=>'required',
                'coupon_option'=>'required',
                'coupon_type'=>'required',
                'amount_type'=>'required',
                'amount'=>'required|numeric',
                'expire_date'=>'required',
            ];
            $customMessages = [
                'categories.required' => 'فیلد  دسته بندی اجباری می باشد',
                'brands.required' => 'فیلد برند محصول اجباری باشد',
                'coupon_option.required' => 'فیلد نوع کوپن اجباری باشد',
                'coupon_type.required' => 'فیلد تعداد تخصیص اجباری باشد',
                'amount_type.required' => 'نوع تخفیف اجباری باشد',
                'amount.required' => 'مقدار تخفیف اجباری باشد',
                'expire_date.required' => 'تاریخ انقضا اجباری باشد',
            ];
            $this->validate($request,$rules,$customMessages);
            if (isset($data['categories'])){
                $categories=implode(",",$data['categories']);
            }else{
                $categories="";
            }
            if (isset($data['brands'])){
                $brands=implode(",",$data['brands']);
            }else{
                $brands="";
            }
            if (isset($data['users'])){
                $users=implode(",",$data['users']);
            }else{
                $users="";
            }
            if ($data['coupon_option']=="Automatic"){
                $coupon_code=str_random(8);


            }else{
                $coupon_code=$data['coupon_code'];
            }
            $adminType=Auth::guard('admin')->user()->type;
            if ($adminType=='vendor'){
                $coupon->vendor_id=Auth::guard('admin')->user()->vendor_id;
            }else{
                $coupon->vendor_id=0;
            }
            $coupon->coupon_option=$data['coupon_option'];
            $coupon->coupon_type=$data['coupon_type'];
            $coupon->coupon_code=$coupon_code;
            $coupon->categories=$categories;
            $coupon->brands=$brands;
            $coupon->users=$users;
            $coupon->amount_type=$data['amount_type'];
            $coupon->amount=$data['amount'];
            $coupon->expire_date=$data['expire_date'];
            $coupon->status=1;
            $coupon->save();
            return redirect('admin/coupons')->with('success_message',$message);
        }
        //Get Sections with Categories and sub categories
        $categories=Section::with('categories')->get()->toArray();
        //Get All Brands
        $brandss=Brand::where('status',1)->get()->toArray();
        //Get All Users
        $users=User::select('email')->where('status',1)->get();

        return view('admin.coupons.add_edit_coupon')->with(compact('title','message','categories','brandss','users'));
    }
}
