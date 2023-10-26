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
                                <h3 class="card-title">بروز رسانی پروفایل ادمین</h3>
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
                            <form role="form" action="{{url('admin/update-admin-details')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="admin_email">آدرس ایمیل</label>
                                        <input type="admin_email" class="form-control" id="admin_email" placeholder=""
                                               value="{{Auth::guard('admin')->user()->email}}" name="admin_email"
                                               disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="admin_type">نوع کاربری</label>
                                        <input type="text" class="form-control" id="admin_type" placeholder=""
                                               value="{{Auth::guard('admin')->user()->type}}" name="admin_type"
                                               disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="admin_name">نام</label>
                                        <input type="text" class="form-control" id="admin_name" placeholder=""
                                               value="{{Auth::guard('admin')->user()->name}}" name="admin_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="admin_mobile">موبایل</label>
                                        <input type="text" class="form-control" id="admin_mobile" placeholder=""
                                               value="{{Auth::guard('admin')->user()->mobile}}" name="admin_mobile"
                                               maxlength="12" minlength="10">
                                    </div>

                                    <div class="form-group">
                                        <label for="admin-image">ارسال فایل</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="admin_image"
                                                       name="admin_image">
                                                <label class="custom-file-label" for="admin_image">انتخاب فایل</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="">Upload</span>
                                            </div>
                                        </div>
                                        @if(!empty(Auth::guard('admin')->user()->image))
                                            <a href="{{url('admin/images/photos/'.Auth::guard('admin')->user()->image)}}">
                                                مشاهده عکس کنونی
                                            </a>
                                            <input type="hidden" name="current_admin_image" value="{{Auth::guard('admin')->user()->image}}">

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
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
