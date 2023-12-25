@extends('admin.layout.layout')
@section('content')
    <div class="content-wrapper" style="min-height: 805px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>تنظیمات</h1>
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
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">اضافه کردن کوپن</h3>
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
                            <br>
                        <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" @if(empty($coupon['id'])) action="{{url('admin/add-edit-coupon')}}"
                                  @else action="{{url('admin/add-edit-coupon/'.$coupon['id'])}}" @endif
                                  method="post" enctype="multipart/form-data">
                                @csrf


                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="coupon_option">انتخاب کوپن</label><br>
                                        <span><input id="AutomaticCoupon" type="radio" name="coupon_option" value="Automatic" > &nbsp;Automatic &nbsp;&nbsp;</span>
                                        <span><input id="ManualCoupon" type="radio" name="coupon_option" value="Manual" checked=""> &nbsp;Manual &nbsp;&nbsp;</span>
                                    </div>

                                    <div class="form-group" style="display: none" id="couponField">
                                        <label for="coupon_code">کد کوپن</label>

                                        <input type="text" class="form-control" id="coupon_code" placeholder="" name="coupon_code">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="coupon_type">نوع کوپن</label><br>
                                        <span><input  type="radio" name="coupon_type" value="Multiple Times" > &nbsp;اعمال چند بار &nbsp;&nbsp;</span>
                                        <span><input  type="radio" name="coupon_type" value="Single Times" checked=""> &nbsp;اعمال یکبار &nbsp;&nbsp;</span>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="amount_type">نوع تخفیف کوپن</label><br>
                                        <span><input  type="radio" name="amount_type" value="Percentage" > &nbsp;درصد &nbsp;&nbsp;</span>
                                        <span><input  type="radio" name="amount_type" value="ّّFixed" checked=""> &nbsp;به تومان &nbsp;&nbsp;</span>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="category_name">مقدار</label>
                                        <input type="text" class="form-control" id="coupon_name" placeholder="" name="coupon_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="category_id">انتخاب دسته بندی</label>
                                        <select  name="category_id[]"  class="form-control" multiple>
                                            @foreach($categories as $section)
                                                <optgroup label="{{$section['name']}}" style="background-color: #c5c5c5"></optgroup>
                                                <hr>
                                                @foreach($section['categories'] as $category)
                                                    <option value="{{$category['id']}}">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;&nbsp;
                                                        {{$category['category_name']}}
                                                    </option>
                                                    @foreach($category['subcategories'] as $subcategory)
                                                        <option value="{{$subcategory['id']}}">
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;
                                                            {{$subcategory['category_name']}}
                                                        </option>
                                                    @endforeach
                                                @endforeach
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="brand">انتخاب برند</label>
                                        <select  name="brand[]"  class="form-control" multiple>
                                            <option value="">انتخاب بخش</option>
                                            @foreach($brandss as $brands)
                                                <option value="{{$brands['id']}}">{{$brands['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="users">انتخاب کاربر</label>
                                        <select  name="users[]" class="form-control" multiple>
                                            <option value="">انتخاب بخش</option>
                                            @foreach($users as $user)
                                                <option value="{{$user['email']}}}">{{$user['email']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="expire_date">تاریخ انقضا</label>
                                        <input type="date" class="form-control" id="expire_date" placeholder="" name="expire_date">
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
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
<script>

</script>
