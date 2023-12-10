@extends('admin.layout.layout')
@section('content')
    <div class="content-wrapper" style="min-height: 805px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> تنظیمات مربوط به فروشنده  </h1>
                        <a href="{{url('admin/admins/vendor')}}">
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
                            <div class="card card-primary"  style="height: 100%">
                                <div class="card-header">
                                    <h3 class="card-title">اطلاعات  فروشنده</h3>
                                </div>

                            <!-- /.card-header -->
                                <!-- form start -->

                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="vendor_email">آدرس ایمیل فروشنده</label>
                                            <input type="vendor_email" class="form-control" id="vendor_email" placeholder=""
                                                   value="{{$vendorDetails['vendor_personal']['email']}}" name="vendor_email" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="vendor_name">نام</label>
<!--                                            <input type="text" class="form-control" id="vendor_name" placeholder=""
                                                   value="{{Auth::guard('admin')->user()->name}}" name="vendor_name" readonly="">-->
                                            <input type="text" class="form-control" id="vendor_name" placeholder=""
                                                   value="{{$vendorDetails['vendor_personal']['name']}}" name="vendor_name" readonly="">
                                        </div>
                                        <div class="form-group">
                                            <label for="vendor_address">آدرس</label>
                                            <input type="text" class="form-control" id="vendor_address" placeholder=""
                                                   value="{{$vendorDetails['vendor_personal']['address']}}" name="vendor_address" readonly="">
                                        </div>
                                        <div class="form-group">
                                            <label for="vendor_city">شهر</label>
                                            <input type="text" class="form-control" id="vendor_city" placeholder=""
                                                   value="{{$vendorDetails['vendor_personal']['city']}}" name="vendor_city" readonly="">
                                        </div>
                                        <div class="form-group">
                                            <label for="vendor_state">استان</label>
                                            <input type="text" class="form-control" id="vendor_state" placeholder=""
                                                   value="{{$vendorDetails['vendor_personal']['state']}}" name="vendor_state" readonly="">
                                        </div>
                                        <div class="form-group">
                                            <label for="vendor_country">کشور</label>
                                            <input type="text" class="form-control" id="vendor_country" placeholder=""
                                                   value="{{$vendorDetails['vendor_personal']['country']}}" name="vendor_country" readonly="">
                                        </div>
                                        <div class="form-group">
                                            <label for="vendor_pincode">کدملی</label>
                                            <input type="text" class="form-control" id="vendor_pincode" placeholder=""
                                                   value="{{$vendorDetails['vendor_personal']['pincode']}}" name="vendor_pincode" readonly="">
                                        </div>
                                        <div class="form-group">
                                            <label for="vendor_mobile">موبایل</label>
                                            <input type="text" class="form-control" id="vendor_mobile" placeholder=""
                                                   value="{{$vendorDetails['vendor_personal']['mobile']}}" name="vendor_mobile" readonly="">
                                        </div>


                                        <div class="form-group">
                                            <label for="vendor_image">عکس</label>
                                            @if(!empty($vendorDetails['image']))
                                                <br>
                                                <img class="rounded-circle" alt="Cinque Terre" width="100" height="100" src="{{url('admin/images/photos/'.$vendorDetails['image'])}}">

                                            @endif
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
                                    <h3 class="card-title">اطلاعات شغلی فروشنده</h3>
                                </div>

                                <!-- /.card-header -->
                                <!-- form start -->

                                <div class="card-body">


                                    <div class="form-group">
                                        <label for="vendor_name">نام محل کسب</label>
<!--                                        <input type="text" class="form-control" id="vendor_name" placeholder=""
                                               value="{{Auth::guard('admin')->user()->name}}" name="vendor_name" readonly="">-->
                                        <input type="text" class="form-control" id="vendor_name" placeholder=""
                                               @if(isset($vendorDetails['shop_name'])) value="{{$vendorDetails['shop_name']}}" @endif    name="vendor_name" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label for="vendor_address">آدرس محل کسب</label>
                                        <input type="text" class="form-control" id="vendor_address" placeholder=""
                                               @if(isset($vendorDetails['vendor_business']['shop_address'])) value="{{$vendorDetails['vendor_business']['shop_address']}}" @endif      name="vendor_address" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label for="vendor_city">شهر محل کسب</label>
                                        <input type="text" class="form-control" id="vendor_city" placeholder=""
                                               @if(isset($vendorDetails['vendor_business']['shop_city'])) value="{{$vendorDetails['vendor_business']['shop_city']}}" @endif       name="vendor_city" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label for="vendor_state">  استان محل کسب</label>
                                        <input type="text" class="form-control" id="vendor_state" placeholder=""
                                               @if(isset($vendorDetails['vendor_business']['shop_state'])) value="{{$vendorDetails['vendor_business']['shop_state']}}" @endif        name="vendor_state" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label for="vendor_country">کشور محل کسب</label>
                                        <input type="text" class="form-control" id="vendor_country" placeholder=""
                                               @if(isset($vendorDetails['vendor_business']['shop_country'])) value="{{$vendorDetails['vendor_business']['shop_country']}}" @endif     name="vendor_country" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label for="vendor_pincode">کد اقتصادی</label>
                                        <input type="text" class="form-control" id="vendor_pincode" placeholder=""
                                               @if(isset($vendorDetails['vendor_business']['shop_pincode'])) value="{{$vendorDetails['vendor_business']['shop_pincode']}}" @endif     name="vendor_pincode" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label for="vendor_mobile">شماره محل کار</label>
                                        <input type="text" class="form-control" id="vendor_mobile" placeholder=""
                                               @if(isset($vendorDetails['vendor_business']['shop_mobile'])) value="{{$vendorDetails['vendor_business']['shop_mobile']}}" @endif      name="vendor_mobile" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label for="vendor_email">وب سایت فروشگاه</label>
                                        <input type="vendor_email" class="form-control" id="vendor_email" placeholder=""
                                               @if(isset($vendorDetails['vendor_business']['shop_website'])) value="{{$vendorDetails['vendor_business']['shop_website']}}" @endif     name="vendor_email" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="vendor_email">آدرس ایمیل فروشنده</label>
                                        <input type="vendor_email" class="form-control" id="vendor_email" placeholder=""
                                               @if(isset($vendorDetails['vendor_business']['shop_email'])) value="{{$vendorDetails['vendor_business']['shop_email']}}" @endif    name="vendor_email" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="vendor_email">آدرس کد پستی</label>
                                        <input type="vendor_email" class="form-control" id="vendor_email" placeholder=""
                                               @if(isset($vendorDetails['vendor_business']['address_proof'])) value="{{$vendorDetails['vendor_business']['address_proof']}}" @endif     name="vendor_email" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="vendor_image">عکس</label>
                                        @if(!empty($vendorDetails['vendor_business']['address_proof_image']))
                                            <br>
                                            <img class="rounded-circle" alt="Cinque Terre" width="100" height="100" src="{{url('admin/images/photos/'.$vendorDetails['image'])}}">

                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="vendor_email">کد گواهی شغلی</label>
                                        <input type="vendor_email" class="form-control" id="vendor_email" placeholder=""
                                               @if(isset($vendorDetails['vendor_business']['business_license_number'])) value="{{$vendorDetails['vendor_business']['business_license_number']}}" @endif    name="vendor_email" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="vendor_email">Gst Number</label>
                                        <input type="vendor_email" class="form-control" id="vendor_email" placeholder=""
                                               @if(isset($vendorDetails['vendor_business']['gst_number'])) value="{{$vendorDetails['vendor_business']['gst_number']}}" @endif   name="vendor_email" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="vendor_email">Pan Number</label>
                                        <input type="vendor_email" class="form-control" id="vendor_email" placeholder=""
                                               @if(isset($vendorDetails['vendor_business']['pan_number'])) value="{{$vendorDetails['vendor_business']['pan_number']}}" @endif   name="vendor_email" disabled>
                                    </div>

                                </div>
                                <!-- /.card-body -->

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
                                <h3 class="card-title">اطلاعات  بانکی فروشنده</h3>
                            </div>

                            <!-- /.card-header -->
                            <!-- form start -->

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="vendor_email">نام داردنده حساب</label>
                                    <input type="vendor_email" class="form-control" id="vendor_email" placeholder=""
                                           @if(isset($vendorDetails['vendor_business']['account_holder_name'])) value="{{$vendorDetails['vendor_business']['account_holder_name']}}" @endif     name="vendor_email" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="vendor_name">نام بانک</label>
                                    <input type="text" class="form-control" id="vendor_name" placeholder=""
                                           @if(isset($vendorDetails['vendor_business']['bank_name'])) value="{{$vendorDetails['vendor_business']['bank_name']}}" @endif     name="vendor_name" readonly="">
                                </div>
                                <div class="form-group">
                                    <label for="vendor_address">شماره حساب</label>
                                    <input type="text" class="form-control" id="vendor_address" placeholder=""
                                           @if(isset($vendorDetails['vendor_business']['account_number'])) value="{{$vendorDetails['vendor_business']['account_number']}}" @endif     name="vendor_address" readonly="">
                                </div>
                                <div class="form-group">
                                    <label for="vendor_city">کد بانک</label>
                                    <input type="text" class="form-control" id="vendor_city" placeholder=""
                                           @if(isset($vendorDetails['vendor_business']['bank_ifcs_code'])) value="{{$vendorDetails['vendor_business']['bank_ifcs_code']}}" @endif     name="vendor_city" readonly="">
                                </div>


                            </div>
                            <!-- /.card-body -->

                        </div>
                        <!-- /.card -->

                        <!-- Form Element sizes -->

                        <!-- /.card -->

                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
