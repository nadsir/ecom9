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
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-light">
                            <a style="max-width: 150px;float: right;display: inline-block" href="{{url('admin/add-edit-brand')}}" class="btn btn-block btn-primary">اضافه کردن برند</a>

                        <!-- /.card-header -->
                            <!-- form start -->



                            <div class="card-header">
                                <h3 class="card-title">سفارش ها</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div id="example1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

                                    <div class="row">
                                        <div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid">
                                                <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 250.367px;" aria-sort="ascending" aria-label="کد ادمین: activate to sort column descending">ردیف</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 446.8px;" aria-label="نام: activate to sort column ascending">کد سفارش</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 446.8px;" aria-label="نام: activate to sort column ascending">تاریخ سفارش</th>

                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 417.383px;" aria-label="وضعیت: activate to sort column ascending">نام مشتری</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 417.383px;" aria-label="وضعیت: activate to sort column ascending">  ایمیل مشتری</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 417.383px;" aria-label="وضعیت: activate to sort column ascending">  محصولات سفارش</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 417.383px;" aria-label="وضعیت: activate to sort column ascending">  مقدار سفارش</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 417.383px;" aria-label="وضعیت: activate to sort column ascending"> وضعیت سفارش</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 417.383px;" aria-label="وضعیت: activate to sort column ascending">  روش پرداخت</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 417.383px;" aria-label="وضعیت: activate to sort column ascending">  فعالیت</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php($i=1)
                                                @foreach($orders as $order)
                                                    @if($order['orders_products'])
                                                    <tr>

                                                        <td>{{$i}}</td>
                                                        <td>{{$order['id']}}</td>
                                                        <td>{{date('Y-m-d h:i:s', strtotime($order['created_at']))}}</td>
                                                        <td>{{$order['name']}}</td>
                                                        <td>{{$order['email']}}</td>
                                                        <td>
                                                            @foreach($order['orders_products'] as $product)
                                                                {{$product['product_code']}} ({{$product['product_qty']}})<br>
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            {{$order['grand_total']}}
                                                        </td>
                                                        <td>
                                                            {{$order['order_status']}}
                                                        </td>
                                                        <td>
                                                            {{$order['payment_method']}}
                                                        </td>
                                                        <td>
                                                            <a href="{{url('admin/orders/'.$order['id'])}}" title="View Order Details"><i class="fa fa-pencil-square-o" style="font-size:24px;color:green"></i></a>&nbsp;&nbsp;
                                                            <a target="_blank" href="{{url('admin/orders/invoice/'.$order['id'])}}" title="View Order Invoice"><i class="fa fa-print" style="font-size:24px;color:red"></i></a>
                                                        </td>


                                                    </tr>
                                                    @endif
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
                            <!-- /.card -->

                            <!-- Form Element sizes -->

                            <!-- /.card -->

                        </div>
                        <!--/.col (left) -->
                        <!-- right column -->

                        <!--/.col (right) -->
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->

    </div>
@endsection
