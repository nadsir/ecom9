<?php
use App\Models\Section;
$sections=Section::sections();
$totalCartItems=totalCartItems();
?>
<header>
    <!-- Top-Header -->
    <div class="full-layer-outer-header">
        <div class="container clearfix" style="font-family: 'B Yekan'">
            <nav>
                <ul class="primary-nav g-nav">
                    <li >
                        <a href="tel:09126612898" >
                            <strong >تلفن تماس</strong> : 021-44984041
                        <i class="fas fa-phone u-c-brand u-s-m-r-9"></i>
                        </a>
                    </li>
                    <li >
                        <a href="mailto:info@sitemakers.in" style="text-align: right;direction: rtl" >
                            <i class="fas fa-envelope u-c-brand u-s-m-r-9"></i>
                            <strong> ایمیل</strong> : info@parsegzoz.com

                        </a>
                    </li>
                </ul>
            </nav>
            <nav>
                <ul class="secondary-nav g-nav ">
                    <li>

                        <a style="display: flex; align-items: center;" >
                            <i class="fas fa-chevron-down u-s-m-l-9" style="right: 5px"></i>
                            @if(Auth::check())حساب کاربر من@elseورود / ثبت نام@endif
                                <i class="ion ion-md-contact" style="padding-left: 5px;"></i>

                        </a>
                        <ul class="g-dropdown" style="width:200px">
                            <li>
                                <a href="{{url('cart')}}">

                                    سبد خرید من<i class="fas fa-cog u-s-m-r-9"></i></a>
                            </li>
<!--                            <li>
                                <a href="wishlist.html">
                                    <i class="far fa-heart u-s-m-r-9"></i>
                                    My Wishlist</a>
                            </li>-->
                            <li>
                                <a href="{{url('checkout')}}">

                                    پرداخت<i class="far fa-check-circle u-s-m-r-9"></i></a>
                            </li>
                            @if(Auth::check())
                                <li>
                                    <a href="{{url("user/account")}}">

                                       حساب کاربری من<i class="fas fa-sign-in-alt u-s-m-r-9"></i></a>
                                </li>
                                <li>
                                    <a href="{{url("user/orders")}}">

                                        سفارشات من<i class="fas fa-sign-in-alt u-s-m-r-9"></i></a>
                                </li>
                                <li>
                                    <a href="{{url("user/logout")}}">
                                        خروج<i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                        </a>
                                </li>
                            @else
                            <li>
                                <a href="{{url("user/login-register")}}">

                                    ورود خریداران  <i class="fas fa-sign-in-alt u-s-m-r-9"></i></a>
                            </li>
                            <li>
                                <a href="{{url("vendor/login-register")}}">

                                    ورود فروشندگان <i class="fas fa-sign-in-alt u-s-m-r-9"></i></a>
                            </li>
                            @endif
                        </ul>
                    </li>
<!--                    <li>
                        <a>USD
                            <i class="fas fa-chevron-down u-s-m-l-9"></i>
                        </a>
                        <ul class="g-dropdown" style="width:90px">
                            <li>
                                <a href="#" class="u-c-brand">($) USD</a>
                            </li>
                            <li>
                                <a href="#">(£) GBP</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a>ENG
                            <i class="fas fa-chevron-down u-s-m-l-9"></i>
                        </a>
                        <ul class="g-dropdown" style="width:70px">
                            <li>
                                <a href="#" class="u-c-brand">ENG</a>
                            </li>
                            <li>
                                <a href="#">ARB</a>
                            </li>
                        </ul>

                -->
                </ul>
            </nav>
        </div>
    </div>
    <!-- Top-Header /- -->
    <!-- Mid-Header -->
    <div class="full-layer-mid-header">
        <div class="container">
            <div class="row clearfix align-items-center">

                <div class="col-lg-3 col-md-6 col-sm-6 order-3 order-sm-1 order-md-1 order-lg-1 order-xl-1">
                    <nav>
                        <ul class="mid-nav g-nav">
                            <li class="u-d-none-lg">
                                <a href="{{url('/')}}">
                                    <i class="ion ion-md-home u-c-brand"></i>
                                </a>
                            </li>
                            <!--                            <li class="u-d-none-lg">
                                                            <a href="wishlist.html">
                                                                <i class="far fa-heart"></i>
                                                            </a>
                                                        </li>-->
                            <li>
                                <a id="mini-cart-trigger">
                                    <i class="ion ion-md-basket"></i>
                                    <span class="item-counter totalCartItems">{{$totalCartItems}}</span>
                                    <!--                                    <span class="item-price">$220.00</span>-->
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-6 u-d-none-lg order-2 order-sm-2 order-md-2 order-lg-2 order-xl-2">
                    <form class="form-searchbox" action="{{url('/search-products')}}" method="get">
                        <label class="sr-only" for="search-landscape">Search</label>
                        <input name="search" id="search-landscape" type="text" class="text-field" placeholder="جستجو همه موارد"
                        @if  (isset($_REQUEST['search']) && !empty($_REQUEST['search'])) value="{{$_REQUEST['search']}}" @endif
                        >
                        <div class="select-box-position">
                            <div class="select-box-wrapper select-hide">
                                <label class="sr-only" for="select-category">Choose category for search</label>
                                <select class="select-box" id="select-category" name="section_id">
                                    <option  value="">
                                       همه دسته بندی ها
                                    </option>

                                    @foreach($sections as $section)
                                    <option  @if  (isset($_REQUEST['section_id']) && !empty($_REQUEST['section_id']) && $_REQUEST['section_id']==$section['id']) selected @endif value="{{$section['id']}}" >{{$section['name']}}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button id="btn-search" type="submit" class="button button-primary fas fa-search"></button>
                    </form>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 order-1 order-sm-3 order-md-3 order-lg-3 order-xl-3">
                    <div class="brand-logo text-lg-center">
                        <a href="{{url('/')}}">
                            <img src="{{asset('front/images/main-logo/parsegzoz-logo-header.png')}}" alt="Stack Developers" class="app-brand-logo">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mid-Header /- -->
    <!-- Responsive-Buttons -->
    <div class="fixed-responsive-container">
        <div class="fixed-responsive-wrapper">
            <button type="button" class="button fas fa-search" id="responsive-search"></button>
        </div>
<!--        <div class="fixed-responsive-wrapper">
            <a href="wishlist.html">
                <i class="far fa-heart"></i>
                <span class="fixed-item-counter">4</span>
            </a>
        </div>-->
    </div>
    <!-- Responsive-Buttons /- -->
    <div id="appendHeaderCartItems">
        @include('front.layout.header_cart_items')
    </div>

    <!-- Bottom-Header -->
    <div class="full-layer-bottom-header">
        <div class="container">
            <div class="row align-items-center" style="flex-direction: row-reverse;">
                <div class="col-lg-3">
                    <div class="v-menu v-close">
                            <span class="v-title" style="font-size: 18px">

                                کلیه دسته بند های
                                 <i class="ion ion-md-menu"></i>
                                <i class="fas fa-angle-down"></i>
                            </span>
                        <nav>
                            <div class="v-wrapper">
                                <ul class="v-list animated fadeIn">
                                    @foreach($sections as $section)
                                        @if(count($section['categories'])>0)
                                    <li class="js-backdrop">
                                        <a href="javascript:;">
                                            <strong class="tex-section-menu" >{{$section['name']}}</strong>

                                            <i class="ion-ios-add-circle"></i>
                                            <i class="ion ion-ios-arrow-back"></i>
                                        </a>
                                        <button class="v-button ion ion-md-add"></button>
                                        <div class="v-drop-right" style="width: 700px;">
                                            <div class="row" style="justify-content: flex-end;text-align: end;">
                                                @foreach($section['categories'] as $category)
                                                <div class="col-lg-4">
                                                    <ul class="v-level-2">
                                                        <li>

                                                            <a href="/{{$category['url']}}">{{$category['category_name']}}</a>

                                                            <ul>
                                                                @foreach($category['subcategories'] as $subcategories)
                                                                <li>
                                                                    <a href="/{{$subcategories['url']}}">{{$subcategories['category_name']}}</a>

                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </li>
                                        @endif

                                    @endforeach

                                    <li class="js-backdrop v-none" style="display: none">
                                        <a href="shop-v1-root-category.html">

                                            Accessories
                                            <i class="ion ion-md-rocket"></i>
                                            <i class="ion ion-ios-arrow-back"></i>
                                        </a>
                                        <button class="v-button ion ion-md-add"></button>
                                        <div class="v-drop-right" style="width: 700px;">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <ul class="v-level-2">
                                                        <li>
                                                            <a href="listing.html">Watches</a>
                                                            <ul>
                                                                <li>
                                                                    <a href="shop-v3-sub-sub-category.html">Casual Watches</a>
                                                                </li>
                                                                <li>
                                                                    <a href="shop-v3-sub-sub-category.html">Formal Watches
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-4">
                                                    <ul class="v-level-2">
                                                        <li>
                                                            <a href="listing.html">Belts</a>
                                                            <ul>
                                                                <li>
                                                                    <a href="shop-v3-sub-sub-category.html">Casual Belts</a>
                                                                </li>
                                                                <li>
                                                                    <a href="shop-v3-sub-sub-category.html">Leather Belts
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-9">
                    <ul class="bottom-nav g-nav u-d-none-lg" style="display: flex;font-family: 'B Yekan'; flex-direction: row-reverse; justify-content: space-evenly;">
                        <li>
                            <a href="{{url('search-products?search=new-arrivals')}}" style="'">محصولات جدید
                                <span class="superscript-label-new">جدید</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('search-products?search=best-sellers')}}">بیشترین فروش
                                <span class="superscript-label-hot">بهترین</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('search-products?search=featured')}}">محصولات آینده
                            </a>
                        </li>
                        <li>
                            <a href="{{url('search-products?search=discounted')}}">تخفیف
                                <span class="superscript-label-discount">-30%</span>
                            </a>
                        </li>
                        <li class="mega-position">
                            <a>بیشتر
                                <i class="fas fa-chevron-down u-s-m-l-9"></i>
                            </a>
                            <div class="mega-menu mega-3-colm">
                                <ul>
                                    <li class="menu-title">اطلاعات شرکت</li>
                                    <li>
                                        <a href="{{url('about-us')}}" class="u-c-brand">درباره ما</a>
                                    </li>
                                    <li>
                                        <a href="{{url('contact')}}">تماس با ما</a>
                                    </li>
                                    <li>
                                        <a href="{{url('faq')}}">سوالات متداول</a>
                                    </li>
                                </ul>
                                <ul>
                                    <li class="menu-title">مجموعه محصولات</li>
                                    <li>
                                        <a href="{{url('men')}}">لباس مردانه</a>
                                    </li>
                                    <li>
                                        <a href="{{url('زنانه')}}">لباس زنانه</a>
                                    </li>
                                    <li>
                                        <a href="{{url('kids')}}">لباس بچگانه</a>
                                    </li>
                                </ul>
                                <ul>
                                    <li class="menu-title">حساب</li>
                                    <li>
                                        <a href="{{url('user/account')}}">حساب کاربر من</a>
                                    </li>
<!--                                    <li>
                                        <a href="{{url('about-us')}}">My Profile</a>
                                    </li>-->
                                    <li>
                                        <a href="{{url('user/orders')}}">سفارشات من</a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Bottom-Header /- -->
</header>
