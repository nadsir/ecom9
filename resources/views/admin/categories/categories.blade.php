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
                    <div class="col-md-10">
                        <!-- general form elements -->
                        <div class="card card-light">
                            <a style="max-width: 200px;float: right;display: inline-block" href="{{url('admin/add-edit-category')}}" class="btn btn-block btn-primary">اضافه کردن دسته بندی</a>

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



                            <div class="card-header">
                                <h3 class="card-title">دسته بندی ها</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div id="example1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

                                    <div class="row">
                                        <div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid">
                                                <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 250.367px;" aria-sort="ascending" aria-label="کد ادمین: activate to sort column descending">کد ادمین</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 446.8px;" aria-label="نام: activate to sort column ascending">نام</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 446.8px;" aria-label="نام: activate to sort column ascending">دسته بندی والد</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 446.8px;" aria-label="نام: activate to sort column ascending">بخش</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 446.8px;" aria-label="نام: activate to sort column ascending">آدرس </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 417.383px;" aria-label="وضعیت: activate to sort column ascending">وضعیت</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 117.017px;" aria-label="جزئیات: activate to sort column ascending">جزئیات</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php($i=1)
                                                @foreach($categories as $category)
                                                    @if(isset($category['parentcategory']['category_name'] )&& !empty($category['parentcategory']['category_name']))
                                                    @php($parent_category=$category['parentcategory']['category_name'])
                                                    @else
                                                        @php( $parent_category="Root")

                                                    @endif
                                                    <tr>

                                                        <td>{{$i}}</td>
                                                        <td>{{$category['category_name']}}</td>
                                                        <td>{{$parent_category}}</td>
                                                        <td>{{$category['section']['name']}}</td>
                                                        <td>{{$category['url']}}</td>
                                                        <td>
                                                            @if($category['status'] ==1)
                                                                <i status="Active" category-id="{{$category['id']}}" id="category-{{$category['id']}}"  ref="input" class=" fa" :class="activeClass" v-on:click="changeCategoryStatus('category-'+{{$category['id']}})" style="font-size:24px"></i>
                                                            @else
                                                                <i status="Deactive" category-id="{{$category['id']}}" id="category-{{$category['id']}}"  ref="input" class=" fa" :class="deactiveClass" v-on:click="changeCategoryStatus('category-'+{{$category['id']}})" style="font-size:24px"></i>
                                                            @endif
                                                        </td>
                                                        <td>

                                                            <a href="">

                                                                <a href="{{url('admin/add-edit-category/'.$category['id'])}}" style="padding: 10px">
                                                                    <i class="fa fa-pencil-square-o" style="font-size:24px;color:green"></i>
                                                                </a>
                                                            <!--                                                                    <a  href="{{url('admin/delete-section/'.$category['id'])}}" title="section" id="delete-{{$category['id']}}" v-on:click="confirmDelete('delete-'+{{$category['id']}})" style="padding: 10px">
                                                                        <i class="fa fa-trash-o" style="font-size:24px;color:red"></i>
                                                                    </a>-->
                                                                <a module="category" moduleid="{{$category['id']}}"  href="javascript:void(0)" title="category" id="delete-{{$category['id']}}" v-on:click="confirmDelete('delete-'+{{$category['id']}})" style="padding: 10px">
                                                                    <i class="fa fa-trash-o" style="font-size:24px;color:red"></i>
                                                                </a>
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
