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
<!-- Main-Slider /- -->
<!-- Banner-Layer -->
@if(isset($fixBanner[0]['image']))
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
<!-- Top Collection -->
<section class="section-maker">
    <div class="container">
        <div class="sec-maker-header text-center">
            <h3 class="sec-maker-h3">TOP COLLECTION</h3>
            <ul class="nav tab-nav-style-1-a justify-content-center">
                <li class="nav-item" v-on:click="test">
                    <a class="nav-link active" data-toggle="tab" href="#men-latest-products">محصولات جدید</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#men-best-selling-products">بیشترین فروش</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#discounted-products">محصولات با تخفیف </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#men-featured-products">محصولات آینده </a>
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
@endif
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
                            Great Value
                        </h2>
                        <p>We offer competitive prices on our 100 million plus product range</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="single-item-wrapper">
                        <div class="single-item-icon">
                            <i class="ion ion-md-cash"></i>
                        </div>
                        <h2>
                            Shop with Confidence
                        </h2>
                        <p>Our Protection covers your purchase from click to delivery</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="single-item-wrapper">
                        <div class="single-item-icon">
                            <i class="ion ion-ios-card"></i>
                        </div>
                        <h2>
                            Safe Payment
                        </h2>
                        <p>Pay with the world’s most popular and secure payment methods</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="single-item-wrapper">
                        <div class="single-item-icon">
                            <i class="ion ion-md-contacts"></i>
                        </div>
                        <h2>
                            24/7 Help Center
                        </h2>
                        <p>Round-the-clock assistance for a smooth shopping experience</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Site-Priorities /- -->
@endsection
