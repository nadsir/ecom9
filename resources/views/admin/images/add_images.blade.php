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
                                <h3 class="card-title">اضافه کردن تصاویر محصول</h3>
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
                            <form role="form"  action="{{url('admin/add-images/'.$product['id'])}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="category_name">نام محصول :</label>
                                        {{$product['product_name']}}
                                    </div>
                                    <div class="form-group">
                                        <label for="product_code">کد محصول :</label>
                                      {{$product['product_code']}}
                                    </div>
                                    <div class="form-group">
                                        <label for="product_color">رنگ محصول :</label>
                                       {{$product['product_color']}}
                                    </div>
                                    <div class="form-group">
                                        <label for="product_price">قیمت محصول :</label>
                                       {{$product['product_price']}}
                                    </div>
                                    <div class="form-group">
                                        <label for="product_discount"> (%) تخفیف محصول :</label>
                                       {{$product['product_discount']}}
                                    </div>
                                    <div class="form-group">
                                        <label for="product_weight">  وزن محصول :</label>
                                       {{$product['product_weight']}}
                                    </div>
                                    <div class="form-group">


                                        @if(!empty($product['product_image']))

                                            <img style="width: 120px" target="_blank"
                                                 src="{{url('front/images/product_images/small/'.$product['product_image'])}}">
                                        @else
                                            <img style="width: 120px" target="_blank"
                                                 src="{{url('front/images/product_images/small/no-image.png')}}">

                                        @endif
                                    </div>
                                    <div class="form-group">

                                        <div class="field_wrapper">
                                            <div class="form-group">
                                                <input type="file" name="images[]" multiple="" id="images">

                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">ارسال</button>
                                </div>
                            </form>
                            <div class="card-body">
                                <div id="example1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

                                    <div class="row">
                                        <label for="product_image"> عکس های محصول </label>


                                        <div class="col-sm-12">
                                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid">

                                                @csrf
                                                <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 250.367px;" aria-sort="ascending" aria-label="کد ادمین: activate to sort column descending">ردیف</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 446.8px;" aria-label="نام: activate to sort column ascending">  کد محصول</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 446.8px;" aria-label="نام: activate to sort column ascending">  عکس محصول</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 446.8px;" aria-label="وضعیت: activate to sort column ascending">وضعیت</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 446.8px;" aria-label="وضعیت: activate to sort column ascending">جزئیات</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php($i=1)
                                                @foreach($product['images'] as $image)


                                                    <tr>

                                                        <td>{{$i}}</td>
                                                        <td>{{$image['id']}}</td>
                                                        <td>
                                                            <img style="width: 100px" src="{{url('front/images/product_images/small/'.$image['image'])}}" alt="">
                                                        </td>

                                                        <td>
                                                            @if($image['status'] ==1)
                                                                <i status="Active" image-id="{{$image['id']}}" id="image-{{$image['id']}}"  ref="input" class=" fa" :class="activeClass" v-on:click="changeImageStatus('image-'+{{$image['id']}})" style="font-size:24px"></i>
                                                            @else
                                                                <i status="Deactive" image-id="{{$image['id']}}" id="image-{{$image['id']}}"  ref="input" class=" fa" :class="deactiveClass" v-on:click="changeImagetStatus('image-'+{{$image['id']}})" style="font-size:24px"></i>
                                                            @endif
                                                        </td>

                                                        <td>


                                                            <a module="image" moduleid="{{$image['id']}}"  href="javascript:void(0)" title="image" id="delete-{{$image['id']}}" v-on:click="confirmDelete('delete-'+{{$image['id']}})" style="padding: 10px">
                                                                <i class="fa fa-trash-o" style="font-size:24px;color:red"></i>
                                                            </a>

                                                        </td>


                                                    </tr>
                                                    @php($i++)
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <!--                                                    <tr>
                                                                                                        <th rowspan="1" colspan="1">موتور رندر</th>
                                                                                                        <th rowspan="1" colspan="1">مرورگر</th>
                                                                                                        <th rowspan="1" colspan="1">سیستم عامل</th>
                                                                                                        <th rowspan="1" colspan="1">ورژن</th>

                                                                                                    </tr>-->
                                                </tfoot>


                                            </table>


                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->



                                <!-- /.card -->


                                <!-- /.card -->

                            </div>
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

