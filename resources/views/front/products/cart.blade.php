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
                    <h2 style="text-align: center">کارت</h2>
                    <ul class="bread-crumb" style="text-align: center" >
                        <li class="has-separator">
                            <i class="ion ion-md-home"></i>
                            <a href="index.html">صفحه اصلی</a>
                        </li>
                        <li class="is-marked" >
                            <a  href="cart.html">کارت</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>



    <!-- Page Introduction Wrapper /- -->
    <!-- Cart-Page -->
    <div class="page-cart u-s-p-t-80" style="direction: rtl;text-align: right;font-family: 'B Yekan'">
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
            @if(Session::has('success_message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>پیام پذیرش !</strong>
                    <?php echo Session::get('success_message'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="row">

                <div class="col-lg-12">
                    <div id="appendCartItems">
                        @include('front.products.cart_items')
                    </div>
                    <!-- Coupon -->
                    <div class="coupon-continue-checkout u-s-m-b-60">
                        <div class="coupon-area">
                            <h6>در صورت داشتن کوپن خرید کد را وارد کنید .</h6>
                            <div class="calculation u-s-m-b-60" style="border-radius: 6px 6px 6px 6px;
-moz-border-radius: 6px 6px 6px 6px;
-webkit-border-radius: 6px 6px 6px 6px;
border: 1px solid #fdb414;">
                                <form id="ApplyCoupon" method="post" action="javascript:void(0);" @if(Auth::check()) user="1" @endif>
                                    @csrf
                                    <label class="sr-only" for="coupon-code">Apply Coupon</label>
                                    <input id="code" name="code" type="text" class="text-field" placeholder="کد کوپن">
                                    <button type="submit" class="button" style="background-color: #fdb414;
    width: 100%;
    border: none!important;
    -webkit-box-shadow: 4px 4px 16px -6px rgba(0,0,0,0.75);
    -moz-box-shadow: 4px 4px 16px -6px rgba(0,0,0,0.75);
    box-shadow: 4px 4px 16px -6px rgba(0,0,0,0.75);margin-top: 10px">اعمال کوپن </button>
                                </form>
                            </div>
                        </div>
                        <div class="button-area u-s-m-b-60" style="text-align: center;    text-align: center;
    display: flex;
    margin-top: 50px;
    justify-content: space-between">
                            <div>
                                <a href="{{url('/')}}" class="continue" style="background-color: #fdb414;
    width: 100%;
    border: none!important;
    -webkit-box-shadow: 4px 4px 16px -6px rgba(0,0,0,0.75);
    -moz-box-shadow: 4px 4px 16px -6px rgba(0,0,0,0.75);
    box-shadow: 4px 4px 16px -6px rgba(0,0,0,0.75);">ادامه خرید</a>
                            </div>
                            <div>
                                <a href="{{url('/checkout')}}" class="continue" style="background-color: #fdb414;
    width: 100%;
    border: none!important;
    -webkit-box-shadow: 4px 4px 16px -6px rgba(0,0,0,0.75);
    -moz-box-shadow: 4px 4px 16px -6px rgba(0,0,0,0.75);
    box-shadow: 4px 4px 16px -6px rgba(0,0,0,0.75);">انتقال به صفحه پرداخت</a>
                            </div>


                        </div>
                    </div>
                    <!-- Coupon /- -->

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
