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
                            <form role="form" @if(empty($banner['id'])) action="{{url('admin/add-edit-banner')}}"
                                  @else action="{{url('admin/add-edit-banner/'.$banner ['id'])}}" @endif
                                  method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">


                                    <div class="form-group">
                                        <label for="image">عکس دسته بندی</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image" name="image">
                                                <label class="custom-file-label" for="image">انتخاب فایل</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="">Upload</span>
                                            </div>

                                        </div>
                                        @if(!empty($banner['image']))

                                            <a target="_blank" href="{{url('front/images/banner_images/'.$banner['image'])}}"> نمای عکس</a>&nbsp;|&nbsp;


                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="link">لینک اسلاید</label>
                                        <input type="text" class="form-control" id="link" placeholder=""
                                               @if(!empty($banner['link'])) value="{{$banner['link']}}" @else value="{{old('link')}}" @endif name="link">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">عنوان اسلاید</label>
                                        <input type="text" class="form-control" id="title" placeholder=""
                                               @if(!empty($banner['title'])) value="{{$banner['title']}}" @else value="{{old('title')}}" @endif name="title">
                                    </div>
                                    <div class="form-group">
                                        <label for="alt">متن جایگزین اسلاید</label>
                                        <input type="text" class="form-control" id="alt" placeholder=""
                                               @if(!empty($banner['alt'])) value="{{$banner['alt']}}" @else value="{{old('alt')}}" @endif name="alt">
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
