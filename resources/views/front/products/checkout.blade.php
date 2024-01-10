<?php
use App\Models\Product;
?>
@extends('front.layout.layouts')
@section('content')
    <!-- Page Introduction Wrapper -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>Checkout</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="index.html">Home</a>
                    </li>
                    <li class="is-marked">
                        <a href="checkout.html">Checkout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Introduction Wrapper /- -->
    <!-- Checkout-Page -->
    <div class="page-checkout u-s-p-t-80">

            @csrf

        <div class="container">
            @if(Session::has('error_message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>پیام خطا !</strong>
                    <?php echo Session::get('error_message'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif


                <div class="row">
                <div class="col-lg-12 col-md-12">


                        <div class="row">
                            <!-- Billing-&-Shipping-Details -->
                            <div class="col-lg-6" id="deliveryAddresses">
                                @include('front.products.delivery_addresses')


                            </div>
                            <!-- Billing-&-Shipping-Details /- -->
                            <!-- Checkout -->

                            <div class="col-lg-6">
                                <form action="{{url('/checkout')}}" method="post" name="checkoutForm" id="checkoutForm">
                                    @csrf
                                @if(count($deliveryAddresses)>0)
                                    <h4 class="section-h4">آدرس دریافت</h4>
                                    @foreach($deliveryAddresses as $address)
                                        <div class="control-group" style="float: left;margin-right: 5px">
                                            <input type="radio" id="{{$address['id']}}" name="address_id" value="{{$address['id']}}">
                                        </div>
                                        <div>
                                            <label for="" class="control-label">{{$address['id']}}, {{$address['name']}}  , {{$address['address']}} , {{$address['city']}} ,
                                                {{$address['state']}} , {{$address['country']}} , ({{$address['mobile']}})</label>
                                            <a style="float: right;margin-left:10px" href="javascript:;" data-addressid="{{$address['id']}}" class="removeAddress">Remove</a>&nbsp;&nbsp;
                                            <a style="float: right" href="javascript:;" data-addressid="{{$address['id']}}" class="editAddress">Edit</a>&nbsp;&nbsp;

                                        </div>
                                    @endforeach
                                @endif
                                <h4 class="section-h4">Your Order</h4>
                                <div class="order-table">
                                    <table class="u-s-m-b-13">
                                        <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
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

                                                <h6 class="order-h6">{{$item['product']['product_name']}}<br>{{$item['size']}}/{{$item['product']['product_color']}}</h6>
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
                                                <h3 class="order-h3">Subtotal</h3>
                                            </td>
                                            <td>
                                                <h3 class="order-h3">{{$total_price}}تومان</h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h6 class="order-h6">Shipping charge</h6>
                                            </td>
                                            <td>
                                                <h6 class="order-h6">$0.00</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h6 class="order-h6">Coupon Discount</h6>
                                            </td>
                                            <td>
                                                <h6 class="order-h6">
                                                    @if(Session::has('couponAmount'))
                                                        تومان{{Session::get('couponAmount')}}
                                                    @else
                                                        0 تومان
                                                    @endif
                                                </h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h3 class="order-h3">Grand Total</h3>
                                            </td>
                                            <td>
                                                <h3 class="order-h3">{{$total_price-Session::get('couponAmount')}}تومان</h3>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="u-s-m-b-13">
                                        <input type="radio" class="radio-box" name="payment_gateway" id="cash-on-delivery" value="COD">
                                        <label class="label-text" for="cash-on-delivery">Cash on Delivery</label>
                                    </div>
<!--                                    <div class="u-s-m-b-13">
                                        <input type="radio" class="radio-box" name="payment-gateway" id="credit-card-stripe" value="Stripe">
                                        <label class="label-text" for="credit-card-stripe">Credit Card (Stripe)</label>
                                    </div>-->
                                    <div class="u-s-m-b-13">
                                        <input type="radio" class="radio-box" name="payment_gateway" id="paypal" value="Paypal">
                                        <label class="label-text" for="paypal">Paypal</label>
                                    </div>
                                    <div class="u-s-m-b-13">
                                        <input type="checkbox" name="accept" class="check-box" id="accept" value="Yes"  title="Please agree to t&c" >
                                        <label class="label-text no-color" for="accept" >I’ve read and accept the
                                            <a href="terms-and-conditions.html" class="u-c-brand">terms & conditions</a>
                                        </label>
                                    </div>
                                    <button id="placeOrder" type="submit" class="button button-outline-secondary">Place Order</button>
                                </div>
                            </form>
                            <!-- Checkout /- -->
                        </div>

                </div>
            </div>
        </div>


    </div>
    <!-- Checkout-Page /- -->
@endsection

