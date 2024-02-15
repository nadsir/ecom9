<?php
use App\Models\Product;
use App\Models\ProductsFilter;
$productFilters = ProductsFilter::productFilters();


?>
@extends('front.layout.layouts')
@section('collapse_filter_menu_css')
    #main {

    }

    #main #faq .card {
    margin-bottom: 2px;
    border: 0;
    }

    #main #faq .card .card-header {
    border: 0;
    -webkit-box-shadow: 0 0 20px 0 rgba(235, 194, 74, 0.5);
    box-shadow: 0 0 20px 0 rgba(235, 194, 74, 0.5);
    border-radius: 2px;
    padding: 0;
    }

    #main #faq .card .card-header .btn-header-link {
    color: #fff;
    display: block;
    text-align: left;
    background: #fdb414;
    color: #222;
    text-align:right;

    }

    #main #faq .card .card-header .btn-header-link:after {
    content: "\f107";
    font-family: 'Font Awesome 5 Free';
    font-weight: 900;
    float:left;
    }

    #main #faq .card .card-header .btn-header-link.collapsed {
    background: #fdb414;
    color: #fff;
    text-align:right;
    }

    #main #faq .card .card-header .btn-header-link.collapsed:after {
    content: "\f106";
    float:left;
    }

    #main #faq .card .collapsing {
    background: #FFE472;

    }

    #main #faq .card .collapse {
    border: 0;
    }

    #main #faq .card .collapse.show {
    background: #fffae8;

    color: #222;
    }
    .basket-shopping{
    background-color: #fdb414;width: 150px;
    border: none!important;
    -webkit-box-shadow: 4px 4px 16px -6px rgba(0,0,0,0.75);
    -moz-box-shadow: 4px 4px 16px -6px rgba(0,0,0,0.75);
    box-shadow: 4px 4px 16px -6px rgba(0,0,0,0.75);
    }
    .basket-shopping:focus{
    background-color: #fdb414;width: 150px;
    -webkit-box-shadow: inset 4px 4px 16px -6px rgba(0,0,0,0.75);
    -moz-box-shadow: inset 4px 4px 16px -6px rgba(0,0,0,0.75);
    box-shadow: inset 4px 4px 16px -6px rgba(0,0,0,0.75);
    }
    .btn-secondary:hover {
    color: #fff;
    background-color: #fdb414!important;
    border-color: #545b62;
    }
    .item{
    -webkit-box-shadow: 4px 4px 16px -6px rgba(0,0,0,0.75);
    -moz-box-shadow: 4px 4px 16px -6px rgba(0,0,0,0.75);
    box-shadow: 4px 4px 16px -6px rgba(0,0,0,0.75);
    }
@endsection
@section('content')
    <!-- Page Introduction Wrapper -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro" style="font-family: 'B Yekan'">
<!--                <h2>جزئیات</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="{{url('/')}}">خانه</a>
                    </li>
                    <li class="is-marked">
                        <a href="javascript:;">جزئیات محصول</a>
                    </li>
                </ul>-->
            </div>
        </div>
    </div>
    <!-- Page Introduction Wrapper /- -->
    <!-- Single-Product-Full-Width-Page -->
    <div class="page-detail u-s-p-t-80">
        <div class="container">
            <!-- Product-Detail -->
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <!-- Product-zoom-area -->
                    <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails" style="border: solid 1px #9d9d9d;padding: 2px;border-radius: 4px 4px 4px 4px;
-moz-border-radius: 4px 4px 4px 4px;
-webkit-border-radius: 4px 4px 4px 4px;">
                        <a href="{{asset('front/images/product_images/large/'.$productDetails['product_image'])}}">
                            <img class="img-fluid" alt="Responsive image" src="{{asset('front/images/product_images/large/'.$productDetails['product_image'])}}"
                                 alt="" width="500" height="500"/>
                        </a>

                    </div>
                    <div class="thumbnails" style="margin-top: 30px">
                        <a href="{{asset('front/images/product_images/large/'.$productDetails['product_image'])}}"
                           data-standard="{{asset('front/images/product_images/small/'.$productDetails['product_image'])}}">
                            <img style="border: solid 1px #9d9d9d;padding: 2px;border-radius: 4px 4px 4px 4px;
-moz-border-radius: 4px 4px 4px 4px;
-webkit-border-radius: 4px 4px 4px 4px;" width="120" height="120"
                                 src="{{asset('front/images/product_images/small/'.$productDetails['product_image'])}}"
                                 alt=""/>
                        </a>
                        @foreach($productDetails['images'] as $image)
                            <a href="{{asset('front/images/product_images/large/'.$image['image'])}}"
                               data-standard="{{asset('front/images/product_images/small/'.$image['image'])}}">
                                <img style="border: solid 1px #9d9d9d;padding: 2px;border-radius: 4px 4px 4px 4px;
-moz-border-radius: 4px 4px 4px 4px;
-webkit-border-radius: 4px 4px 4px 4px;" width="120" height="120"
                                     src="{{asset('front/images/product_images/small/'.$image['image'])}}" alt=""/>
                            </a>
                        @endforeach

                    </div>
                    <!-- Product-zoom-area /- -->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: end">
                    <!-- Product-details -->
                    <div class="all-information-wrapper"
                         style="font-family: 'B Yekan';text-align: right;direction: rtl">
                        @if(Session::has('error_message'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>پیام خطا !</strong>
                                <?php echo Session::get('error_message'); ?>

                            </div>
                        @endif
                        @if(Session::has('success_message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: flex;flex-direction: row-reverse;justify-content: flex-end;">
                                <div>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="close" style="right: auto">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div>
                                    <?php echo Session::get('success_message'); ?>
                                </div>
                                <div>
                                    <strong>پیام پذیرش !</strong>
                                </div>




                            </div>
                        @endif
                        <div class="section-1-title-breadcrumb-rating">
                            <div class="product-title">
                                <h1>
                                    <a href="javascript:;">{{$productDetails['product_name']}}</a>
                                </h1>
                            </div>
                            <ul class="bread-crumb">
                                <li class="has-separator">
                                    <a href="{{url('/')}}">خانه</a>
                                </li>
                                <li class="has-separator">
                                    <a href="javascript:;">{{$productDetails['section']['name']}}</a>
                                </li>
                                <?php echo $categoryDetails['breadcrumb'];?>

                            </ul>
                            <!--                            <div class="product-rating">
                                                            <div class='star' title="4.5 out of 5 - based on 23 Reviews">
                                                                <span style='width:67px'></span>
                                                            </div>
                                                            <span>(23)</span>
                                                        </div>-->
                        </div>
                        @if($productDetails['description'] !=null)
                            <div class="section-2-short-description u-s-p-y-14">
                                <h6 class="information-heading u-s-m-b-8">توضیحات محصول :</h6>
                                <p>{{$productDetails['description']}}</p>
                            </div>
                        @endif


                        <div class="section-4-sku-information u-s-p-y-14">
                            <h6 class="information-heading u-s-m-b-8">مشخصات محصول :</h6>
                            <div class="left">
                                <span>کد محصول:</span>
                                <span>{{$productDetails['product_code']}}</span>
                            </div>

                            @if($productDetails['product_color']!='free')
                            <div class="left">
                                <span>رنگ محصول:</span>
                                <span>{{$productDetails['product_color']}}</span>
                            </div>
                            @endif
                            <div class="left">
                                <span>موجودی محصول:</span>
                                @if($totalStock>0)
                                    <span>موجود است</span>
                                @else
                                    <span style="color: red">موجود نیست</span>
                                @endif
                            </div>
                            @if($totalStock>0)
                                <div class="left">
                                    <span>تعداد:</span>
                                    <span>{{$totalStock}}</span>
                                </div>
                            @endif
                        </div>
                        <div>
                            @if(isset($productDetails['vendor']))

                                <div>
                                    فروش توسط :

                                    <a href="/products/{{$productDetails['vendor']['id']}}">{{$productDetails['vendor']['vendorbussinesdetails']['shop_name']}}</a>
                                </div>
                            @endif


                        </div>
                        <form action="{{url('cart/add')}}" class="post-form" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{$productDetails['id']}}">
                            @if($productDetails['attributes'] !=null)
                                @if($productDetails['attributes'][0]['size']=="free")
                                    <div class="section-5-product-variants u-s-p-y-14">
                                        <div class="sizes u-s-m-b-11">
                                            <select style="display: none" name="size" id="getPrice"
                                                    product-id="{{$productDetails['id']}}"
                                                    class="select-box product-size" required>
                                                @foreach($productDetails['attributes'] as $attributes)
                                                    <option
                                                        value="{{$attributes['size']}}">{{$attributes['size']}}</option>
                                                @endforeach
                                            </select>
                                            <strong>فاقد سایز بندی</strong>
                                        </div>
                                        @if(count($groupProducts)>0)
                                            <div>
                                                <div><strong>رنگ محصول</strong></div>
                                                <div style="margin-top: 10px">
                                                    @foreach($groupProducts as $product)
                                                        <a href="{{url('product/'.$product['id'])}}">
                                                            <img style="width: 70px"
                                                                 src="{{asset('front/images/product_images/small/'.$product['product_image'])}}"
                                                                 alt="">
                                                        </a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                        <div class="size u-s-m-b-11" style="margin-top: 10px"></div>
                                    </div>

                                @else
                                    <div class="section-5-product-variants u-s-p-y-14">
                                        <div class="sizes u-s-m-b-11">
                                            <span>سایز های موجود :</span>
                                            <div class="size-variant select-box-wrapper">
                                                <select name="size" id="getPrice" product-id="{{$productDetails['id']}}"
                                                        class="select-box product-size" required>
                                                    <option value="">انتخاب سایز</option>
                                                    @foreach($productDetails['attributes'] as $attributes)
                                                        <option
                                                            value="{{$attributes['size']}}">{{$attributes['size']}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        @if(count($groupProducts)>0)
                                            <div>
                                                <div><strong>رنگ محصول</strong></div>
                                                <div style="margin-top: 10px">
                                                    @foreach($groupProducts as $product)
                                                        <a href="{{url('product/'.$product['id'])}}">
                                                            <img style="width: 70px"
                                                                 src="{{asset('front/images/product_images/small/'.$product['product_image'])}}"
                                                                 alt="">
                                                        </a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                        <div class="size u-s-m-b-11" style="margin-top: 10px"></div>
                                    </div>
                                @endif
                            @else
                                <div class="section-5-product-variants u-s-p-y-14">
                                    <div class="sizes u-s-m-b-11">
                                        <select style="display: none" name="size" id="getPrice"
                                                product-id="{{$productDetails['id']}}" class="select-box product-size"
                                                required>

                                            <option value="free">free</option>

                                        </select>
                                        <strong>فاقد سایز بندی</strong>
                                    </div>
                                    @if(count($groupProducts)>0)
                                        <div>
                                            <div><strong>رنگ محصول</strong></div>
                                            <div style="margin-top: 10px">
                                                @foreach($groupProducts as $product)
                                                    <a href="{{url('product/'.$product['id'])}}">
                                                        <img style="width: 70px"
                                                             src="{{asset('front/images/product_images/small/'.$product['product_image'])}}"
                                                             alt="">
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                    <div class="size u-s-m-b-11" style="margin-top: 10px"></div>
                                </div>
                            @endif
                            <div class="section7"
                                 style="display: flex;justify-content: space-between;align-items: center;">
                                <div>
                                    <div class="section-3-price-original-discount u-s-p-y-14">
                                        @php($getDiscoutnPrice=Product::getDiscountPrice($productDetails['id']))
                                        <span class="getAttributePrice">
                            @if($getDiscoutnPrice>0)
                                                <div class="price">
                                <h4>  <strong class="money">{{$getDiscoutnPrice}}</strong> تومان </h4>
                            </div>
                                                <div class="original-price">
                                <span>قیمت اصلی محصول :</span>
                                <span><strong class="money">{{$productDetails['product_price']}}</strong> تومان </span>
                            </div>
                                            @else
                                                <div class="price">
                                    <h4><strong class="money">{{$productDetails['product_price']}}</strong>   تومان </h4>
                                </div>
                                            @endif
                            </span>
                                        {{--    <div class="discount-price">
                                                <span>Discount:</span>
                                                <span>15%</span>
                                            </div>
                                            <div class="total-save">
                                                <span>Save:</span>
                                                <span>$20</span>
                                            </div>--}}
                                    </div>
                                </div>
                                <div>
                                    <div class="number">
                                        <span class="minus">-</span>
                                        <input type="number" class="quantity-text-field inputcounter" name="quantity"
                                               value="1"/>
                                        <span class="plus">+</span>
                                    </div>

                                </div>
                            </div>

                            <div class="section-6-social-media-quantity-actions u-s-p-y-14">


                                <div>
                                    <button class="btn btn-secondary basket-shopping" style="background-color: #fdb414;
    width: 50%;
    border: none!important;
    -webkit-box-shadow: 4px 4px 16px -6px rgba(0,0,0,0.75);
    -moz-box-shadow: 4px 4px 16px -6px rgba(0,0,0,0.75);
    box-shadow: 4px 4px 16px -6px rgba(0,0,0,0.75);" type="submit">اضافه کدن محصول
                                        <i class="fa-solid fa-cart-shopping" aria-hidden="true"></i></button>
                                    <!--                                    <button class="button button-outline-secondary far fa-heart u-s-m-l-6"></button>
                                                                        <button class="button button-outline-secondary far fa-envelope u-s-m-l-6"></button>-->
                                </div>
                                <div class="quick-social-media-wrapper u-s-m-b-22" style="padding-top: 20px">
                                    <span>شبکه های اجتماعی</span>
                                    <ul class="social-media-list" style="padding-top: 20px">
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-google-plus-g"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fas fa-rss"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-pinterest"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </form>
                    </div>
                    <!-- Product-details /- -->
                </div>
            </div>
            <!-- Product-Detail /- -->
            <!-- Detail-Tabs -->
            <div class="row" style="font-family: 'B Yekan'">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="detail-tabs-wrapper u-s-p-t-0">
                        <div class="detail-nav-wrapper u-s-m-b-30">
                            <ul class="nav single-product-nav justify-content-center">
                                @if($productDetails['product_video']!=null)
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#video">ویدیو محصول</a>
                                </li>
                                @endif
                                    <?php $flag="No"?>
                                    @foreach($productFilters as $filter)
                                        @if(isset($productDetails['category_id']))
                                            <?php $filterAvailable = ProductsFilter::filterAvailable($filter['id'], $productDetails['category_id']);?>

                                            @if($filterAvailable == "Yes")
                                                <?php $flag=$filterAvailable; ?>
                                        @endif
                                            @endif
                                    @endforeach
                                    @if($flag != "No")
                                    <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#detail">جزئیات محصول</a>
                                    </li>
                                    @endif

                              {{--  <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#review">Reviews (15)</a>
                                </li>--}}
                            </ul>
                        </div>
                        <div class="tab-content">
                            @if($productDetails['product_video']!=null)
                            <!-- Description-Tab -->
                            <div class="tab-pane fade active show" id="video">
                                <div class="description-whole-container">
                                    @if($productDetails['product_video'])
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <video class="embed-responsive-item" controls>
                                                <source src="{{url('front/videos/product_videos/'.$productDetails['product_video'])}}" type="video/mp4"> </source>
                                            </video>
                                        </div>

                                    @else
                                        محصول موردنظر ویدیو ندارد

                                    @endif
                                    <p class="desc-p u-s-m-b-26">
                                    </p>
                                </div>

                            </div>
                            @endif
                            <!-- Description-Tab /- -->
                            <!-- Details-Tab -->
                                @if($productFilters != null)
                                @foreach($productFilters as $filter)
                                    @if(isset($productDetails['category_id']))
                                        <?php $filterAvailable = ProductsFilter::filterAvailable($filter['id'], $productDetails['category_id']);?>

                                    @endif
                                @endforeach
                                @else
                                <?php  $filterAvailable="No"; ?>
                                @endif

                                @if($filterAvailable != "Yes" )
                            <div class="tab-pane fade" id="detail">
                                <div class="specification-whole-container">

                                    <div class="spec-table u-s-m-b-50" style="text-align: right;direction: rtl;font-family: 'B Yekan'">
                                        <h4 class="spec-heading">جزئیات محصول </h4>
                                        <table>
                                            @foreach($productFilters as $filter)
                                                @if(isset($productDetails['category_id']))
                                                    <?php $filterAvailable = ProductsFilter::filterAvailable($filter['id'], $productDetails['category_id']);?>
                                                    @if($filterAvailable == "Yes")
                                                        <tr>
                                                            <td>{{$filter['filter_name']}}</td>
                                                            <td>
                                                                @foreach($filter['filter_values'] as $value)
                                                                    @if(!empty($productDetails[$filter['filter_column']]) && $value['filter_value'] == $productDetails [$filter['filter_column']] ){{ucwords($value['filter_value'])}} @endif
                                                                @endforeach
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <!-- Specifications-Tab /- -->
                            <!-- Reviews-Tab -->
<!--                            <div class="tab-pane fade" id="review">
                                <div class="review-whole-container">
                                    <div class="row r-1 u-s-m-b-26 u-s-p-b-22">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="total-score-wrapper">
                                                <h6 class="review-h6">Average Rating</h6>
                                                <div class="circle-wrapper">
                                                    <h1>4.5</h1>
                                                </div>
                                                <h6 class="review-h6">Based on 23 Reviews</h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="total-star-meter">
                                                <div class="star-wrapper">
                                                    <span>5 Stars</span>
                                                    <div class="star">
                                                        <span style='width:100%'></span>
                                                    </div>
                                                    <span>(0)</span>
                                                </div>
                                                <div class="star-wrapper">
                                                    <span>4 Stars</span>
                                                    <div class="star">
                                                        <span style='width:67px'></span>
                                                    </div>
                                                    <span>(23)</span>
                                                </div>
                                                <div class="star-wrapper">
                                                    <span>3 Stars</span>
                                                    <div class="star">
                                                        <span style='width:0'></span>
                                                    </div>
                                                    <span>(0)</span>
                                                </div>
                                                <div class="star-wrapper">
                                                    <span>2 Stars</span>
                                                    <div class="star">
                                                        <span style='width:0'></span>
                                                    </div>
                                                    <span>(0)</span>
                                                </div>
                                                <div class="star-wrapper">
                                                    <span>1 Star</span>
                                                    <div class="star">
                                                        <span style='width:0'></span>
                                                    </div>
                                                    <span>(0)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row r-2 u-s-m-b-26 u-s-p-b-22">
                                        <div class="col-lg-12">
                                            <div class="your-rating-wrapper">
                                                <h6 class="review-h6">Your Review is matter.</h6>
                                                <h6 class="review-h6">Have you used this product before?</h6>
                                                <div class="star-wrapper u-s-m-b-8">
                                                    <div class="star">
                                                        <span id="your-stars" style='width:0'></span>
                                                    </div>
                                                    <label for="your-rating-value"></label>
                                                    <input id="your-rating-value" type="text" class="text-field"
                                                           placeholder="0.0">
                                                    <span id="star-comment"></span>
                                                </div>
                                                <form>
                                                    <label for="your-name">Name
                                                        <span class="astk"> *</span>
                                                    </label>
                                                    <input id="your-name" type="text" class="text-field"
                                                           placeholder="Your Name">
                                                    <label for="your-email">Email
                                                        <span class="astk"> *</span>
                                                    </label>
                                                    <input id="your-email" type="text" class="text-field"
                                                           placeholder="Your Email">
                                                    <label for="review-title">Review Title
                                                        <span class="astk"> *</span>
                                                    </label>
                                                    <input id="review-title" type="text" class="text-field"
                                                           placeholder="Review Title">
                                                    <label for="review-text-area">Review
                                                        <span class="astk"> *</span>
                                                    </label>
                                                    <textarea class="text-area u-s-m-b-8" id="review-text-area"
                                                              placeholder="Review"></textarea>
                                                    <button class="button button-outline-secondary">Submit Review
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    &lt;!&ndash; Get-Reviews &ndash;&gt;
                                    <div class="get-reviews u-s-p-b-22">
                                        &lt;!&ndash; Review-Options &ndash;&gt;
                                        <div class="review-options u-s-m-b-16">
                                            <div class="review-option-heading">
                                                <h6>Reviews
                                                    <span> (15) </span>
                                                </h6>
                                            </div>
                                            <div class="review-option-box">
                                                <div class="select-box-wrapper">
                                                    <label class="sr-only" for="review-sort">Review Sorter</label>
                                                    <select class="select-box" id="review-sort">
                                                        <option value="">Sort by: Best Rating</option>
                                                        <option value="">Sort by: Worst Rating</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        &lt;!&ndash; Review-Options /- &ndash;&gt;
                                        &lt;!&ndash; All-Reviews &ndash;&gt;
                                        <div class="reviewers">
                                            <div class="review-data">
                                                <div class="reviewer-name-and-date">
                                                    <h6 class="reviewer-name">John</h6>
                                                    <h6 class="review-posted-date">10 May 2018</h6>
                                                </div>
                                                <div class="reviewer-stars-title-body">
                                                    <div class="reviewer-stars">
                                                        <div class="star">
                                                            <span style='width:67px'></span>
                                                        </div>
                                                        <span class="review-title">Good!</span>
                                                    </div>
                                                    <p class="review-body">
                                                        Good Quality...!
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="review-data">
                                                <div class="reviewer-name-and-date">
                                                    <h6 class="reviewer-name">Doe</h6>
                                                    <h6 class="review-posted-date">10 June 2018</h6>
                                                </div>
                                                <div class="reviewer-stars-title-body">
                                                    <div class="reviewer-stars">
                                                        <div class="star">
                                                            <span style='width:67px'></span>
                                                        </div>
                                                        <span class="review-title">Well done!</span>
                                                    </div>
                                                    <p class="review-body">
                                                        Cotton is good.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="review-data">
                                                <div class="reviewer-name-and-date">
                                                    <h6 class="reviewer-name">Tim</h6>
                                                    <h6 class="review-posted-date">10 July 2018</h6>
                                                </div>
                                                <div class="reviewer-stars-title-body">
                                                    <div class="reviewer-stars">
                                                        <div class="star">
                                                            <span style='width:67px'></span>
                                                        </div>
                                                        <span class="review-title">Well done!</span>
                                                    </div>
                                                    <p class="review-body">
                                                        Excellent condition
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="review-data">
                                                <div class="reviewer-name-and-date">
                                                    <h6 class="reviewer-name">Johnny</h6>
                                                    <h6 class="review-posted-date">10 March 2018</h6>
                                                </div>
                                                <div class="reviewer-stars-title-body">
                                                    <div class="reviewer-stars">
                                                        <div class="star">
                                                            <span style='width:67px'></span>
                                                        </div>
                                                        <span class="review-title">Bright!</span>
                                                    </div>
                                                    <p class="review-body">
                                                        Cotton
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="review-data">
                                                <div class="reviewer-name-and-date">
                                                    <h6 class="reviewer-name">Alexia C. Marshall</h6>
                                                    <h6 class="review-posted-date">12 May 2018</h6>
                                                </div>
                                                <div class="reviewer-stars-title-body">
                                                    <div class="reviewer-stars">
                                                        <div class="star">
                                                            <span style='width:67px'></span>
                                                        </div>
                                                        <span class="review-title">Well done!</span>
                                                    </div>
                                                    <p class="review-body">
                                                        Good polyester Cotton
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        &lt;!&ndash; All-Reviews /- &ndash;&gt;
                                        &lt;!&ndash; Pagination-Review &ndash;&gt;
                                        <div class="pagination-review-area">
                                            <div class="pagination-review-number">
                                                <ul>
                                                    <li style="display: none">
                                                        <a href="single-product.html" title="Previous">
                                                            <i class="fas fa-angle-left"></i>
                                                        </a>
                                                    </li>
                                                    <li class="active">
                                                        <a href="single-product.html">1</a>
                                                    </li>
                                                    <li>
                                                        <a href="single-product.html">2</a>
                                                    </li>
                                                    <li>
                                                        <a href="single-product.html">3</a>
                                                    </li>
                                                    <li>
                                                        <a href="single-product.html">...</a>
                                                    </li>
                                                    <li>
                                                        <a href="single-product.html">10</a>
                                                    </li>
                                                    <li>
                                                        <a href="single-product.html" title="Next">
                                                            <i class="fas fa-angle-right"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        &lt;!&ndash; Pagination-Review /- &ndash;&gt;
                                    </div>
                                    &lt;!&ndash; Get-Reviews /- &ndash;&gt;
                                </div>
                            </div>-->
                            <!-- Reviews-Tab /- -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Detail-Tabs /- -->
            <!-- Different-Product-Section -->
            <div class="detail-different-product-section u-s-p-t-0">
                <!-- Similar-Products -->
                @if($similarProducts !=null)
                <section class="section-maker" style="font-family: 'B Yekan'">
                    <div class="container">
                        <div class="sec-maker-header text-center">
                            <h3 class="sec-maker-h3">محصولات مشابه</h3>
                        </div>
                        <div class="slider-fouc">
                            <div class="products-slider owl-carousel" data-item="4">
                                @foreach($similarProducts as $product)
                                    <div class="item" style="font-family: 'B Yekan'">
                                        <div class="image-container">
                                            <a class="item-img-wrapper-link" href="{{url('product/'.$product['id'])}}">
                                                @php($product_image_path='front/images/product_images/small/'.$product['product_image'])
                                                @if(!empty($product['product_image']) && file_exists($product_image_path))
                                                    <img class="img-fluid" src="{{asset($product_image_path)}}" alt="Product">
                                                @else
                                                    <img class="img-fluid" src="{{asset('front/images/product_images/small/no-image.png')}}" alt="Product">
                                                @endif
                                            </a>
                                            <div class="item-action-behaviors">
                                                <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick Look</a>
                                                <a class="item-mail" href="javascript:void(0)">Mail</a>
                                                <a class="item-addwishlist" href="javascript:void(0)">Add to Wishlist</a>
                                                <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                                            </div>
                                        </div>

                                        <div class="item-content">
                                            <div class="what-product-is" style="text-align: center">
                                            <!--                        <ul class="bread-crumb">
                            <li class="has-separator">
                                <a href="shop-v1-root-category.html">{{$product['product_code']}}</a>
                            </li>
                            <li class="has-separator">
                                <a href="listing.html">{{$product['product_color']}}</a>
                            </li>
                            <li >
                                <a href="listing.html">{{$product['brand']['name']}}</a>
                            </li>
                        </ul>-->
                                                <h6 class="item-title">
                                                    <a href="single-product.html">{{$product['product_name']}}</a>
                                                </h6>
                                                <div class="item-description">
                                                    <p>{{$product['description']}}</p>
                                                </div>
                                                <!--                        <div class="item-stars">
                                                                            <div class='star' title="4.5 out of 5 - based on 23 Reviews">
                                                                                <span style='width:67px'></span>
                                                                            </div>
                                                                            <span>(23)</span>
                                                                        </div>-->
                                            </div>

                                            <?php
                                            $getDiscoutnPrice=Product::getDiscountPrice($product['id']);
                                            ?>
                                            @if($getDiscoutnPrice>0)
                                                <div class="price-template" style="display: flex;flex-direction: column;align-items: center;font-family: 'B Yekan'">

                                                    <div class="item-new-price">
                                                        تومان <strong class="money">{{$getDiscoutnPrice}}</strong>
                                                    </div>
                                                    <div class="item-old-price " style="margin-top: 12px; margin-bottom: 12px;">
                                                        تومان <strong class="money">{{$product['product_price']}}</strong>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="price-template" style="    display: flex;flex-direction: column;align-items: center;font-family: 'B Yekan'">
                                                    <div class="item-new-price input-element">
                                                        <strong class="money">{{$product['product_price']}}</strong> تومان
                                                    </div>
                                                    <div class="item-new-price money"  style="visibility: hidden">
                                                        تومان <strong class="money">{{$product['product_price']}}</strong>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="" style="text-align: center ; margin-top: 5px">
                                                <button class="btn btn-secondary basket-shopping" >
                                                    <i class="fa-solid fa-cart-shopping"></i>
                                                </button>

                                            </div>
                                        </div>
                                        <?php $isProductNew=Product::isProductNew($product['id']); ?>
                                        @if($isProductNew=="Yes")
                                            <div class="tag new">
                                                <span>جدید</span>
                                            </div>
                                        @endif
                                    </div>

                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
                @endif
                <!-- Similar-Products /- -->
                <!-- Recently-View-Products  -->
                @if($recentlyViewedProducts != null)
                <section class="section-maker">
                    <div class="container">
                        <div class="sec-maker-header text-center">
                            <h3 class="sec-maker-h3" style="font-family: 'B Yekan'">محصولات پر بازدید</h3>
                        </div>
                        <div class="slider-fouc">
                            <div class="products-slider owl-carousel" data-item="4">
                                @foreach($recentlyViewedProducts as $product)
                                    <div class="item" style="font-family: 'B Yekan'">
                                        <div class="image-container">
                                            <a class="item-img-wrapper-link" href="{{url('product/'.$product['id'])}}">
                                                @php($product_image_path='front/images/product_images/small/'.$product['product_image'])
                                                @if(!empty($product['product_image']) && file_exists($product_image_path))
                                                    <img class="img-fluid" src="{{asset($product_image_path)}}" alt="Product">
                                                @else
                                                    <img class="img-fluid" src="{{asset('front/images/product_images/small/no-image.png')}}" alt="Product">
                                                @endif
                                            </a>
                                            <div class="item-action-behaviors">
                                                <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick Look</a>
                                                <a class="item-mail" href="javascript:void(0)">Mail</a>
                                                <a class="item-addwishlist" href="javascript:void(0)">Add to Wishlist</a>
                                                <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                                            </div>
                                        </div>

                                        <div class="item-content">
                                            <div class="what-product-is" style="text-align: center">
                                            <!--                        <ul class="bread-crumb">
                            <li class="has-separator">
                                <a href="shop-v1-root-category.html">{{$product['product_code']}}</a>
                            </li>
                            <li class="has-separator">
                                <a href="listing.html">{{$product['product_color']}}</a>
                            </li>
                            <li >
                                <a href="listing.html">{{$product['brand']['name']}}</a>
                            </li>
                        </ul>-->
                                                <h6 class="item-title">
                                                    <a href="single-product.html">{{$product['product_name']}}</a>
                                                </h6>
                                                <div class="item-description">
                                                    <p>{{$product['description']}}</p>
                                                </div>
                                                <!--                        <div class="item-stars">
                                                                            <div class='star' title="4.5 out of 5 - based on 23 Reviews">
                                                                                <span style='width:67px'></span>
                                                                            </div>
                                                                            <span>(23)</span>
                                                                        </div>-->
                                            </div>

                                            <?php
                                            $getDiscoutnPrice=Product::getDiscountPrice($product['id']);
                                            ?>
                                            @if($getDiscoutnPrice>0)
                                                <div class="price-template" style="display: flex;flex-direction: column;align-items: center;font-family: 'B Yekan'">

                                                    <div class="item-new-price">
                                                        تومان <strong class="money">{{$getDiscoutnPrice}}</strong>
                                                    </div>
                                                    <div class="item-old-price " style="margin-top: 12px; margin-bottom: 12px;">
                                                        تومان <strong class="money">{{$product['product_price']}}</strong>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="price-template" style="    display: flex;flex-direction: column;align-items: center;font-family: 'B Yekan'">
                                                    <div class="item-new-price input-element">
                                                        <strong class="money">{{$product['product_price']}}</strong> تومان
                                                    </div>
                                                    <div class="item-new-price money"  style="visibility: hidden">
                                                        تومان <strong class="money">{{$product['product_price']}}</strong>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="" style="text-align: center ; margin-top: 5px">
                                                <button class="btn btn-secondary basket-shopping" >
                                                    <i class="fa-solid fa-cart-shopping"></i>
                                                </button>

                                            </div>
                                        </div>
                                        <?php $isProductNew=Product::isProductNew($product['id']); ?>
                                        @if($isProductNew=="Yes")
                                            <div class="tag new">
                                                <span>جدید</span>
                                            </div>
                                        @endif
                                    </div>

                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
            @endif
                <!-- Recently-View-Products /- -->
            </div>
            <!-- Different-Product-Section /- -->
        </div>
    </div>
    <!-- Single-Product-Full-Width-Page /- -->

@endsection
<script>
    import Options from "../../../../public/admin/dist/js/plugins/chartjs2/docs/general/options.html";

    export default {
        components: {Options}
    }

</script>
