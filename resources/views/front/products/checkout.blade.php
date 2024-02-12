<?php
use App\Models\Product;
?>
@extends('front.layout.layouts')
@section('content')
    <!-- Page Introduction Wrapper -->

    <div class="page-style-a">
        <div class="container">


        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col" style="text-align: center">
                <div class="page-intro" style="font-family: 'B Yekan';text-align: right;direction: rtl">
                    <h2 style="text-align: center">پرداخت</h2>
                    <ul class="bread-crumb" style="text-align: center" >
                        <li class="has-separator">
                            <i class="ion ion-md-home"></i>
                            <a href="index.html">صفحه اصلی</a>
                        </li>
                        <li class="is-marked" >
                            <a  href="/checkout">پرداخت</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Introduction Wrapper /- -->
    <!-- Checkout-Page -->
    <div class="page-checkout u-s-p-t-80" >

            @csrf

        <div class="container" style="margin-bottom: 20px; text-align: right;direction: rtl;font-family: 'B Yekan'">
            @if(Session::has('error_message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert" >
                    <strong>پیام خطا !</strong>
                    <?php echo Session::get('error_message'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif


                <div class="row">
                <div class="col-lg-12 col-md-12" style="text-align: right;direction: rtl;font-family: 'B Yekan'">


                        <div class="row">
                            <div class="col-lg-6" style="border-radius: 6px 6px 6px 6px;background-color: #fafafa;
-moz-border-radius: 6px 6px 6px 6px;
-webkit-border-radius: 6px 6px 6px 6px;
border: 1px solid #fdb414;padding: 0px ">
                                <form action="{{url('/checkout')}}" method="post" name="checkoutForm" id="checkoutForm">
                                    @csrf
                                    @if(count($deliveryAddresses)>0)
                                        <h4 class="section-h4" style="background-color: rgba(252,179,19,0.42);padding: 10px">انتخاب آدرس دریافت</h4>
                                        @foreach($deliveryAddresses as $address)
                                            <div style="    display: flex;
    flex-direction: column-reverse;
    justify-content: space-between;
    align-content: center;
    align-items: center;">
                                                <div class="control-group" style="">
                                                    <br>
                                                    <table style="">
                                                        <tr style="border: solid gray 1px">
                                                            <td style="border: solid gray 1px;padding: 4px">انتخاب</td>
                                                            <td style="border: solid gray 1px;padding: 4px">بروزرسانی</td>
                                                            <td style="border: solid gray 1px;padding: 4px">حذف</td>
                                                        </tr>

                                                        <tr style="">
                                                            <td style="display: flex;justify-content: center;align-items: center;margin-top: 5px"><input type="radio" id="{{$address['id']}}" name="address_id" value="{{$address['id']}}"
                                                                       shipping_charges="{{$address['shipping_charges']}}" total_price="{{$total_price}}" coupon_amount="{{Session::get('couponAmount')}}"></td>
                                                            <td style="text-align: center;margin-top: 5px" > <a style="" href="#update_product" data-addressid="{{$address['id']}}" class="editAddress"><i style="color:#0e4cb3;" class="fa-solid fa-pen-to-square"></i></a></td>
                                                            <td style="display: flex;align-items: center;justify-content: center;margin-top: 5px"><a style="" href="javascript:;" data-addressid="{{$address['id']}}" class="removeAddress"><i style="color: red" class="fa-solid fa-trash"></i></a>&nbsp;&nbsp;</td>
                                                        </tr>
                                                    </table>
                                                    <br>

                                                </div>

                                                <div>
                                                <!--                                                <label for="" class="control-label">{{$address['id']}}, {{$address['name']}}  , {{$address['address']}} , {{$address['city']}} ,
                                                    {{$address['state']}} , {{$address['country']}} , ({{$address['mobile']}})</label>-->


                                                    <label for="" class="control-label">{{$address['id']}} - {{$address['name']}}  ,{{$address['country']}}, , {{$address['city']}} ,
                                                        {{$address['state']}} ,  {{$address['address']}} , ({{$address['mobile']}})</label>

                                                </div>
                                            </div>
                                            <hr>

                                        @endforeach
                                    @endif
                                    <h4 class="section-h4" style="background-color: rgba(252,179,19,0.42);padding: 10px;margin-top: 30px">سفارش شما</h4>
                                    <div class="order-table">
                                        <table class="u-s-m-b-13">
                                            <thead>
                                            <tr>
                                                <th>محصول</th>
                                                <th>مجموع</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php $total_price=0; @endphp
                                            @foreach($getCartItems as $item)
                                                <?php $getDiscountAttibutePrice=Product::getDiscountAttributePrice($item['product_id'],$item['size']);

                                                ?>
                                                <tr>
                                                    <td>
                                                        <a href="{{url('product/'.$item['product_id'])}}">
                                                            <img width="40" src="{{asset('front/images/product_images/small/'.$item['product']['product_image'])}}" alt="Product">

                                                            <h6 class="order-h6">{{$item['product']['product_name']}}<br>@if($item['size'] != 'free'){{$item['size']}}/@endif @if($item['product']['product_color'] != 'free'){{$item['product']['product_color']}}@endif</h6>
                                                        </a>
                                                        <span class="order-span-quantity">x {{$item['quantity']}}</span>

                                                    </td>
                                                    <td>
                                                        <h6 class="order-h6"> {{$getDiscountAttibutePrice['final_price']*$item['quantity']}} تومان</h6>
                                                    </td>
                                                </tr>
                                                @php
                                                    $total_price=$total_price+($getDiscountAttibutePrice['final_price']*$item['quantity']);

                                                @endphp
                                            @endforeach
                                            <tr>
                                                <td>
                                                    <h3 class="order-h3">مجموع</h3>
                                                </td>
                                                <td>
                                                    <h3 class="order-h3">{{$total_price}}تومان</h3>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h6 class="order-h6">هزینه ارسال</h6>
                                                </td>
                                                <td>
                                                    <h6 class="order-h6">
                                                        <strong class="shipping_charges">
                                                            0 تومان
                                                        </strong>
                                                    </h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h6 class="order-h6">تخفیف با کوپن</h6>
                                                </td>
                                                <td>
                                                    <h6 class="order-h6">
                                                        @if(Session::has('couponAmount'))
                                                            <strong class="couponAmount">تومان{{Session::get('couponAmount')}}</strong>
                                                        @else
                                                            0 تومان
                                                        @endif
                                                    </h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h3 class="order-h3">مجموع کل</h3>
                                                </td>
                                                <td>
                                                    <h3 class="order-h3"><strong class="grand_total">{{$total_price-Session::get('couponAmount')}}تومان</strong></h3>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <div class="u-s-m-b-13">
                                            <input type="radio" class="radio-box" name="payment_gateway" id="cash-on-delivery" value="COD">
                                            <label class="label-text" for="cash-on-delivery">پرداخت در محل</label>

                                        </div>
                                        <!--                                    <div class="u-s-m-b-13">
                                                                                <input type="radio" class="radio-box" name="payment-gateway" id="credit-card-stripe" value="Stripe">
                                                                                <label class="label-text" for="credit-card-stripe">Credit Card (Stripe)</label>
                                                                            </div>-->
                                        <div class="u-s-m-b-13">
                                            <input type="radio" class="radio-box" name="payment_gateway" id="paypal" value="Paypal">
                                            <label class="label-text" for="paypal">پرداخت ذرین پال</label>
                                        </div>
                                        <div class="u-s-m-b-13">
                                            <input type="checkbox" name="accept" class="check-box" id="accept" value="Yes"  title="Please agree to t&c" >
                                            <label class=" no-color" for="accept" >باکلیه قوانین سایت موافق هستم
                                            </label>
                                        </div>
                                        <button style="width: 100%;background-color: #fdb414;
    width: 100%;
    border: none!important;
    -webkit-box-shadow: 4px 4px 16px -6px rgba(0,0,0,0.75);
    -moz-box-shadow: 4px 4px 16px -6px rgba(0,0,0,0.75);
    box-shadow: 4px 4px 16px -6px rgba(0,0,0,0.75);margin-top: 10px" id="placeOrder" type="submit" class="button button-outline-secondary">ثبت سفارش</button>
                                    </div>
                                </form>
                                <!-- Checkout /- -->
                            </div>
                            <!-- Billing-&-Shipping-Details -->
                            <div class="col-lg-6" id="deliveryAddresses" style="border-radius: 6px 6px 6px 6px;background-color: #e9e9e9;
-moz-border-radius: 6px 6px 6px 6px;
-webkit-border-radius: 6px 6px 6px 6px;
border: 1px solid #fdb414;padding: 0px">
                                @include('front.products.delivery_addresses')


                            </div>
                            <!-- Billing-&-Shipping-Details /- -->
                            <!-- Checkout -->



                </div>
            </div>
        </div>


    </div>
    <!-- Checkout-Page /- -->
@endsection

