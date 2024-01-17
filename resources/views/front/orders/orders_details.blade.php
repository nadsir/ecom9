<?php
    use App\Models\Product;


    ?>
@extends('front.layout.layouts')
@section('content')
    <!-- Page Introduction Wrapper -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>#  جزئیات {{$orderDetails['id']}} سفارش </h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="index.html">Home</a>
                    </li>
                    <li class="is-marked">
                        <a href="{{url('user/orders')}}">سفارشات </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Introduction Wrapper /- -->
    <!-- Cart-Page -->
    <div class="page-cart u-s-p-t-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" align="center">
                    <table class="table  table-striped table-borderless" >
                        <tr class="table-primary"><td colspan="2"><strong>Order Details</strong></td></tr>
                        <tr><td>Order Date</td><td>{{date('Y-m-d h:i:s', strtotime($orderDetails['created_at']))}}</td></tr>
                        <tr><td>Order Status</td><td>{{$orderDetails['order_status']}}</td></tr>
                        <tr><td>Order Total</td><td> تومان{{$orderDetails['grand_total']}}</td></tr>
                        <tr><td>Shipping Charges</td><td> تومان   {{$orderDetails['shipping_charges']}}</td></tr>
                        @if($orderDetails['coupon_code'] !="")
                        <tr><td>Coupon Code</td><td>{{$orderDetails['coupon_code']}}</td></tr>
                        <tr><td>Coupon Amount</td><td> تومان  {{$orderDetails['coupon_amount']}}</td></tr>
                        @endif
                        @if($orderDetails['courier_name'] !="")
                            <tr><td>Courier Name</td><td>{{$orderDetails['courier_name']}}</td></tr>
                            <tr><td>Tracking Number</td><td>{{$orderDetails['tracking_number']}}</td></tr>
                        @endif
                        <tr><td>Payment Methods</td><td>{{$orderDetails['payment_method']}}</td></tr>
                    </table>
                    <table class="table table-striped table-borderless" >
                        <tr class="table-primary">
                        <th>Product Image</th>
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th>Product Size</th>
                        <th>Product Color</th>
                        <th>Product Qty</th>
                        </tr>
                        @foreach($orderDetails['orders_products'] as $product)
                            <tr>
                                <td>
                                    @php $getProductImage=Product::getProductImage($product['product_id']); @endphp
                                    <a target="_blank" href="{{url('product/'.$product['product_id'])}}"> <img  alt="" style="width: 80px" src="{{asset('front/images/product_images/small/'.$getProductImage)}}"></a>
                                </td>
                                <td>{{$product['product_code']}}</td>
                                <td>{{$product['product_name']}}</td>
                                <td>{{$product['product_size']}}</td>
                                <td>{{$product['product_color']}}</td>
                                <td>{{$product['product_qty']}}</td>
                            </tr>
                        @if($product['courier_name'] !="")
                            <tr><td colspan="6">Courier Name : {{$product['courier_name']}} , Tracking Number : {{$product['tracking_number']}}  </td></tr>
                            @endif
                        @endforeach
                    </table>
                    <table class="table table-striped table-borderless" >
                        <tr class="table-primary"><td colspan="2"><strong>Delivery Address</strong></td></tr>
                        <tr><td>Name</td><td>{{$orderDetails['name']}}</td></tr>
                        <tr><td>Address</td><td>{{$orderDetails['address']}}</td></tr>
                        <tr><td>City</td><td>{{$orderDetails['city']}}</td></tr>
                        <tr><td>state</td><td>{{$orderDetails['state']}}</td></tr>
                        <tr><td>Country</td><td>{{$orderDetails['country']}}</td></tr>
                        <tr><td>Pincode</td><td>{{$orderDetails['pincode']}}</td></tr>
                        <tr><td>Mobile</td><td>{{$orderDetails['mobile']}}</td></tr>

                    </table>

                </div>
            </div>
        </div>
    </div>
    <!-- Cart-Page /- -->
@endsection
<script>
    import Options from "../../../../public/admin/dist/js/plugins/chartjs2/docs/general/options.html";
    export default {
        components: {Options}
    }
</script>
