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
                    <div class="col-md-8">
                        <!-- general form elements -->
                        <div class="card card-primary">

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

                                <div class="card">
                                    <div class="card-header">
                                        @if($title=='Admins')
                                            <h3 class="card-title"> مدیران ارشد</h3>
                                        @elseif($title=='Subadmins')
                                            <h3 class="card-title"> مدیران</h3>
                                        @elseif($title=='Vendors')
                                            <h3 class="card-title"> فروشندگان</h3>
                                        @elseif($title=='All')
                                            <h3 class="card-title"> کلیه مدیران</h3>
                                        @endif

                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <tbody><tr>
                                                <th style="width: 10px">کدادمین</th>
                                                <th>نام</th>
                                                <th>موبایل</th>
                                                <th>ایمیل</th>
                                                <th>عکس</th>
                                                <th>وضعیت</th>
                                                <th>جزئیات</th>
                                            </tr>
                                            @foreach($admins as $admin)
                                            <tr>

                                                <td>{{$admin['id']}}</td>
                                                <td>{{$admin['name']}}</td>
                                                <td>{{$admin['mobile']}}</td>
                                                <td>{{$admin['email']}}</td>
                                                <td>

                                                    <img class="rounded-circle" alt="Cinque Terre" width="100" height="100" src="{{asset('admin/images/photos/'.$admin['image'])}}" alt="User Image">

                                                <td>
                                                    @if($admin['status'] ==1)
                                                        <i id="item{{$admin['id']}}" ref="input" class="fa" :class="activeClass" v-on:click="changeStatus('item'+{{$admin['id']}})" style="font-size:24px"></i>
                                                    @else
                                                        <i id="item{{$admin['id']}}"  ref="input" class="fa" :class="deactiveClass" v-on:click="changeStatus('item'+{{$admin['id']}})" style="font-size:24px"></i>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($admin['type']=='vendor')
                                                    <a href="{{url('admin/view-vendor-details/'.$admin['id'])}}">
                                                        <i class="fa fa-file-archive-o" style="font-size:24px"></i>
                                                    </a>
                                                        @endif
                                                </td>

                                            </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer clearfix">
                                        <ul class="pagination pagination-sm m-0 float-right">
                                            <li class="page-item"><a class="page-link" href="#">«</a></li>
                                            <li class="page-item"><a class="page-link" href="#">۱</a></li>
                                            <li class="page-item"><a class="page-link" href="#">۲</a></li>
                                            <li class="page-item"><a class="page-link" href="#">۳</a></li>
                                            <li class="page-item"><a class="page-link" href="#">»</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /.card -->


                                <!-- /.card -->

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
