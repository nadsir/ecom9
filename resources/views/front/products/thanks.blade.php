<?php
use App\Models\Product;
?>
@extends('front.layout.layouts')
@section('content')
    <!-- Page Introduction Wrapper -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">

            </div>
        </div>
    </div>
    <!-- Page Introduction Wrapper /- -->
    <!-- Cart-Page -->
    <div class="page-cart u-s-p-t-80">
        <div class="container">

            <div class="row">

                <div class="col-lg-12" align="center" style="font-family: 'B Yekan';direction: rtl;text-align: center">
                    <h3>سفارش شما با موفقیت به ثبت رسید</h3>
                    <h3>با تشکر از خرید شما</h3>
                    <P>شماره سفارش شما {{Session::get('order_id')}} و مبلغ نهایی پرداخت{{Session::get('grand_total')}}تومان می باشد  </P>
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
