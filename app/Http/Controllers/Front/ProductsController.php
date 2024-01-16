<?php

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Coupon;
use App\Models\DeliveryAddress;
use App\Models\Order;
use App\Models\OrdersProduct;
use App\Models\ShippingCharge;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Models\ProductsFilter;
use App\Models\Cart;
use Session;
use Illuminate\Support\Facades\Route;
use DB;
use Auth;

class ProductsController extends Controller
{
    public function listing(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            $url = $data['url'];
            $_GET['sort'] = $data['sort'];
            $categoryCount = Category::where(['url' => $url, 'status' => 1])->count();
            if ($categoryCount > 0) {
                //Get Category Details
                $categoryDetails = Category::categoryDetails($url);
                $categoryProducts = Product::with('brand')->whereIn('category_id', $categoryDetails['catIds'])->where('status', 1);
                //checking for Dynamic Filters
                $productFilters = ProductsFilter::productFilters();
                foreach ($productFilters as $key => $filter) {
                    //If filter is selected
                    if (isset($filter['filter_column']) && isset($data[$filter['filter_column']])
                        && !empty($filter['filter_column']) && !empty($data[$filter['filter_column']])) {
                        $categoryProducts->whereIn($filter['filter_column'], $data[$filter['filter_column']]);
                    }
                }

                if (isset($_GET['sort']) && !empty($_GET['sort'])) {
                    //checking for sort
                    if ($_GET['sort'] == "product_latest") {
                        $categoryProducts->orderBy('products.id', 'Desc');
                    } else if ($_GET['sort'] == "price_lowest") {
                        $categoryProducts->orderBy('products.product_price', 'Asc');
                    } else if ($_GET['sort'] == "price_highest") {
                        $categoryProducts->orderBy('products.product_price', 'Desc');
                    } else if ($_GET['sort'] == "name_z_a") {
                        $categoryProducts->orderBy('products.product_name', 'Desc');
                    } else if ($_GET['sort'] == "name_a_z") {
                        $categoryProducts->orderBy('products.product_name', 'Asc');
                    }

                }
                //checking for size
                if (isset($data['size']) && !empty($data['size'])) {
                    $productIds = ProductAttribute::select('product_id')->whereIn('size', $data['size'])->pluck('product_id')->toArray();
                    $categoryProducts->whereIn('products.id', $productIds);
                }
                //checking for color
                if (isset($data['color']) && !empty($data['color'])) {
                    $productIds = Product::select('id')->whereIn('product_color', $data['color'])->pluck('id')->toArray();
                    $categoryProducts->whereIn('products.id', $productIds);
                }
                //checking for price

                $productIds=array();
                if (isset($data['price']) && !empty($data['price'])) {
                    foreach ($data['price'] as $key => $price) {
                        $priceArr = explode("-", $price);
                        if (isset($priceArr[0]) && isset($priceArr[1])){
                            $productIds[] = Product::select('id')->whereBetween('product_price', [$priceArr[0], $priceArr[1]])->pluck('id')->toArray();

                        }
                    }
                    $productIds = array_unique(array_flatten($productIds));
                    $categoryProducts->whereIn('products.id', $productIds);

                }
                //checking for brand
                if (isset($data['brand']) && !empty($data['brand'])) {
                    $productIds = Product::select('id')->whereIn('brand_id', $data['brand'])->pluck('id')->toArray();
                    $categoryProducts->whereIn('products.id', $productIds);
                }


                $categoryProducts = $categoryProducts->paginate(30);

                return view('front.products.ajax_products_listing')->with(compact('categoryDetails', 'categoryProducts', 'url'));


            } else {
                abort('404');
            }

        } else {
            $url = Route::getFacadeRoot()->current()->uri();
            $categoryCount = Category::where(['url' => $url, 'status' => 1])->count();
            if ($categoryCount > 0) {
                //Get Category Details
                $categoryDetails = Category::categoryDetails($url);
                $categoryProducts = Product::with('brand')->whereIn('category_id', $categoryDetails['catIds'])->where('status', 1);
                if (isset($_GET['sort']) && !empty($_GET['sort'])) {
                    //checking for sort
                    if ($_GET['sort'] == "product_latest") {
                        $categoryProducts->orderBy('products.id', 'Desc');
                    } else if ($_GET['sort'] == "price_lowest") {
                        $categoryProducts->orderBy('products.product_price', 'Asc');
                    } else if ($_GET['sort'] == "price_highest") {
                        $categoryProducts->orderBy('products.product_price', 'Desc');
                    } else if ($_GET['sort'] == "name_z_a") {
                        $categoryProducts->orderBy('products.product_name', 'Desc');
                    } else if ($_GET['sort'] == "name_a_z") {
                        $categoryProducts->orderBy('products.product_name', 'Asc');
                    }

                }

                $categoryProducts = $categoryProducts->paginate(30);

                return view('front.products.listing')->with(compact('categoryDetails', 'categoryProducts', 'url'));


            } else {
                abort('404');
            }
        }


    }

    public function vendorListing($vendorid)
    {
        //Get Vendor Shop name
        $getVendorShop = Vendor::getVendorShop($vendorid);
        //Get Vendor Products
        $vendorProducts = Product::with('brand')->where('vendor_id', $vendorid)->where('status', 1);
        $vendorProducts = $vendorProducts->paginate(30);
        return view('front.products.vendor_listing')->with(compact('getVendorShop', 'vendorProducts'));

    }

    public function details($id)
    {
        $productDetails = Product::with(['section', 'category', 'brand', 'attributes' => function ($query) {
            $query->where('stock', '>', 0)->where('status', 1);

        }, 'images', 'vendor'])->find($id)->toArray();

        $categoryDetails = Category::categoryDetails($productDetails['category']['url']);

        //Get Similar Products
        $similarProducts = Product::with('brand')->where('category_id', $productDetails['category']['id'])->where('id', '!=', $id)->limit(6)->inRandomOrder()->get()->toArray();
        //Set Session for recently viewed products
        if (empty(Session::get('session_id'))) {
            $session_id = md5(uniqid(rand(), true));


        } else {
            $session_id = Session::get('session_id');
        }
        Session::put('session_id', $session_id);

        //insert product in table if not already exists
        $countRecentlyViewedProducts = DB::table('recently_viewed_products')->where(['product_id' => $id, 'session_id' => $session_id])->count();
        if ($countRecentlyViewedProducts == 0) {
            DB::table('recently_viewed_products')->insert(['product_id' => $id, 'session_id' => $session_id]);
        }
        //Get Recently Viewed Products Ids
        $recentProductsId = DB::table('recently_viewed_products')->select('product_id')->where('product_id', '!=', $id)
            ->where('session_id', $session_id)->inRandomOrder()->get()->take(4)->pluck('product_id');

        //Get Recently Viewed Products
        $recentlyViewedProducts = Product::with('brand')->whereIn('id', $recentProductsId)->where('id', '!=', $id)->limit(6)->inRandomOrder()->get()->toArray();

        //Get Group Products (products color)
        $groupProducts = array();
        if (!empty($productDetails['group_code'])) {
            $groupProducts = Product::select('id', 'product_image')->where('id', '!=', $id)->where(['group_code' => $productDetails['group_code'], 'status' => 1])->get()->toArray();
        }


        $totalStock = ProductAttribute::where('product_id', $id)->sum('stock');
        return view('front.products.details')->with(compact('productDetails', 'categoryDetails', 'totalStock', 'similarProducts', 'recentlyViewedProducts', 'groupProducts'));

    }

    public function getProductPrice(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            /* echo "<pre>";print_r($data); die;*/
            $getDiscountAttributePrice = Product::getDiscountAttributePrice($data['product_id'], $data['size']);
            return $getDiscountAttributePrice;
        }

    }

    public function cartAdd(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            /* echo "<pre>";print_r($data);die;*/
            //Check Products Stock is available or not
            $getProductStock = ProductAttribute::getProductStock($data['product_id'], $data['size']);
            if ($getProductStock < $data['quantity']) {
                return redirect()->back()->with('error_message', 'تعداد مورد نظر موجود نمی باشد');
            }
            //Generate Session Id if not exists
            $session_id = Session::get('session_id');
            if (empty($session_id)) {
                $session_id = Session::getId();
                Session::put('session_id', $session_id);
            }
            //Check Product if already exists in the User Cart
            if (Auth::check()) {
                //User is logged in
                $user_id = Auth::user()->id;
                $countProducts = Cart::where(['product_id' => $data['product_id'], 'size' => $data['size'], 'user_id' => $user_id])->count();
            } else {
                //User is not logged in
                $user_id = 0;
                $countProducts = Cart::where(['product_id' => $data['product_id'], 'size' => $data['size'], 'session_id' => $session_id])->count();
            }
            if ($countProducts > 0) {
                return redirect()->back()->with('error_message', 'محصول مورد نظر هم اکنون در کارت شما موجود می باشد.');
            }

            //Save Product in carts table
            $item = new Cart;
            $item->session_id = $session_id;
            $item->user_id = $user_id;
            $item->product_id = $data['product_id'];
            $item->size = $data['size'];
            $item->quantity = $data['quantity'];
            $item->save();
            return redirect()->back()->with('success_message', 'محصول با موفقیت به کارت اضافه شد.<a style="text-decoration: underline" href="/cart">نمایش سبد خرید</a>');

        }

    }

    public function cart()
    {
        $getCartItems = Cart::getCartItems();
        return view('front.products.cart')->with(compact('getCartItems'));

    }

    public function cartUpdate(Request $request)
    {
        if ($request->ajax()) {
            Session::forget('couponAmount');
            Session::forget('couponCode');
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/

            //Get Cart Details
            $cartDetails = Cart::find($data['cartid']);
            //Get Available Product Stock
            $availableStock = ProductAttribute::select('stock')->where(['product_id' => $cartDetails['product_id'], 'size' => $cartDetails['size']])->first()->toArray();
            if ($data['qty'] > $availableStock['stock']) {
                $getCartItems = Cart::getCartItems();
                return response()->json(['status' => false, 'message' => 'تعداد موردنظر موجود نمی باشد', 'view' => (string)View::make('front.products.cart_items')->with(compact('getCartItems')), 'headerview' => (string)View::make('front.layout.header_cart_items')->with(compact('getCartItems'))]);
            }

            //Check if product size is available
            $availableSize = ProductAttribute::where(['product_id' => $cartDetails['product_id'], 'size' => $cartDetails['size'], 'status' => 1])->count();
            if ($availableSize == 0) {
                $getCartItems = Cart::getCartItems();
                return response()->json(['status' => false, 'message' => ' سایز موردنظر موجود نمی باشد . لطفا محصول مورد نظر را پاک و محصول دیگری انتخاب کنید', 'view' => (string)View::make('front.products.cart_items')->with(compact('getCartItems')), 'headerview' => (string)View::make('front.layout.header_cart_items')->with(compact('getCartItems'))]);
            }


            //update the Qty
            Cart::where('id', $data['cartid'])->update(['quantity' => $data['qty']]);
            $getCartItems = Cart::getCartItems();
            $totalCartItems = totalCartItems();
            Session::forget('couponAmount');
            Session::forget('couponCode');
            return response()->json(['status' => true, 'totalCartItems' => $totalCartItems, 'view' => (string)View::make('front.products.cart_items')->with(compact('getCartItems')),
                'headerview' => (string)View::make('front.layout.header_cart_items')->with(compact('getCartItems'))]);

        }

    }

    public function cartDelete(Request $request)
    {
        if ($request->ajax()) {
            Session::forget('couponAmount');
            Session::forget('couponCode');
            $data = $request->all();
            Cart::where('id', $data['cartid'])->delete();
            $getCartItems = Cart::getCartItems();
            $totalCartItems = totalCartItems();
            return response()->json(['totalCartItems' => $totalCartItems, 'view' => (string)View::make('front.products.cart_items')->with(compact('getCartItems')),
                'headerview' => (string)View::make('front.layout.header_cart_items')->with(compact('getCartItems'))]);
        }
    }

    public function applyCoupon(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            Session::forget('couponAmount');
            Session::forget('couponCode');

            /*echo "<pre>";print_r($data);die;*/
            $getCartItems = Cart::getCartItems();

            $totalCartItems = totalCartItems();
            $couponCount = Coupon::where('coupon_code', $data['code'])->count();
            if ($couponCount == 0) {
                return response()->json(['status' => false, 'message' => 'کوپن مجاز نمی باشد', 'totalCartItems' => $totalCartItems, 'view' => (string)View::make('front.products.cart_items')->with(compact('getCartItems')),
                    'headerview' => (string)View::make('front.layout.header_cart_items')->with(compact('getCartItems'))]);
            } else {
                //Check for other coupon conditions

                //Get Coupon Details
                $couponDetails = Coupon::where('coupon_code', $data['code'])->first();
                //If Coupon is active
                if ($couponDetails->status == 0) {
                    $message = "کوپن غیر فعال می باشد";
                }
                //Check if coupon is expired
                $expiry_date = $couponDetails->expire_date;
                $current_date = date('Y-m-d');

                if ($expiry_date < $current_date) {
                    $message = "تاریخ کوپن منقضی شده";
                }
                //Check if coupon is for single time
                if ($couponDetails->coupon_type=="Single Times"){
                    //Check in orders table if coupn already availed by the user
                    $couponCount=Order::where(['coupon_code'=>$data['code'],'user_id'=>Auth::user()->id])->count();
                    if ($couponCount>=1){
                        $message="This Coupon Code is already availe by you!";
                    }
                }

                //Check if coupon is from selected categories

                //Get all selected categories from coupon
                $catArr = explode(",", $couponDetails->categories);
                //Check if any cart item not belong to coupon category
                $total_amount=0;
                foreach ($getCartItems as $key => $item) {
                    if (!in_array($item['product']['category_id'], $catArr)) {
                        $message = "این کوپن مربوط به هیچکدام از محصولات داخل کارت نمی باشد.";
                    }
                    $attrPrice=Product::getDiscountAttributePrice($item['product_id'],$item['size']);
                    $total_amount=$total_amount+($attrPrice['final_price']*$item['quantity']);

                }
                //Check if coupon is from selected users
                //Get all selected users from coupon and convert to array
                if (isset($couponDetails->users) && !empty($couponDetails->users)) {
                    $userArr = explode(",", $couponDetails->users);
                    if (count($userArr)) {
                        //Get User Id's of all selected users
                        foreach ($userArr as $key => $user) {
                            $getUserId = User::select('id')->where('email', $user)->first()->toArray();
                            $usersId[] = $getUserId['id'];
                        }
                        //Check if any cart item not belong to coupon user
                        foreach ($getCartItems as $item) {

                            if (!in_array($item['user_id'], $usersId)) {
                                $message = "این کوپن مربوط به شما نمی باشد";
                            }
                        }
                    }
                }
                if ($couponDetails->vendor_id > 0) {
                    $productIds = Product::select('id')->where('vendor_id', $couponDetails->vendor_id)->pluck('id')->toArray();
                    //Check if coupon belongs to vendor products
                    foreach ($getCartItems as $item) {
                        if (!in_array($item['product']['id'], $productIds)) {
                            $message = "این کوپن مربوط به شما نمی باشد(اعتبار سنجی فروشنده)";
                        }


                    }
                }

                //If Error message is there
                if (isset($message)) {
                    return response()->json(['status' => false, 'message' => $message, 'totalCartItems' => $totalCartItems, 'view' => (string)View::make('front.products.cart_items')->with(compact('getCartItems')),
                        'headerview' => (string)View::make('front.layout.header_cart_items')->with(compact('getCartItems'))]);

                }else{
                     //Coupon code id correct
                    //Check if Coupon Amount type is fixed or Percentage
                    if($couponDetails->amount_type=="Fixed"){
                        $couponAmount=$couponDetails->amount;
                    }else{
                        $couponAmount=$total_amount*($couponDetails->amount/100);

                    }
                    $grand_total=$total_amount-$couponAmount;
                    //Ass Coupon code & Amount in Session variables
                    Session::put('couponAmount',$couponAmount);
                    Session::put('couponCode',$data['code']);
                    $message="Coupon Code Successfully applied , You are availing discount!";
                    return response()->json(['status' => true,'couponAmount'=>$couponAmount ,'grand_total'=>$grand_total,'message' => $message, 'totalCartItems' => $totalCartItems, 'view' => (string)View::make('front.products.cart_items')->with(compact('getCartItems')),
                        'headerview' => (string)View::make('front.layout.header_cart_items')->with(compact('getCartItems'))]);


                }

            }


        }

    }
    public function checkout(Request $request){
        $countries=Country::where('status',1)->get()->toArray();
        $getCartItems = Cart::getCartItems();
        if (count($getCartItems)==0){
            $message="Sopping Cart is empty! Please add products to checkout";
            return redirect('cart')->with('error_message',$message);
        }
        $total_price=0;
        $total_weight=0;

        foreach ($getCartItems as $item){

            $attrPrice=Product::getDiscountAttributePrice($item['product_id'],$item['size']);
            $total_price=$total_price+($attrPrice['final_price']*$item['quantity']);
            $product_weight=$item['product']['product_weight'];
            $total_weight=$total_weight+$product_weight;

        }


        $deliveryAddresses=DeliveryAddress::deliveryAddresses();


        foreach ($deliveryAddresses as $key =>$value){
            $shippingCharges=ShippingCharge::getShippingCharges($total_weight,$value['country']);
            $deliveryAddresses[$key]['shipping_charges']=$shippingCharges;

        }





        if ($request->isMethod("post")){
            $data=$request->all();
            /*echo "<pre>";print_r($data);die;*/
            // Delivery Address validation
            if (empty($data['address_id'])){
                $message="Please Select Delivery address";
                return redirect()->back()->with('error_message',$message);
            }
            // Payment method validation
            if (empty($data['payment_gateway'])){
                $message="Please Select payment method";
                return redirect()->back()->with('error_message',$message);
            }
            // Agree to T&C Validation
            if (empty($data['accept'])){
                $message="Please agree to T&c";
                return redirect()->back()->with('error_message',$message);
            }
            //Get Delivery Address from address_id
            $deliveryAddresses=DeliveryAddress::where('id',$data['address_id'])->first()->toArray();


            //Set Payment Method as COD if COD is selected from user otherwise set as prepaid
            if ($data['payment_gateway']=="COD"){
                $payment_method="COD";
                $order_status="New";
            }else{
                $payment_method="Prepaid";
                $order_status="Pending";
            }
            DB::beginTransaction();
            //Fetch Order Total Price
            $total_price=0;
            foreach($getCartItems as $item){
                $getDiscountAttibutePrice=Product::getDiscountAttributePrice($item['product_id'],$item['size']);

                $total_price=$total_price+($getDiscountAttibutePrice['final_price']*$item['quantity']);
            }
            //Calculate Shipping Charge
            $shipping_charges=0;
            //Get Shipping Charges
            $shipping_charges=ShippingCharge::getShippingCharges($total_weight,$deliveryAddresses['country']);

            //Calculate Grand Total
            $grand_total=$total_price+$shipping_charges-Session::get('couponAmount');
            //Insert Grand Total in Session Variable
            Session::put('grand_total',$grand_total);

            //Insert Order Details
            $order=new Order;
            $order->user_id=Auth::user()->id;
            $order->name=$deliveryAddresses['name'];
            $order->address=$deliveryAddresses['address'];
            $order->city=$deliveryAddresses['city'];
            $order->state=$deliveryAddresses['state'];
            $order->country=$deliveryAddresses['country'];
            $order->pincode=$deliveryAddresses['pincode'];
            $order->mobile=$deliveryAddresses['mobile'];
            $order->email=Auth::user()->email;
            $order->shipping_charges=$shipping_charges;
            if (Session::get('couponCode')==null){
                $order->coupon_code="بدون تخفیف";
            }else{
                $order->coupon_code=Session::get('couponCode');
            }
            if (Session::get('couponAmount')==null){
                $order->coupon_amount=0;
            }else{
                $order->coupon_amount=Session::get('couponAmount');
            }
            $order->order_status=$order_status;
            $order->payment_method= $payment_method;
            $order->payment_gateway= $data['payment_gateway'];
            $order->grand_total= $grand_total;
            $order->save();
            $order_id=DB::getPdo()->lastInsertId();
            foreach($getCartItems as $item){
                $cartitem=new OrdersProduct;
                $cartitem->order_id=$order_id;
                $cartitem->user_id=Auth::user()->id;
                $getProductDetails=Product::select('product_code','product_name','product_color','admin_id','vendor_id')->where('id',$item['product_id'])->first()->toArray();
               /* dd($getProductDetails);*/
                $cartitem->admin_id=$getProductDetails['admin_id'];
                $cartitem->vendor_id=$getProductDetails['vendor_id'];
                $cartitem->product_id=$item['product_id'];
                $cartitem->product_code=$getProductDetails['product_code'];
                $cartitem->product_name=$getProductDetails['product_name'];
                $cartitem->product_color=$getProductDetails['product_color'];
                $cartitem->product_size=$item['size'];
                $getDiscountAttibutePrice=Product::getDiscountAttributePrice($item['product_id'],$item['size']);
                $cartitem->product_price=$getDiscountAttibutePrice['final_price'];
                $cartitem->product_qty=$item['quantity'];
                $cartitem->save();
            }
            //Insert Order Id Session variable
            Session::put('order_id',$order_id);
            DB::commit();
            $orderDetails=Order::with('orders_products')->where('id',$order_id)->first()->toArray();

            if ($data['payment_gateway']=="COD"){
                //Send Order Email
                $email=Auth::user()->email;
                $messageData=[
                    'email'=>$email,
                    'name'=>Auth::user()->name,
                    'order_id'=>$order_id,
                    'orderDetails'=>$orderDetails
                ];
                Mail::send('emails.order',$messageData,function($message)use ($email){
                   $message->to($email)->subject('Order Placed - StackDeveloper.in');
                });
                //Send Order SMS
                /*                //Send Register Sms
                $message="کاربر گرامی شما با موفقیت ثبت نام شدید";
                $mobile=$data['mobile'];
                Sms::sendSms($message,$mobile);*/
            }if ($data['payment_gateway']=="Paypal") {
                return  redirect('/paypal');

            }else{

                echo "Other Prepaid payment methods coming soon";
            }
            return redirect('thanks');
        }



        return view('front.products.checkout')->with(compact('deliveryAddresses','countries','getCartItems','total_price'));

    }
    public function thanks(){
        if (Session::has('order_id')){
            //Empty the cart
            Cart::where('user_id',Auth::user()->id)->delete();
            return view('front.products.thanks');

        }else{
            return redirect('cart');

        }
        return view('front.products.thanks');
    }
}
