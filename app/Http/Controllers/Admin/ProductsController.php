<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductsImage;
use App\Models\ProductsFilter;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Image;



class ProductsController extends Controller
{
    public function products(){
        Session::put('page','products');
        $products=Product::with(['section'=>function($query){
            $query->select('id','name');
        },'category'=>function($query){
            $query->select('id','category_name');
        }])->get()->toArray();
        return view('admin.products.products')->with(compact('products'));
    }
    public function updateProductStatus(Request $request){
        Session::put('page','products');
        $data=$request->all();
        if ($data['status']=='Active'){
            $status=0;
        }else{
            $status=1;
        }
        Product::where('id',$data['product_id'])->update(['status'=>$status]);
        return response()->json(['status'=>$status,'product_id',$data['product_id']]);
    }
    public function deleteProduct($id){

        //Delete Category
        Product::where('id',$id)->delete();
        $message="محصول با موفقیت حذف شد";
        return redirect()->back()->with('success_message',$message);
    }
    public function addEditProduct(Request $request,$id=null){
        Session::put('page','products');
        if ($id==""){
            $title="اضافه کردن محصول";
            $product=new Product;
            $message='محصول مورد نظر با موفقیت درج شد';
        }else{
            $title="اصلاح محصول";
            $product=Product::find($id);
            $message='محصول مورد نظر با موفقیت بروز رسانی شد';
        }
        if ($request->isMethod('post')){
            $data=$request->all();
           /* echo "<pre>";print_r(Auth::guard('admin')->user()); die;*/
            $rules=[
                'category_id'=>'required',
                'product_name'=>'required|regex:/^[\pL\s\-]+$/u',
                'product_code'=>'required',
                'product_price'=>'required|numeric',
                'product_color'=>'required|regex:/^[\pL\s\-]+$/u',
            ];
            $customMessages = [
                'category_id.required' => 'فیلد  دسته بندی اجباری می باشد',
                'product_name.required' => 'فیلد نام محصول اجباری باشد',
                'product_name.regex' => 'فیلد نام محصول باید مجاز باشد',
                'product_code.required' => 'فیلد کد محصول اجباری باشد',
                'product_code.regex' => 'فیلد کد محصول باید مجاز باشد',
                'product_price.required' => 'فیلد قیمت محصول اجباری باشد',
                'product_price.regex' => 'فیلد قیمت محصول باید مجاز باشد',
                'product_color.required' => 'فیلد رنگ محصول اجباری باشد',
                'product_color.regex' => 'فیلد رنگ محصول باید مجاز باشد',
            ];
            $this->validate($request,$rules,$customMessages);
            //Upload Product Image
            //small:250*250
            //medium:500*500
            //large:1000*1000
            if ($request->hasFile('product_image')){
                $image_temp=$request->file('product_image');
                if ($image_temp->isValid()){
                    //Get Image Extension
                    $extension=$image_temp->getClientOriginalExtension();
                    //Generate New Image Name
                    $imageName=rand(111,99999).'.'.$extension;
                    $largeImagePath='front/images/product_images/large/'.$imageName;
                    $mediumImagePath='front/images/product_images/medium/'.$imageName;
                    $smallImagePath='front/images/product_images/small/'.$imageName;
                    //Upload the Large,medium and small Image
                    Image::make($image_temp)->resize(1000,1000)->save($largeImagePath);
                    Image::make($image_temp)->resize(500,500)->save($mediumImagePath);
                    Image::make($image_temp)->resize(250,250)->save($smallImagePath);
                    //Update Image Name in product table
                    $product->product_image=$imageName;
                }

            }
            else if (!empty($data['current_address_proof'])){$imageName=$data['current_address_proof'];}
            else {
                $imageName='';
            }
            //Upload Product Video
            if ($request->hasFile('product_video')){

                $video_temp=$request->file('product_video');
                if ($video_temp->isValid()){
                    //Upload Video in videos folder

                    $extension=$video_temp->getClientOriginalExtension();
                    $videoName=rand(111,99999).'.'.$extension;
                    $videoPath='front/videos/product_videos/';
                    $video_temp->move($videoPath,$videoName);
                    //insert video to Products table
                    $product->product_video=$videoName;

                }
            }

            //Save Product details in product  table
            $categoryDetails=Category::find($data['category_id']);
            $product->section_id=$categoryDetails['section_id'];
            $product->category_id=$data['category_id'];
            $product->brand_id=$data['brand_id'];

            $productFilters = ProductsFilter::productFilters();
            foreach($productFilters as $filter){
                $filterAvailable = ProductsFilter::filterAvailable($filter['id'], $data['category_id']);
                if ($filterAvailable=="Yes"){

                if (isset($filter['filter_column']) && $data[$filter['filter_column']]){
                    $product->{$filter['filter_column']}=$data[$filter['filter_column']];
                }

                }
            }


            $adminType=Auth::guard('admin')->user()->type;
            $vendor_id=Auth::guard('admin')->user()->vendor_id;
            $admin_id=Auth::guard('admin')->user()->id;
            $product->admin_type=$adminType;
            $product->admin_id=$admin_id;
            if ($adminType=='vendor'){
                $product->vendor_id=$vendor_id;
            }else{
                $product->vendor_id=0;
            }
            if (empty($data['product_discount'])){
                $data['product_discount']=0;
            }
            if (empty($data['product_weight'])){
                $data['product_weight']=0;
            }
            $product->product_name=$data['product_name'];
            $product->product_code=$data['product_code'];
            $product->product_color=$data['product_color'];
            $product->product_price=$data['product_price'];
            $product->product_discount=$data['product_discount'];
            $product->product_weight=$data['product_weight'];
            $product->description=$data['description'];
            $product->meta_title=$data['meta_title'];
            $product->meta_description=$data['meta_description'];
            $product->meta_keywords=$data['meta_keywords'];
            if (!empty($data['is_featured'])){
                $product->is_featured=$data['is_featured'];
            }else{
                $product->is_featured="No";
            }
            if (!empty($data['is_bestseller'])){
                $product->is_bestseller=$data['is_bestseller'];
            }else{
                $product->is_bestseller="No";
            }
            $product->status=1;
            $product->save();
            return redirect('admin/products')->with('success_message',$message);
        }
        //Get Sections with Categories and sub categories
        $categories=Section::with('categories')->get()->toArray();
        //Get All Brands
        $brandss=Brand::where('status',1)->get()->toArray();
        return view('admin.products.add_edit_product')->with(compact('title','categories','brandss','product'));
    }
    public function deleteProductImage($id){
        Session::put('page','products');
        //Get product image
        $productImage=Product::select('product_image')->where('id',$id)->first();
        //Get Product Image Path
        $small_image_path='front/images/product_images/small/';
        $medium_image_path='front/images/product_images/medium/';
        $large_image_path='front/images/product_images/large/';
        //Delete Product small image if exists in small folder
        if (file_exists($small_image_path.$productImage->product_image)){
            unlink($small_image_path.$productImage->product_image);
        }
        //Delete Product medium image if exists in medium folder
        if (file_exists($medium_image_path.$productImage->product_image)){
            unlink($medium_image_path.$productImage->product_image);
        }
        //Delete Product large image if exists in large folder
        if (file_exists($large_image_path.$productImage->product_image)){
            unlink($large_image_path.$productImage->product_image);
        }
        //Delete Product image from products table
        Product::where('id',$id)->update(['product_image'=>'']);
        $message=" عکس محصول با موفقیت حذف شد";
        return redirect()->back()->with('success_message',$message);
    }
    public function deleteProductVideo($id){
        Session::put('page','products');
        //Get Product Video
        $productVideo=Product::select('product_video')->where('id',$id)->first();
        //Get Product video path
        $product_video_path='front/videos/product_videos/';
        //Delete Product Video from product_videos folder if exists
        if (file_exists($product_video_path.$productVideo->product_video)){
            unlink($product_video_path.$productVideo->product_video);

        }
        //Delete Prodcut video Image form products table
        Product::where('id',$id)->update(['product_video'=>'']);
        $message=" ویدیو محصول با موفقیت حذف شد";
        return redirect()->back()->with('success_message',$message);
    }
    public function addAttibures(Request $request,$id){
        Session::put('page','products');
        $product=Product::select('id','product_name','product_code','product_color','product_price','product_image')->with('attributes')->find($id);

        if ($request->isMethod('post')){
            $data=$request->all();


            foreach ($data['sku'] as $key=>$value){
                if (!empty($value)){
                    //SKU duplicate check
                    $skuCount=ProductAttribute::where('sku',$value)->count();
                    if ($skuCount>0){
                        return  redirect()->back()->with('error_message','کد مورد نظر قبلا درج شده کد جدید وارد کنید');
                    }
                    //Size duplicate check
                    $sizeCount=ProductAttribute::where(['product_id'=>$id,'size'=>$data['size'][$key]])->count();
                    if ($skuCount>0){
                        return  redirect()->back()->with('error_message','کد مورد نظر قبلا درج شده کد جدید وارد کنید');
                    }


                    $attribute=new ProductAttribute;
                    $attribute->product_id=$id;
                    $attribute->sku=$value;
                    $attribute->size=$data['size'][$key];
                    $attribute->price=$data['price'][$key];
                    $attribute->stock=$data['stock'][$key];
                    $attribute->status=1;
                    $attribute->save();
                }
                return  redirect()->back()->with('success_message','ویژگی های محصول با موقیت درج شد');
            }

        }

        return view('admin.attributes.add_edit_attributes')->with(compact('product'));

    }
    public function updateAttributeStatus(Request $request){
        Session::put('page','products');
        $data=$request->all();
        if ($data['status']=='Active'){
            $status=0;
        }else{
            $status=1;
        }
        ProductAttribute::where('id',$data['attribute_id'])->update(['status'=>$status]);
        return response()->json(['status'=>$status,'attribute_id',$data['attribute_id']]);
    }
    public function editAttributes(Request $request){
        Session::put('page','products');
        if ($request->isMethod('post')){
            $data=$request->all();
            foreach ($data['attributeId'] as  $key=>$attribute){
                if (!empty($attribute)){
                    ProductAttribute::where(['id'=>$data['attributeId'][$key]])->update(
                        ['price'=>$data['price'][$key],'stock'=>$data['stock'][$key]]
                    );
                }
            }
            return  redirect()->back()->with('success_message','ویژگی های محصول با موقیت بروز رسانی شد');

        }

    }
    public function addImages(Request $request,$id){
        Session::put('page','products');
        $product=Product::select('id','product_name','product_code','product_color','product_price','product_image')->with('images')->find($id);
        if($request->isMethod('post')){
            if ($request->hasFile('images')){
                $images=$request->file('images');
                foreach ($images as $key=>$image)
                {
                    //generate Temp Image
                    $image_tmp=Image::make($image);
                    //Get Image name
                    $image_name=$image->getClientOriginalName();
                    //Get Image Extension
                    $extension=$image->getClientOriginalExtension();
                    //Generate New Image Name
                    $imageName=$image_name.rand(111,99999).'.'.$extension;
                    $largeImagePath='front/images/product_images/large/'.$imageName;
                    $mediumImagePath='front/images/product_images/medium/'.$imageName;
                    $smallImagePath='front/images/product_images/small/'.$imageName;
                    //Upload the Large,medium and small Image
                    Image::make($image_tmp)->resize(1000,1000)->save($largeImagePath);
                    Image::make($image_tmp)->resize(500,500)->save($mediumImagePath);
                    Image::make($image_tmp)->resize(250,250)->save($smallImagePath);

                    //Insert Image Name in product table
                    $image=new ProductsImage();
                    $image->image=$imageName;
                    $image->product_id=$id;
                    $image->status=1;
                    $image->save();
                }


            }
            return  redirect()->back()->with('success_message','عکس های محصول با موقیت بروز رسانی شد');

        }

        return view('admin.images.add_images')->with(compact('product'));

    }
    public function updateImageStatus(Request $request){
        Session::put('page','products');
        $data=$request->all();
        if ($data['status']=='Active'){
            $status=0;
        }else{
            $status=1;
        }
        ProductsImage::where('id',$data['image_id'])->update(['status'=>$status]);

        return response()->json(['status'=>$status,'image_id',$data['image_id']]);
    }
    public function deleteImage($id){
        Session::put('page','products');
        //Get product image
        $productImage=ProductsImage::select('image')->where('id',$id)->first();
        //Get Product Image Path
        $small_image_path='front/images/product_images/small/';
        $medium_image_path='front/images/product_images/medium/';
        $large_image_path='front/images/product_images/large/';
        //Delete Product small image if exists in small folder
        if (file_exists($small_image_path.$productImage->image)){
            unlink($small_image_path.$productImage->image);
        }
        //Delete Product medium image if exists in medium folder
        if (file_exists($medium_image_path.$productImage->image)){
            unlink($medium_image_path.$productImage->image);
        }
        //Delete Product large image if exists in large folder
        if (file_exists($large_image_path.$productImage->image)){
            unlink($large_image_path.$productImage->image);
        }
        //Delete Product image from products_images table
        ProductsImage::where('id',$id)->delete();
        $message=" عکس محصول با موفقیت حذف شد";
        return redirect()->back()->with('success_message',$message);
    }


}

