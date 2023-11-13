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
                                <h3 class="card-title">اضافه کردن دسته بندی</h3>
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
                            <form role="form" @if(empty($category['id'])) action="{{url('admin/add-edit-category')}}"
                                  @else action="{{url('admin/add-edit-category/'.$category['id'])}}" @endif
                                  method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="category_name">نام دسته بندی</label>
                                        <input type="text" class="form-control" id="category_name" placeholder=""
                                               @if(!empty($category['category_name'])) value="{{$category['category_name']}}" @else value="{{old('category_name')}}" @endif
                                                name="category_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="section_id">نام بخش</label>
                                        <select v-on:change="selectCategory('section_id')" name="section_id" id="section_id" class="form-control">
                                            <option value="">انتخاب بخش</option>
                                            @foreach($getSections as $section)
                                                <option
                                                    @if(!empty($category['section']) && $category['section_id']==$section['id'])
                                                        selected=""
                                                    @endif
                                                    value="{{$section['id']}}">{{$section['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div id="appendCategoriesLevel">
                                        @include('admin.categories.append_categories_level')

                                    </div>
                                    <div class="form-group">
                                        <label for="admin-image">عکس دسته بندی</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="category_image" name="category_image">
                                                <label class="custom-file-label" for="category_image">انتخاب فایل</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="">Upload</span>
                                            </div>

                                        </div>
                                        @if(!empty($category['category_image']))

                                            <a target="_blank" href="{{url('front/images/category_images/'.$category['category_image'])}}"> نمای عکس</a>&nbsp;|&nbsp;
                                            <a module="category-image" moduleid="{{$category['id']}}"  href="javascript:void(0)" title="category" id="delete-{{$category['id']}}" v-on:click="confirmDelete('delete-'+{{$category['id']}})" style="padding: 10px">
                                                حذف</a>

                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="category_discount">تخفیف دسته بندی</label>
                                        <input type="text" class="form-control" id="category_discount" placeholder=""
                                               @if(!empty($category['category_discount'])) value="{{$category['category_discount']}}" @else value="{{old('category_discount')}}" @endif
                                               name="category_discount">
                                    </div>
                                    <div class="form-group">
                                        <label for="category_discount">توضیحات دسته بندی</label>
                                        <textarea id="description" name="description" class="form-control" id="" cols="30" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="url">آدرس دسته بندی</label>
                                        <input type="text" class="form-control" id="url" placeholder=""
                                               @if(!empty($category['url'])) value="{{$category['url']}}" @else value="{{old('url')}}" @endif
                                               name="url">
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_title">عنوان متا</label>
                                        <input type="text" class="form-control" id="meta_title" placeholder=""
                                               @if(!empty($category['meta_title'])) value="{{$category['meta_title']}}" @else value="{{old('meta_title')}}" @endif
                                               name="meta_title">
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_description">توضیحات متا</label>
                                        <input type="text" class="form-control" id="meta_description" placeholder=""
                                               @if(!empty($category['meta_description'])) value="{{$category['meta_description']}}" @else value="{{old('meta_description')}}" @endif
                                               name="meta_description">
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_keywords">کلید واژه متا</label>
                                        <input type="text" class="form-control" id="meta_keywords" placeholder=""
                                               @if(!empty($category['meta_keywords'])) value="{{$category['meta_keywords']}}" @else value="{{old('meta_keywords')}}" @endif
                                               name="meta_keywords">
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
