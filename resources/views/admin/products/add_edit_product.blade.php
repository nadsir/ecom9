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
                            <form role="form" @if(empty($product['id'])) action="{{url('admin/add-edit-product')}}"
                                  @else action="{{url('admin/add-edit-product/'.$product['id'])}}" @endif
                                  method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="category_id">انتخاب دسته بندی</label>
                                        <select  name="category_id" id="category_id" class="form-control">
                                            <option value="">انتخاب بخش</option>
                                            @foreach($categories as $section)
                                                <optgroup label="{{$section['name']}}" style="background-color: #c5c5c5"></optgroup>
                                                <hr>
                                                @foreach($section['categories'] as $category)
                                                    <option @if(!empty($product['category_id']) && $product['category_id']==$category['id']) selected="" @endif value="{{$category['id']}}" style="background-color: #e5e5e5">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;&nbsp;
                                                        {{$category['category_name']}}
                                                    </option>
                                                    @foreach($category['subcategories'] as $subcategory)
                                                        <option @if(!empty($product['category_id']) && $product['category_id']==$subcategory['id']) selected="" @endif value="{{$subcategory['id']}}">
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
                                        <label for="brand_id">انتخاب برند</label>
                                        <select  name="brand_id" id="brand_id" class="form-control">
                                            <option value="">انتخاب بخش</option>

                                            @foreach($brandss as $brands)

                                                <option @if(!empty($product['brand_id']) && $product['brand_id']==$brands['id']) selected="" @endif value="{{$brands['id']}}" >{{$brands['name']}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="category_name">نام محصول</label>
                                        <input type="text" class="form-control" id="product_name" placeholder=""
                                               @if(!empty($product['product_name'])) value="{{$product['product_name']}}" @else value="{{old('product_name')}}" @endif
                                               name="product_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="product_code">کد محصول</label>
                                        <input type="text" class="form-control" id="product_code" placeholder=""
                                               @if(!empty($product['product_code'])) value="{{$product['product_code']}}" @else value="{{old('product_code')}}" @endif
                                               name="product_code">
                                    </div>
                                    <div class="form-group">
                                        <label for="product_color">رنگ محصول</label>
                                        <input type="text" class="form-control" id="product_color" placeholder=""
                                               @if(!empty($product['product_color'])) value="{{$product['product_color']}}" @else value="{{old('product_color')}}" @endif
                                               name="product_color">
                                    </div>
                                    <div class="form-group">
                                        <label for="product_price">قیمت محصول</label>
                                        <input type="text" class="form-control" id="product_price" placeholder=""
                                               @if(!empty($product['product_price'])) value="{{$product['product_price']}}" @else value="{{old('product_price')}}" @endif
                                               name="product_price">
                                    </div>
                                    <div class="form-group">
                                        <label for="product_discount"> (%) تخفیف محصول</label>
                                        <input type="text" class="form-control" id="product_discount" placeholder=""
                                               @if(!empty($product['product_discount'])) value="{{$product['product_discount']}}" @else value="{{old('product_discount')}}" @endif
                                               name="product_discount">
                                    </div>
                                    <div class="form-group">
                                        <label for="product_weight">وزن محصول</label>
                                        <input type="text" class="form-control" id="product_weight" placeholder=""
                                               @if(!empty($product['product_weight'])) value="{{$product['product_weight']}}" @else value="{{old('product_weight')}}" @endif
                                               name="product_weight">
                                    </div>
                                    <div class="form-group">
                                        <label for="product_image"> عکس محصول (سایز پیشنهادی 1000*1000 )</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="product_image" name="product_image">
                                                <label class="custom-file-label" for="product_image">انتخاب فایل</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="">Upload</span>
                                            </div>

                                        </div>
                                        @if(!empty($product['product_image']))

                                            <a target="_blank" href="{{url('front/images/product_images/large/'.$product['product_image'])}}"> نمای عکس</a>&nbsp;|&nbsp;
                                            <a module="product-image" moduleid="{{$product['id']}}"  href="javascript:void(0)" title="product" id="delete-{{$product['id']}}" v-on:click="confirmDelete('delete-'+{{$product['id']}})" style="padding: 10px">
                                                حذف</a>

                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="admin-image">ویدیو محصول (سایز پیشنهادی کمتر از 2 مگابایت )</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="product_video" name="product_video">
                                                <label class="custom-file-label" for="product_video">انتخاب فایل</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="">Upload</span>
                                            </div>

                                        </div>
                                        @if(!empty($product['product_video']))

                                            <a target="_blank" href="{{url('front/videos/product_videos/'.$product['product_video'])}}"> نمای ویدیو</a>&nbsp;|&nbsp;
                                            <a module="product-video" moduleid="{{$product['id']}}"  href="javascript:void(0)" title="product" id="delete-{{$product['id']}}" v-on:click="confirmDelete('delete-'+{{$product['id']}})" style="padding: 10px">
                                                حذف</a>

                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="description">توضیحات دسته بندی</label>
                                        <textarea id="description" name="description" class="form-control" id="" cols="30" rows="3"
                                                  @if(!empty($product['description'])) value="{{$product['description']}}" @else value="{{old('description')}}" @endif
                                        ></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="meta_title">عنوان متا</label>
                                        <input type="text" class="form-control" id="meta_title" placeholder=""
                                               @if(!empty($product['meta_title'])) value="{{$product['meta_title']}}" @else value="{{old('meta_title')}}" @endif
                                               name="meta_title">
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_description">توضیحات متا</label>
                                        <input type="text" class="form-control" id="meta_description" placeholder=""
                                               @if(!empty($product['meta_description'])) value="{{$product['meta_description']}}" @else value="{{old('meta_description')}}" @endif
                                               name="meta_description">
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_keywords">کلید واژه متا</label>
                                        <input type="text" class="form-control" id="meta_keywords" placeholder=""
                                               @if(!empty($product['meta_keywords'])) value="{{$product['meta_keywords']}}" @else value="{{old('meta_keywords')}}" @endif
                                               name="meta_keywords">
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_keywords">محصولات آینده</label>
                                        <input type="checkbox" class="form-control" id="is_featured" placeholder="" name="is_featured" value="Yes"
                                               @if(!empty($product['is_feature']) && $product['is_feature']=='Yes') checked="" @endif>

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
