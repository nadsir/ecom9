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
                                <h3 class="card-title">اضافه کردن محصول</h3>
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
                            <form role="form" @if(empty($filter['id'])) action="{{url('admin/add-edit-filter')}}"
                                  @else action="{{url('admin/add-edit-filter/'.$filter['id'])}}" @endif
                                  method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="cat_ids">انتخاب دسته بندی</label>
                                        <select  name="cat_ids[]" id="cat_ids" class="form-control" multiple="">
                                            <option value="">انتخاب بخش</option>
                                            @foreach($categories as $section)
                                                <optgroup label="{{$section['name']}}" style="background-color: #c5c5c5"></optgroup>
                                                <hr>
                                                @foreach($section['categories'] as $category)
                                                    <option @if(!empty($filter['category_id']) && $filter['category_id']==$category['id']) selected="" @endif value="{{$category['id']}}" style="background-color: #e5e5e5">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;&nbsp;
                                                        {{$category['category_name']}}
                                                    </option>
                                                    @foreach($category['subcategories'] as $subcategory)
                                                        <option @if(!empty($filter['category_id']) && $filter['category_id']==$subcategory['id']) selected="" @endif value="{{$subcategory['id']}}">
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
                                        <label for="category_name">نام فیلتر</label>
                                        <input type="text" class="form-control" id="filter_name" placeholder=""
                                               @if(!empty($filter['filter_name'])) value="{{$filter['filter_name']}}" @else value="{{old('filter_name')}}" @endif
                                               name="filter_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="filter_column">ستون فیلتر</label>
                                        <input type="text" class="form-control" id="filter_column" placeholder=""
                                               @if(!empty($filter['filter_column'])) value="{{$filter['filter_column']}}" @else value="{{old('filter_column')}}" @endif
                                               name="filter_column">
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
    import Options from "../../../../public/admin/plugins/chart.js/docs/general/options.html";
    export default {
        components: {Options}
    }
</script>
