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
                                <h3 class="card-title">{{$title}}</h3>
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
                            <form role="form"
                                   action="{{url('admin/edit-shipping-charges/'.$shippingDetails['id'])}}"
                                  method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="country">نام کشور</label>
                                        <input type="text" class="form-control"  placeholder=""
                                                value="{{$shippingDetails['country']}}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="0_500g">از وزن 0 تا 500 کیلو گرم</label>
                                        <input type="text" class="form-control" id="0_500g" placeholder="وارد کردن هزینه ارسال"
                                               value="{{$shippingDetails['0_500g']}}"
                                               name="0_500g">
                                    </div>
                                    <div class="form-group">
                                        <label for="501_1000g">از وزن 501 تا 1000 کیلو گرم</label>
                                        <input type="text" class="form-control" id="501_1000g" placeholder="وارد کردن هزینه ارسال"
                                               value="{{$shippingDetails['501_1000g']}}"
                                               name="501_1000g">
                                    </div>
                                    <div class="form-group">
                                        <label for="1001_2000g">از وزن 1001 تا 2000 کیلو گرم</label>
                                        <input type="text" class="form-control" id="1001_2000g" placeholder="وارد کردن هزینه ارسال"
                                               value="{{$shippingDetails['1001_2000g']}}"
                                               name="1001_2000g">
                                    </div>
                                    <div class="form-group">
                                        <label for="2001_5000g">از وزن 2001 تا 5000 کیلو گرم</label>
                                        <input type="text" class="form-control" id="2001_5000g" placeholder="وارد کردن هزینه ارسال"
                                               value="{{$shippingDetails['2001_5000g']}}"
                                               name="2001_5000g">
                                    </div>
                                    <div class="form-group">
                                        <label for="above_5000g">بیشتر از 5000 کیلو گرم</label>
                                        <input type="text" class="form-control" id="above_5000g" placeholder="وارد کردن هزینه ارسال"
                                               value="{{$shippingDetails['above_5000g']}}"
                                               name="above_5000g">
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
