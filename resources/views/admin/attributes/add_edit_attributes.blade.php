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
                                <h3 class="card-title">اضافه کردن ویژگی های محصول</h3>
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
                            <form role="form"  action="{{url('admin/add-attributes/'.$product['id'])}}" method="post" enctype="multipart/form-data">
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
                                                <input  type="text" name="size[]" placeholder="سایز" style="width: 120px;" required/>&nbsp;
                                                <input type="text" name="sku[]" placeholder="کد محصول" style="width: 120px;" required/>&nbsp;
                                                <input type="text" name="price[]" placeholder="قیمت محصول" style="width: 120px;" required/>&nbsp;
                                                <input type="text" name="stock[]" placeholder="تعداد محصول" style="width: 120px;" required/>&nbsp;&nbsp;&nbsp;
                                                <a href="javascript:void(0);" class="add_button" title="Add attributes"><i class="fa fa-plus"></i></a>
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
                                        <label for="product_image"> ویژگی های محصول </label>


                                        <div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid">
                                                <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 250.367px;" aria-sort="ascending" aria-label="کد ادمین: activate to sort column descending">ردیف</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 446.8px;" aria-label="نام: activate to sort column ascending">  کد محصول</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 446.8px;" aria-label="نام: activate to sort column ascending">  سایز محصول</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 446.8px;" aria-label="نام: activate to sort column ascending">کد محصول</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 446.8px;" aria-label="نام: activate to sort column ascending">قیمت محصول</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 446.8px;" aria-label="نام: activate to sort column ascending">تعداد محصول</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 446.8px;" aria-label="وضعیت: activate to sort column ascending">وضعیت</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php($i=1)
                                                @foreach($product['attributes'] as $attribute)

                                                    <tr>

                                                        <td>{{$i}}</td>
                                                        <td>{{$attribute['id']}}</td>
                                                        <td>{{$attribute['size']}}</td>
                                                        <td>{{$attribute['sku']}}</td>
                                                        <td>{{$attribute['price']}}</td>
                                                        <td>{{$attribute['stock']}}</td>



                                                        <td>
                                                            @if($attribute['status'] ==1)
                                                                <i status="Active" attribute-id="{{$attribute['id']}}" id="attribute-{{$attribute['id']}}"  ref="input" class=" fa" :class="activeClass" v-on:click="changeAttributeStatus('product-'+{{$attribute['id']}})" style="font-size:24px"></i>
                                                            @else
                                                                <i status="Deactive" attribute-id="{{$attribute['id']}}" id="attribute-{{$attribute['id']}}"  ref="input" class=" fa" :class="deactiveClass" v-on:click="changeAttributeStatus('product-'+{{$attribute['id']}})" style="font-size:24px"></i>
                                                            @endif
                                                        </td>

<!--                                                        <td>


                                                            <a href="{{url('admin/add-edit-product/'.$product['id'])}}" style="padding: 10px">
                                                                <i class="fa fa-pencil-square-o" style="font-size:24px;color:green"></i>
                                                            </a>
                                                        &lt;!&ndash;                                                                    <a  href="{{url('admin/delete-section/'.$product['id'])}}" title="section" id="delete-{{$product['id']}}" v-on:click="confirmDelete('delete-'+{{$product['id']}})" style="padding: 10px">
                                                                        <i class="fa fa-trash-o" style="font-size:24px;color:red"></i>
                                                                    </a>&ndash;&gt;
                                                            <a module="product" moduleid="{{$product['id']}}"  href="javascript:void(0)" title="product" id="delete-{{$product['id']}}" v-on:click="confirmDelete('delete-'+{{$product['id']}})" style="padding: 10px">
                                                                <i class="fa fa-trash-o" style="font-size:24px;color:red"></i>
                                                            </a>
                                                            <a href="{{url('admin/add-attributes/'.$product['id'])}}" style="padding: 10px">
                                                                <i class="fa fa-plus-circle" style="font-size:24px;color:darkslateblue"></i>
                                                            </a>

                                                        </td>-->

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

