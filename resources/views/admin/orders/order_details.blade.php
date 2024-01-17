<?php

use App\Models\Product;
use App\Models\OrdersLogs;
use App\Models\Vendor;
if(Auth::guard('admin')->user()->type=="vendor"){
 $getVendorCommission=Vendor::getVendorCommission(Auth::guard('admin')->user()->vendor_id);
}
?>
@extends('admin.layout.layout')
@section('content')
    <div class="content-wrapper" style="min-height: 805px;">
        @if(Session::has('success_message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>پیام پذیرش !</strong>
                {{Session::get('success_message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
    @endif
    <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> اطلاعات مربوط به سفارش </h1>
                        <a href="{{url('admin/orders')}}">
                            <button type="button" class="btn btn-block btn-outline-info btn-lg">بازگشت</button>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="#">خانه</a></li>
                            <li class="breadcrumb-item active">فرم‌های عمومی</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary" style="height: 100%">
                            <div class="card-header">
                                <h3 class="card-title"> اطلاعات سفارش {{$orderDetails['id']}}</h3>
                            </div>

                            <!-- /.card-header -->
                            <!-- form start -->

                            <div class="card-body">
                                <div class="form-group">
                                    <label> شماره سفارش : </label>
                                    <label for="">{{$orderDetails['id']}}</label>
                                </div>
                                <div class="form-group">
                                    <label> تاریخ سفارش : </label>
                                    <label
                                        for="">{{date('Y-m-d h:i:s', strtotime($orderDetails['created_at']))}}</label>
                                </div>
                                <div class="form-group">
                                    <label> وضعیت سفارش : </label>
                                    <label for="">{{$orderDetails['order_status']}}</label>
                                </div>
                                <div class="form-group">
                                    <label> مجموع سفارش : </label>
                                    <label for="">{{$orderDetails['grand_total']}}</label>
                                </div>
                                <div class="form-group">
                                    <label>هزینه ارسال : </label>
                                    <label for="">تومان {{$orderDetails['shipping_charges']}}</label>
                                </div>
                                @if(!empty($orderDetails['coupon_code']))
                                    <div class="form-group">
                                        <label> کد کوپن : </label>
                                        <label for="">{{$orderDetails['coupon_code']}}</label>
                                    </div>
                                    <div class="form-group">
                                        <label> مقدار کوپن : </label>
                                        <label for="">تومان {{$orderDetails['coupon_amount']}}</label>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label> طریقه پرداخت : </label>
                                    <label for="">{{$orderDetails['payment_method']}}</label>
                                </div>
                                <div class="form-group">
                                    <label> خروجی پرداخت : </label>
                                    <label for="">{{$orderDetails['payment_gateway']}}</label>
                                </div>


                            </div>
                            <!-- /.card-body -->

                        </div>
                        <!-- /.card -->

                        <!-- Form Element sizes -->

                        <!-- /.card -->

                    </div>
                    <!--/.col (left) -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary" style="height: 100%">
                            <div class="card-header">
                                <h3 class="card-title">اطلاعات مشتری</h3>
                            </div>
                            <div class="card-body">

                                <div class="form-group">
                                    <label> نام : </label>
                                    <label for="">{{$userDetails['name']}}</label>
                                </div>
                                @if(!empty($userDetails['address']))
                                    <div class="form-group">
                                        <label> آدرس : </label>
                                        <label for="">{{$userDetails['address']}}</label>
                                    </div>
                                @endif
                                @if(!empty($userDetails['city']))
                                    <div class="form-group">
                                        <label> شهر : </label>
                                        <label for="">{{$userDetails['city']}}</label>
                                    </div>
                                @endif
                                @if(!empty($userDetails['state']))
                                    <div class="form-group">
                                        <label> استان : </label>
                                        <label for="">{{$userDetails['state']}}</label>
                                    </div>
                                @endif
                                @if(!empty($userDetails['country']))
                                    <div class="form-group">
                                        <label> کشور : </label>
                                        <label for="">{{$userDetails['country']}}</label>
                                    </div>
                                @endif
                                @if(!empty($userDetails['pincode']))
                                    <div class="form-group">
                                        <label> پین کد : </label>
                                        <label for="">{{$userDetails['pincode']}}</label>
                                    </div>
                                @endif
                                @if(!empty($userDetails['mobile']))
                                    <div class="form-group">
                                        <label> موبایل : </label>
                                        <label for="">{{$userDetails['mobile']}}</label>
                                    </div>
                                @endif
                                @if(!empty($userDetails['email']))
                                    <div class="form-group">
                                        <label> ایمیل : </label>
                                        <label for="">{{$userDetails['email']}}</label>
                                    </div>
                                @endif

                            </div>
                            <!-- /.card-body -->

                        </div>
                    </div>
                    <!-- /.card -->

                    <!-- Form Element sizes -->

                    <!-- /.card -->

                </div>
                <!-- right column -->

                <!--/.col (right) -->
            </div>
            <div class="row" style="margin-top: 50px">
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">اطلاعات ارسال محصول</h3>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label> نام : </label>
                                <label for="">{{$orderDetails['name']}}</label>
                            </div>
                            @if(!empty($orderDetails['address']))
                                <div class="form-group">
                                    <label> آدرس : </label>
                                    <label for="">{{$orderDetails['address']}}</label>
                                </div>
                            @endif
                            @if(!empty($orderDetails['city']))
                                <div class="form-group">
                                    <label> شهر : </label>
                                    <label for="">{{$orderDetails['city']}}</label>
                                </div>
                            @endif
                            @if(!empty($orderDetails['state']))
                                <div class="form-group">
                                    <label> استان : </label>
                                    <label for="">{{$orderDetails['state']}}</label>
                                </div>
                            @endif
                            @if(!empty($orderDetails['country']))
                                <div class="form-group">
                                    <label> کشور : </label>
                                    <label for="">{{$orderDetails['country']}}</label>
                                </div>
                            @endif
                            @if(!empty($orderDetails['pincode']))
                                <div class="form-group">
                                    <label> پین کد : </label>
                                    <label for="">{{$orderDetails['pincode']}}</label>
                                </div>
                            @endif
                            @if(!empty($orderDetails['mobile']))
                                <div class="form-group">
                                    <label> موبایل : </label>
                                    <label for="">{{$orderDetails['mobile']}}</label>
                                </div>
                            @endif


                        </div>

                    </div>


                </div>
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">بروزرسانی وضعیت سفارش</h3>
                        </div>
                        <div class="card-body">
                            @if(Auth::guard('admin')->user()->type!="vendor")
                                <form action="{{url('admin/update-order-status')}}" method="post">
                                    <input type="hidden" name="order_id" value="{{$orderDetails['id']}}">
                                    @csrf
                                    <select name="order_status" id="order_status" required>
                                        <option value="">Select</option>
                                        @foreach($orderStatuses as $status)
                                            <option value="{{$status['name']}}"
                                                    @if(!empty($orderDetails['order_status']) && $orderDetails['order_status']==$status['name']) selected @endif >{{$status['name']}}</option>
                                        @endforeach
                                    </select>
                                    <input type="text" name="courier_name" id="courier_name" placeholder="Courier Name">
                                    <input type="text" name="tracking_number" id="tracking_number"
                                           placeholder="tracking_number">

                                    <button type="submit">بروزرسانی</button>
                                </form>
                                <br>
                                @foreach($orderLog as $key=>$log)

                                    {{-- <?php echo "<pre>"; print_r($log['orders_products'][$key]);die;?>--}}
                                    <strong>{{$log['order_status']}}</strong><br>

                                        @if(isset($log['order_item_id']) && $log['order_item_id']>0)

                                        @php $getItemDetails=OrdersLogs::getItemDetails($log['order_item_id']) @endphp

                                            -for item {{$getItemDetails['product_code']}}
                                            @if(!empty($getItemDetails['courier_name']))
                                                <br><span>Courier Name : {{$getItemDetails['courier_name']}} </span>
                                            @endif
                                            @if(!empty($getItemDetails[$key]['tracking_number']))
                                                <br><span>Tracking Number : {{$getItemDetails['tracking_number']}} </span>
                                            @endif
                                    @endif
                                    <br> {{date('Y-m-d h:i:s', strtotime($log['created_at']))}}
                                    <hr>
                                @endforeach
                            @else
                                This feature is restricted.

                            @endif
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
            <div class="row" style="margin-top: 50px">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">اطلاعات محصولات سفارش داده شده</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-borderless">
                                <tr class="table-primary">
                                    <th>عکس </th>
                                    <th>کد </th>
                                    <th>نام </th>
                                    <th>سایز </th>
                                    <th>رنگ </th>
                                    <th>قیمت </th>
                                    <th>تعداد </th>
                                    <th> مجموع قیمت</th>
                                    @if(Auth::guard('admin')->user()->type=="vendor")
                                    <th>  کمیسیون</th>
                                    <th>  سهم فروشنده</th>
                                    @endif

                                    <th>وضعیت </th>
                                </tr>
                                @foreach($orderDetails['orders_products'] as $product)
                                    <tr>
                                        <td>
                                            @php $getProductImage=Product::getProductImage($product['product_id']); @endphp
                                            <a target="_blank" href="{{url('product/'.$product['product_id'])}}"> <img
                                                    alt="" style="width: 80px"
                                                    src="{{asset('front/images/product_images/small/'.$getProductImage)}}"></a>
                                        </td>
                                        <td>{{$product['product_code']}}</td>
                                        <td>{{$product['product_name']}}</td>
                                        <td>{{$product['product_size']}}</td>
                                        <td>{{$product['product_color']}}</td>
                                        <td>{{$product['product_price']}}</td>
                                        <td>{{$product['product_qty']}}</td>
                                        <td>{{$total_price=$product['product_qty']*$product['product_price']}}</td>
                                        @if(Auth::guard('admin')->user()->type=="vendor")

                                        <td>{{$commission=round($total_price*$getVendorCommission/100,2)}}</td>

                                        <td>{{$total_price-$commission}}</td>
                                        @endif
                                        <td>
                                            <form action="{{url('admin/update-order-item-status')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="order_item_id" value="{{$product['id']}}">

                                                <select name="order_item_status" id="order_item_status" required>
                                                    <option value="">Select</option>
                                                    @foreach($orderItemStatuses as $status)

                                                        <option value="{{$status['name']}}"
                                                                @if(!empty($product['item_status']) && $product['item_status']==$status['name']) selected @endif >{{$status['name']}}</option>

                                                    @endforeach
                                                </select>
                                                <input style="width: 110px" type="text" name="item_courier_name"
                                                       id="item_courier_name" placeholder="Courier Name"
                                                       @if($product['courier_name']) value="{{$product['courier_name']}}" @endif >
                                                <input style="width: 110px" type="text" name="item_tracking_number"
                                                       id="item_tracking_number" placeholder="tracking_number"
                                                       @if($product['tracking_number']) value="{{$product['tracking_number']}}" @endif >
                                                <button type="submit">بروزرسانی</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->

        </section>
        <!-- /.content -->
    </div>
@endsection
