<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use App\Models\VendorsBusinessDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use League\CommonMark\Extension\Embed\EmbedRenderer;
use App\Models\Admin;
use Image;


class   AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function updateVendorDetails($slug,Request $request){
        if ($slug=="personal"){
            if ($request->isMethod('post')){
                $data=$request->all();
                $rules=[
                    'vendor_name'=>'required|regex:/^[\pL\s\-]+$/u',
                    'vendor_city'=>'required|regex:/^[\pL\s\-]+$/u',
                    'vendor_mobile'=>'required|numeric'
                ];
                $customMessages = [
                    'vendor_name.required' => 'فیلد نام اجباری می باشد',
                    'vendor_name.regex' => 'فیلد نام باید مجاز باشد',
                    'vendor_city.required' => 'فیلد شهر اجباری می باشد',
                    'vendor_city.regex' => 'فیلد شهر باید مجاز باشد',
                    'vendor_mobile.required' => 'فیلد ایمیل اشتباه وارد شده',
                    'vendor_mobile.numeric' => 'فیلد تلفن باید عدد باشد',

                ];
                $this->validate($request,$rules,$customMessages);
                //Upload Admin Photo
                if ($request->hasFile('vendor_image')){
                    $image_temp=$request->file('vendor_image');
                    if ($image_temp->isValid()){
                        //Get Image Extension
                        $extension=$image_temp->getClientOriginalExtension();
                        //Generate New Image Name
                        $imageName=rand(111,99999).'.'.$extension;
                        $imagePath='admin/images/photos/'.$imageName;
                        //Upload the Image
                        Image::make($image_temp)->save($imagePath);
                    }

                }
                else if (!empty($data['current_vendor_image'])){$imageName=$data['current_vendor_image'];}
                else {$imageName='';}


                //Update in Admin table
                Admin::where('id', Auth::guard('admin')->user()->id)->update(
                    ['name' => $data['vendor_name'],'mobile' => $data['vendor_mobile'],'image'=>$imageName]);
                //Update in Vendor table
                Vendor::where('id',Auth::guard('admin')->user()->vendor_id)->update(
                    ['name' => $data['vendor_name'],'address' => $data['vendor_address'],'city' => $data['vendor_city'],'state' => $data['vendor_state']
                        ,'country' => $data['vendor_country'],'pincode' => $data['vendor_pincode'],'mobile' => $data['vendor_mobile']]);
                return redirect()->back()->with('success_message','بروزرسانی با موفقیت انجام شد.');
            }
            $vendorDetails=Vendor::where('id',Auth::guard('admin')->user()->vendor_id)->first()->toArray();

        }
        else if ($slug=="business"){
            if ($request->isMethod('post')){
                $data=$request->all();
                $rules=[
                    'shop_name'=>'required|regex:/^[\pL\s\-]+$/u',
                    'shop_city'=>'required|regex:/^[\pL\s\-]+$/u',
                    'shop_mobile'=>'required|numeric',
                    'address_proof'=>'required',

                ];
                $customMessages = [
                    'shop_name.required' => 'فیلد نام اجباری می باشد',
                   ' shop_name.regex' => 'فیلد نام باید مجاز باشد',
                    'shop_city.required' => 'فیلد شهر اجباری می باشد',
                    'shop_city.regex' => 'فیلد شهر باید مجاز باشد',
                    'shop_mobile.required' => 'فیلد ایمیل اشتباه وارد شده',
                    'shop_mobile.numeric' => 'فیلد تلفن باید عدد باشد',
                    'address_proof.required' => 'فیلد عکس اجباری می باشد',


                ];
                $this->validate($request,$rules,$customMessages);
                //Upload Admin Photo
                if ($request->hasFile('address_proof_image')){
                    $image_temp=$request->file('address_proof_image');
                    if ($image_temp->isValid()){
                        //Get Image Extension
                        $extension=$image_temp->getClientOriginalExtension();
                        //Generate New Image Name
                        $imageName=rand(111,99999).'.'.$extension;
                        $imagePath='admin/images/proof/'.$imageName;
                        //Upload the Image
                        Image::make($image_temp)->save($imagePath);
                    }

                }
                else if (!empty($data['current_address_proof'])){$imageName=$data['current_address_proof'];}
                else {$imageName='';}


                //Update in vendors_business_details table
                VendorsBusinessDetail::where('vendor_id',Auth::guard('admin')->user()->vendor_id)->update(
                    ['shop_name' => $data['shop_name'],'shop_address' => $data['shop_address'],'shop_city' => $data['shop_city'],'shop_state' => $data['shop_state']
                        ,'shop_country' => $data['shop_country'],'shop_pincode' => $data['shop_pincode'],'shop_mobile' => $data['shop_mobile'],
                        'business_license_number' => $data['business_license_number'],'gst_number' => $data['gst_number'],
                    'pan_number' => $data['pan_number'],'address_proof' => $data['address_proof'],'address_proof_image' => $imageName,
                        'shop_mobile' => $data['shop_mobile']
                    ]);
                return redirect()->back()->with('success_message','بروزرسانی با موفقیت انجام شد.');
            }

            $vendorDetails=VendorsBusinessDetail::where('id',Auth::guard('admin')->user()->vendor_id)->first()->toArray();

        }
        else if ($slug=="bank"){}
        return view('admin.settings.update_vendor_details')->with(compact('slug','vendorDetails'));

    }

    public function updateAdminPassword(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //check if current password enter by admin is correct
            if (Hash::check($data['current_password'], Auth::guard('admin')->user()->password)) {
                //check if new password is matching with confirm password
                if ($data['new_password'] == $data['confirm_password']) {
                    Admin::where('id', Auth::guard('admin')->user()->id)->update(['password' => bcrypt($data['new_password'])]);
                    return redirect()->back()->with('success_message', 'پسورد با موفقیت عوض شد');
                } else {
                    return redirect()->back()->with('error_message', 'پسوردها جدید مطابقت ندارند');
                }

            } else {
                return redirect()->back()->with('error_message', 'پسورد کنونی اشتباه وارد شده');
            }
        }
        $adminDetails = Admin::where('email', Auth::guard('admin')->user()->email)->first()->toArray();
        return view('admin.settings.update-admin-password')->with(compact('adminDetails'));

    }

    public function checkPassword(Request $request)
    {
        $data = $request->all();
        if (Hash::check($data['password'], Auth::guard('admin')->user()->password)) {
            return "true";
        } else {
            return "false";
        }
    }

    public function updateAdminDetails(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules=[
                'admin_name'=>'required|regex:/^[\pL\s\-]+$/u',
                'admin_mobile'=>'required|numeric'
            ];
            $customMessages = [
                'admin_name.required' => 'فیلد ایمیل اجباری می باشد',
                'admin_mobile.required' => 'فیلد ایمیل اشتباه وارد شده',
                'admin_mobile.numeric' => 'فیلد تلفن باید عدد باشد',
                'admin_name.regex' => 'فیلد نام باید مجاز باشد',

            ];
            $this->validate($request,$rules,$customMessages);
            //Upload Admin Photo
            if ($request->hasFile('admin_image')){
                $image_temp=$request->file('admin_image');
                if ($image_temp->isValid()){
                    //Get Image Extension
                    $extension=$image_temp->getClientOriginalExtension();
                    //Generate New Image Name
                    $imageName=rand(111,99999).'.'.$extension;
                    $imagePath='admin/images/photos/'.$imageName;
                    //Upload the Image
                    Image::make($image_temp)->save($imagePath);
                }

            }
            else if (!empty($data['current_admin_image'])){$imageName=$data['current_admin_image'];}
            else {$imageName='';}


            //Update Admin Details
            Admin::where('id', Auth::guard('admin')->user()->id)->update(
                ['name' => $data['admin_name'],'mobile' => $data['admin_mobile'],'image'=>$imageName]);
            return redirect()->back()->with('success_message','بروزرسانی با موفقیت انجام شد.');
        }
        return view('admin.settings.update-admin-details');

    }

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            /*echo "<pre>";print_r($data);die;*/
            //default validation
            /*            $validated=$request->validate([
                            'email'=>'required|email|max:255',
                            'password'=>'required'
                        ]);*/
            //validation with custom message
            $rule = [
                'email' => 'required|email|max:255',
                'password' => 'required'
            ];
            $customMessages = [
                'email.required' => 'فیلد ایمیل اجباری می باشد',
                'email.required' => 'فیلد ایمیل اشتباه وارد شده',
                'password.required' => 'فیلد کلمه عبور اجباری می باشد',
            ];
            $this->validate($request, $rule, $customMessages);

            if (Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password'], 'status' => 1])) {
                return redirect('admin/dashboard');
            } else {
                return redirect()->back()->with('error_message', 'نام کاربری یا کلمه عبور اشتباه است');
            }

        }
        return view('admin.login');

    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
}
