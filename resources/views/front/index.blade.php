<?php
use App\Models\Product;
?>
@extends('front.layout.layouts')
@section('content')
<!-- Main-Slider -->
<div class="default-height ph-item">
    <div class="slider-main owl-carousel">
        @foreach($sliderBanner as $banner)
        <div class="bg-image" >
            <div class="slide-content" >
                <h1>
                    <a  @if(!empty($banner['link'])) href="{{ url($banner['link']) }}" @else href="javascript:;" @endif>
                    <img  title="{{ $banner['title'] }}" alt="{{ $banner['alt' ]}}" src="{{asset('front/images/banner_images/'.$banner['image'])}}">
                    </a>
                </h1>
                <h2>{{$banner['title']}}</h2>
            </div>
        </div>
        @endforeach

    </div>
</div>
<!-- Top Collection -->
<section class="section-maker">
    <div class="container">
        <div class="sec-maker-header text-center">
            <h3 class="sec-maker-h3" style="font-family: 'B Yekan';font-size: 25px;font-weight: bold;padding-top: 81px;padding-bottom: 20px;">بهترین مجموعه ها</h3>
            <ul class="nav tab-nav-style-1-a justify-content-center">
                <li class="nav-item" >
                    <a class="nav-link active" data-toggle="tab" href="#men-latest-products" style="font-family: 'B Yekan';font-size: 18px">محصولات جدید</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#men-best-selling-products" style="font-family: 'B Yekan';font-size: 18px">بیشترین فروش</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#discounted-products" style="font-family: 'B Yekan';font-size: 18px">محصولات با تخفیف </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#men-featured-products" style="font-family: 'B Yekan';font-size: 18px">محصولات آینده </a>
                </li>
            </ul>
        </div>
        <div class="wrapper-content">
            <div class="outer-area-tab">
                <div class="tab-content">
                    <div class="tab-pane active show fade" id="men-latest-products">
                        <div class="slider-fouc">
                            <div class="products-slider owl-carousel" data-item="4">
                                @foreach($newProducts as $product)
                                    <?php $product_image_path='front/images/product_images/small/'.$product['product_image']; ?>
                                    <div class="item">
                                        <div class="image-container">
                                            <a class="item-img-wrapper-link" href="{{url('product/'.$product['id'])}}">
                                                @if(!empty($product['product_image']) && file_exists($product_image_path))
                                                    <img class="img-fluid" src="{{asset($product_image_path)}}"
                                                         alt="Product">
                                                @else
                                                    <img class="img-fluid" src="{{asset('front/images/product_images/small/no-image.png')}}"
                                                         alt="Product">
                                                @endif
                                            </a>
                                            <div class="item-action-behaviors">
                                                <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick
                                                    Look
                                                </a>
                                                <a class="item-mail" href="javascript:void(0)">Mail</a>
                                                <a class="item-addwishlist" href="javascript:void(0)">Add to
                                                    Wishlist</a>
                                                <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <div class="what-product-is">
                                                <ul class="bread-crumb">
                                                    <li>
                                                        <a href="{{url('product/'.$product['id'])}}">{{$product['product_code']}}</a>
                                                    </li>
                                                </ul>
                                                <h6 class="item-title">
                                                    <a href="{{url('product/'.$product['id'])}}">{{$product['product_name']}}</a>
                                                </h6>
                                                <div class="item-stars">
                                                    <div class='star' title="0 out of 5 - based on 0 Reviews">
                                                        <span style='width:0'></span>
                                                    </div>
                                                    <span>(0)</span>
                                                </div>
                                            </div>
                                            @php($getDiscoutnPrice=Product::getDiscountPrice($product['id']))
                                            @if($getDiscoutnPrice>0)
                                                <div class="price-template">

                                                    <div class="item-new-price">
                                                        {{$getDiscoutnPrice}}  تومان
                                                    </div>
                                                    <div class="item-old-price">
                                                        {{$product['product_price']}} تومان
                                                    </div>
                                                </div>
                                            @else
                                                <div class="price-template">
                                                    <div class="item-old-price">
                                                        {{$product['product_price']}} تومان
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="tag new">
                                            <span>جدید</span>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane show fade" id="men-best-selling-products">
                        <div class="slider-fouc">
                            <div class="products-slider owl-carousel" data-item="4">
                                @foreach($bestSeller as $product)
                                    <?php $product_image_path='front/images/product_images/small/'.$product['product_image']; ?>
                                    <div class="item">
                                        <div class="image-container">
                                            <a class="item-img-wrapper-link" href="{{url('product/'.$product['id'])}}">
                                                @if(!empty($product['product_image']) && file_exists($product_image_path))
                                                    <img class="img-fluid" src="{{asset($product_image_path)}}"
                                                         alt="Product">
                                                @else
                                                    <img class="img-fluid" src="{{asset('front/images/product_images/small/no-image.png')}}"
                                                         alt="Product">
                                                @endif
                                            </a>
                                            <div class="item-action-behaviors">
                                                <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick
                                                    Look
                                                </a>
                                                <a class="item-mail" href="javascript:void(0)">Mail</a>
                                                <a class="item-addwishlist" href="javascript:void(0)">Add to
                                                    Wishlist</a>
                                                <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <div class="what-product-is">
                                                <ul class="bread-crumb">
                                                    <li>
                                                        <a href="{{url('product/'.$product['id'])}}">{{$product['product_code']}}</a>
                                                    </li>
                                                </ul>
                                                <h6 class="item-title">
                                                    <a href="{{url('product/'.$product['id'])}}">{{$product['product_name']}}</a>
                                                </h6>
                                                <div class="item-stars">
                                                    <div class='star' title="0 out of 5 - based on 0 Reviews">
                                                        <span style='width:0'></span>
                                                    </div>
                                                    <span>(0)</span>
                                                </div>
                                            </div>
                                            @php($getDiscoutnPrice=Product::getDiscountPrice($product['id']))
                                            @if($getDiscoutnPrice>0)
                                                <div class="price-template">

                                                    <div class="item-new-price">
                                                        {{$getDiscoutnPrice}}  تومان
                                                    </div>
                                                    <div class="item-old-price">
                                                        {{$product['product_price']}} تومان
                                                    </div>
                                                </div>
                                            @else
                                                <div class="price-template">
                                                    <div class="item-new-price">
                                                        {{$product['product_price']}} تومان
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="tag new">
                                            <span>NEW</span>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="discounted-products">
                        <div class="slider-fouc">
                            <div class="products-slider owl-carousel" data-item="4">
                                @foreach($discountedProduct as $product)
                                    <?php $product_image_path='front/images/product_images/small/'.$product['product_image']; ?>
                                    <div class="item">
                                        <div class="image-container">
                                            <a class="item-img-wrapper-link" href="{{url('product/'.$product['id'])}}">
                                                @if(!empty($product['product_image']) && file_exists($product_image_path))
                                                    <img class="img-fluid" src="{{asset($product_image_path)}}"
                                                         alt="Product">
                                                @else
                                                    <img class="img-fluid" src="{{asset('front/images/product_images/small/no-image.png')}}"
                                                         alt="Product">
                                                @endif
                                            </a>
                                            <div class="item-action-behaviors">
                                                <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick
                                                    Look
                                                </a>
                                                <a class="item-mail" href="javascript:void(0)">Mail</a>
                                                <a class="item-addwishlist" href="javascript:void(0)">Add to
                                                    Wishlist</a>
                                                <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <div class="what-product-is">
                                                <ul class="bread-crumb">
                                                    <li>
                                                        <a href="{{url('product/'.$product['id'])}}">{{$product['product_code']}}</a>
                                                    </li>
                                                </ul>
                                                <h6 class="item-title">
                                                    <a href="{{url('product/'.$product['id'])}}">{{$product['product_name']}}</a>
                                                </h6>
                                                <div class="item-stars">
                                                    <div class='star' title="0 out of 5 - based on 0 Reviews">
                                                        <span style='width:0'></span>
                                                    </div>
                                                    <span>(0)</span>
                                                </div>
                                            </div>
                                            @php($getDiscoutnPrice=Product::getDiscountPrice($product['id']))
                                            @if($getDiscoutnPrice>0)
                                                <div class="price-template">

                                                    <div class="item-new-price">
                                                        {{$getDiscoutnPrice}}  تومان
                                                    </div>
                                                    <div class="item-old-price">
                                                        {{$product['product_price']}} تومان
                                                    </div>
                                                </div>
                                            @else
                                                <div class="price-template">
                                                    <div class="item-new-price">
                                                        {{$product['product_price']}} تومان
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="tag new">
                                            <span>NEW</span>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="men-featured-products">
                        <div class="slider-fouc">
                            <div class="products-slider owl-carousel" data-item="4">
                                @foreach($featuredProduct as $product)
                                    <?php $product_image_path='front/images/product_images/small/'.$product['product_image']; ?>
                                    <div class="item">
                                        <div class="image-container">
                                            <a class="item-img-wrapper-link" href="{{url('product/'.$product['id'])}}">
                                                @if(!empty($product['product_image']) && file_exists($product_image_path))
                                                    <img class="img-fluid" src="{{asset($product_image_path)}}"
                                                         alt="Product">
                                                @else
                                                    <img class="img-fluid" src="{{asset('front/images/product_images/small/no-image.png')}}"
                                                         alt="Product">
                                                @endif
                                            </a>
                                            <div class="item-action-behaviors">
                                                <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick
                                                    Look
                                                </a>
                                                <a class="item-mail" href="javascript:void(0)">Mail</a>
                                                <a class="item-addwishlist" href="javascript:void(0)">Add to
                                                    Wishlist</a>
                                                <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <div class="what-product-is">
                                                <ul class="bread-crumb">
                                                    <li>
                                                        <a href="{{url('product/'.$product['id'])}}">{{$product['product_code']}}</a>
                                                    </li>
                                                </ul>
                                                <h6 class="item-title">
                                                    <a href="{{url('product/'.$product['id'])}}">{{$product['product_name']}}</a>
                                                </h6>
                                                <div class="item-stars">
                                                    <div class='star' title="0 out of 5 - based on 0 Reviews">
                                                        <span style='width:0'></span>
                                                    </div>
                                                    <span>(0)</span>
                                                </div>
                                            </div>
                                            @php($getDiscoutnPrice=Product::getDiscountPrice($product['id']))
                                            @if($getDiscoutnPrice>0)
                                                <div class="price-template">

                                                    <div class="item-new-price">
                                                        {{$getDiscoutnPrice}}  تومان
                                                    </div>
                                                    <div class="item-old-price">
                                                        {{$product['product_price']}} تومان
                                                    </div>
                                                </div>
                                            @else
                                                <div class="price-template">
                                                    <div class="item-new-price">
                                                        {{$product['product_price']}} تومان
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="tag new">
                                            <span>NEW</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Top Collection /- -->
<!-- Main-Slider /- -->
<!-- Banner-Layer -->
<div class="container-fluid">
    <div class="row" style="background: url({{url(asset('front/images/banners/wall.jpg'))}});">
        <div class="col"></div>
        <div class="col">
            <p class="text-center" style="color: rgb(255,255,255);font-size: 22px;font-weight: bold;"><br>ارائه کلیه خدمات</p>
            <p class="text-center" style="color: rgb(255,255,255);font-size: 22px;font-weight: bold;line-height: 32px;">فروش اگزوزوکاتالیست</p>
            <p class="text-center" style="color: rgb(253,180,20);font-size: 19px;font-weight: bold;line-height: 32px;">(به قیمت کارخانه)</p>
            <p class="text-center" style="color: rgb(255,255,255);font-size: 22px;font-weight: bold;line-height: 32px;">بازدید ونصب اگزوز</p>
            <p class="text-center" style="color: rgb(253,180,20);font-size: 19px;font-weight: bold;line-height: 32px;">(رایگان)</p>
            <p class="text-center" style="color: rgb(255,255,255);font-size: 22px;font-weight: bold;line-height: 32px;">انواع اگزوز خودرو</p>
        </div>
        <div class="col">
            <div class="row">
                <div class="col text-center">
                    <p style="font-size: 22px;color: rgb(230,230,230);line-height: 20px;font-weight: bold;margin-top: 20px;"><br>واحد تحقیفات و خدمات مهندسی<br><br></p>
                </div>
            </div>
            <div class="row">
                <div class="col text-center"><img src="{{url(asset('front/images/banners/egzoz.png'))}}" style="width: 188px;"></div>
            </div>
            <div class="row">
                <div class="col text-center"><button class="btn btn-primary" type="button" style="background: #fdb414;font-size: 18px;font-weight: bold;padding-right: 30px;padding-left: 30px;margin-top: 37px;margin-bottom: 35px;">اطلاعات بیشتر</button></div>
            </div>
        </div>
        <div class="col"></div>
    </div>
</div>
{{--@if(isset($fixBanner[0]['image']))
<div class="banner-layer">
    <div class="container">
        <div class="image-banner">
            <a target="_blank" rel="nofollow" href="{{ url($fixBanner[0]['link']) }}"
               class="mx-auto banner-hover effect-dark-opacity">
                <img class="img-fluid" src="{{asset('front/images/banner_images/'.$fixBanner[0]['image'])}}" alt="{{$fixBanner[0]['alt']}}" title="{{$fixBanner[0]['title']}}">
            </a>
        </div>
    </div>
</div>
@endif

<!-- Banner-Layer /- -->

<!-- Banner-Layer -->
@if(isset($fixBanner[1]['image']))
    <div class="banner-layer">
        <div class="container">
            <div class="image-banner">
                <a target="_blank" rel="nofollow" href="{{url($fixBanner[1]['link'])}}"
                   class="mx-auto banner-hover effect-dark-opacity">
                    <img class="img-fluid" src="{{asset('front/images/banner_images/'.$fixBanner[1]['image'])}}" alt="{{$fixBanner[1]['title']}}">
                </a>
            </div>
        </div>
    </div>
@endif--}}
<!-- Banner-Layer /- -->
<!-- Site-Priorities -->
<section class="app-priority">
    <div class="container">
        <div class="priority-wrapper u-s-p-b-80">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="single-item-wrapper">
                        <div class="single-item-icon">
                            <i class="ion ion-md-star"></i>
                        </div>
                        <h2>
                            قیمت مناسب
                        </h2>
                        <p>  قیمت های رقابتی با سایر رقبا وتخفیفات ویژه و ارئه محصولات با کیقیت متفاوت </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="single-item-wrapper">
                        <div class="single-item-icon">
                            <i class="ion ion-md-cash"></i>
                        </div>
                        <h2>
                            خرید راحت و آسان
                        </h2>
                        <p>ارائه برترین تکنولوژی در خرید محصولات برای راحتی پروسه خرید توسط کابران</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="single-item-wrapper">
                        <div class="single-item-icon">
                            <i class="ion ion-ios-card"></i>
                        </div>
                        <h2>
                            امنیت در پرداخت
                        </h2>
                        <p>استفاده از امن ترین روش های پردخت برای سهولت در سفارش و خرید برای مشتریان</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="single-item-wrapper">
                        <div class="single-item-icon">
                            <i class="ion ion-md-contacts"></i>
                        </div>
                        <h2>
                            پشتیبانی 24 ساعته
                        </h2>
                        <p>ارائه خدمات پشتیبانی به صورت 24 ساعته برای راهنمایی و پاسخگویی مشتریان</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('front.main_slider.jquery_slider')
<!-- Site-Priorities /- -->
@endsection
