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
                                <h3 class="card-title">بروز رسانی پسورد</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputUsername">نام کاربری</label>
                                        <input type="text" class="form-control" id="exampleInputUsername" placeholder="" disabled value="{{$adminDetails['type']}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">آدرس ایمیل</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="" disabled value="{{$adminDetails['email']}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="current_password">پسورد قبلی</label>
                                        <input type="password" class="form-control" id="current_password" placeholder="پسورد قبلی" name="current_password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="new_password">پسورد جدید</label>
                                        <input type="password" class="form-control" id="new_password" placeholder="پسورد جدید" name="new_password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm_password">تایید پسورد جدید</label>
                                        <input type="password" class="form-control" id="confirm_password" placeholder="تایید پسورد جدید" name="confirm_password" required>
                                    </div>
<!--                                    <div class="form-group">
                                        <label for="exampleInputFile">ارسال فایل</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">انتخاب فایل</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="">Upload</span>
                                            </div>
                                        </div>
                                    </div>-->
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">مرا بخاطر بسپار</label>
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
