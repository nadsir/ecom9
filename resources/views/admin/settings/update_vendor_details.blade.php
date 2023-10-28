@extends('admin.layout.layout')
@section('content')
    <div class="content-wrapper" style="min-height: 805px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>تنظیمات مربوط به فروشنده</h1>
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
                @if($slug=="personal")
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">بروز رسانی اطلاعات شخصی فروشنده</h3>
                                </div>
                                @if(Session::has('error_message'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>پیام خطا !</strong>
                                        {{Session::get('error_message')}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                @if(Session::has('success_message'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>پیام پذیرش !</strong>
                                        {{Session::get('success_message')}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                @if($errors->any())
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                {{$error}}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endforeach
                                    </ul>
                            @endif
                            <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form" action="{{url('admin/update-vendor-details/personal')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="vendor_email">آدرس ایمیل فروشنده</label>
                                            <input type="vendor_email" class="form-control" id="vendor_email" placeholder=""
                                                   value="{{Auth::guard('admin')->user()->email}}" name="vendor_email" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="vendor_name">نام</label>
                                            <input type="text" class="form-control" id="vendor_name" placeholder=""
                                                   value="{{Auth::guard('admin')->user()->name}}" name="vendor_name">
                                        </div>
                                        <div class="form-group">
                                            <label for="vendor_address">آدرس</label>
                                            <input type="text" class="form-control" id="vendor_address" placeholder=""
                                                   value="{{$vendorDetails['address']}}" name="vendor_address">
                                        </div>
                                        <div class="form-group">
                                            <label for="vendor_city">شهر</label>
                                            <input type="text" class="form-control" id="vendor_city" placeholder=""
                                                   value="{{$vendorDetails['city']}}" name="vendor_city">
                                        </div>
                                        <div class="form-group">
                                            <label for="vendor_state">استان</label>
                                            <input type="text" class="form-control" id="vendor_state" placeholder=""
                                                   value="{{$vendorDetails['state']}}" name="vendor_state">
                                        </div>
                                        <div class="form-group">
                                            <label for="vendor_country">کشور</label>
                                            <input type="text" class="form-control" id="vendor_country" placeholder=""
                                                   value="{{$vendorDetails['country']}}" name="vendor_country">
                                        </div>
                                        <div class="form-group">
                                            <label for="vendor_pincode">پین کد</label>
                                            <input type="text" class="form-control" id="vendor_pincode" placeholder=""
                                                   value="{{$vendorDetails['pincode']}}" name="vendor_pincode">
                                        </div>
                                        <div class="form-group">
                                            <label for="vendor_mobile">موبایل</label>
                                            <input type="text" class="form-control" id="vendor_mobile" placeholder=""
                                                   value="{{$vendorDetails['mobile']}}" name="vendor_mobile">
                                        </div>


                                        <div class="form-group">
                                            <label for="vendor_image">ارسال فایل</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="vendor_image"
                                                           name="vendor_image">
                                                    <label class="custom-file-label" for="vendor_image">انتخاب فایل</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="">Upload</span>
                                                </div>
                                            </div>
                                            @if(!empty(Auth::guard('admin')->user()->image))
                                                <a href="{{url('admin/images/photos/'.Auth::guard('admin')->user()->image)}}">
                                                    مشاهده عکس کنونی
                                                </a>
                                                <input type="hidden" name="current_vendor_image" value="{{Auth::guard('admin')->user()->image}}">

                                            @endif
                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">ارسال</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->

                            <!-- Form Element sizes -->

                            <!-- /.card -->

                        </div>
                        <!--/.col (left) -->
                        <!-- right column -->

                        <!--/.col (right) -->
                    </div>
                @elseif($slug=="business")
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">بروز رسانی اطلاعات شغلی فروشنده</h3>
                                </div>
                                @if(Session::has('error_message'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>پیام خطا !</strong>
                                        {{Session::get('error_message')}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                @if(Session::has('success_message'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>پیام پذیرش !</strong>
                                        {{Session::get('success_message')}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                @if($errors->any())
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                {{$error}}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endforeach
                                    </ul>
                            @endif
                            <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form" action="{{url('admin/update-vendor-details/business')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="vendor_email">آدرس ایمیل فروشنده</label>
                                            <input type="vendor_email" class="form-control" id="vendor_email" placeholder=""
                                                   value="{{Auth::guard('admin')->user()->email}}" name="vendor_email" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="shop_name">نام</label>
                                            <input type="text" class="form-control" id="shop_name" placeholder=""
                                                   value="{{$vendorDetails['shop_name']}}" name="shop_name">
                                        </div>
                                        <div class="form-group">
                                            <label for="shop_address">آدرس محل کسب</label>
                                            <input type="text" class="form-control" id="shop_address" placeholder=""
                                                   value="{{$vendorDetails['shop_address']}}" name="shop_address">
                                        </div>
                                        <div class="form-group">
                                            <label for="shop_city"> شهر محل کسب</label>
                                            <input type="text" class="form-control" id="shop_city" placeholder=""
                                                   value="{{$vendorDetails['shop_city']}}" name="shop_city">
                                        </div>
                                        <div class="form-group">
                                            <label for="shop_state">استان محل کسب</label>
                                            <input type="text" class="form-control" id="shop_state" placeholder=""
                                                   value="{{$vendorDetails['shop_state']}}" name="shop_state">
                                        </div>
                                        <div class="form-group">
                                            <label for="shop_country">کشور محل کسب</label>
                                            <input type="text" class="form-control" id="shop_country" placeholder=""
                                                   value="{{$vendorDetails['shop_country']}}" name="shop_country">
                                        </div>
                                        <div class="form-group">
                                            <label for="shop_pincode">پین کد کسب وکار</label>
                                            <input type="text" class="form-control" id="shop_pincode" placeholder=""
                                                   value="{{$vendorDetails['shop_pincode']}}" name="shop_pincode">
                                        </div>
                                        <div class="form-group">
                                            <label for="shop_mobile">موبایل مربوط به کسب و کار</label>
                                            <input type="text" class="form-control" id="shop_mobile" placeholder=""
                                                   value="{{$vendorDetails['shop_mobile']}}" name="shop_mobile" maxlength="12" minlength="10">
                                        </div>
                                        <div class="form-group">
                                            <label for="business_license_number">کد گواهی شغلی</label>
                                            <input type="text" class="form-control" id="business_license_number" placeholder=""
                                                   value="{{$vendorDetails['business_license_number']}}" name="business_license_number">
                                        </div>
                                        <div class="form-group">
                                            <label for="gst_number">Gst Number</label>
                                            <input type="text" class="form-control" id="gst_number" placeholder=""
                                                   value="{{$vendorDetails['gst_number']}}" name="gst_number">
                                        </div>
                                        <div class="form-group">
                                            <label for="pan_number">Pan Number</label>
                                            <input type="text" class="form-control" id="pan_number" placeholder=""
                                                   value="{{$vendorDetails['pan_number']}}" name="pan_number">
                                        </div>
                                        <div class="form-group">
                                            <label for="address_proof">نوع احراز هویت</label>
                                            <select class="form-control" name="address_proof" id="address_proof">
                                                <option value="passport" @if($vendorDetails['address_proof']=='passport') selected @endif>پاسپورت</option>
                                                <option value="Meli Card" @if($vendorDetails['address_proof']=='Meli Card') selected @endif>کارت ملی</option>
                                                <option value="PAN" @if($vendorDetails['address_proof']=='PAN') selected @endif>شناسنامه</option>
                                                <option value="Driving License" @if($vendorDetails['address_proof']=='Driving License') selected @endif>گواهینامه رانندگی</option>
                                                <option value="Military service" @if($vendorDetails['address_proof']=='Military service') selected @endif>کارت پایان خدمت</option>

                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label for="address_proof_image">ارسال فایل احراز هویت</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="address_proof_image"
                                                           name="address_proof_image">
                                                    <label class="custom-file-label" for="vendor_image">انتخاب فایل</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="">Upload</span>
                                                </div>
                                            </div>
                                            @if(!empty($vendorDetails['address_proof_image']))
                                                <a href="{{url('admin/images/proof/'.$vendorDetails['address_proof_image'])}}">
                                                    مشاهده عکس کنونی
                                                </a>
                                                <input type="hidden" name="current_address_proof" value="{{$vendorDetails['address_proof_image']}}">

                                            @endif
                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">ارسال</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->

                            <!-- Form Element sizes -->

                            <!-- /.card -->

                        </div>
                        <!--/.col (left) -->
                        <!-- right column -->

                        <!--/.col (right) -->
                    </div>
                @elseif($slug=="bank")

                @endif

                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
