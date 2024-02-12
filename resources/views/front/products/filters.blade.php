<?php
use App\Models\ProductsFilter;
$productFilters = ProductsFilter::productFilters();


?>

<div class="col-lg-3 col-md-3 col-sm-12 " style="text-align: right;direction: rtl;font-family: 'B Yekan'">

    <!-- Fetch-Categories-from-Root-Category  -->
    <div class="fetch-categories" v-on:click="test">

        <div id="main" style="margin-top: 15px">
            <div class="container">
                <div class="accordion" id="faq">
                    <div class="card">
                        <div class="card-header" style="box-shadow: 10px 10px 5px 0px rgba(255,255,255,1)!important;" >
                            <h3 class="title-name " style="padding: 12px">  اعمال فیلتر ها <i class="ion ion-ios-funnel" style="float: left"></i></h3>
                        </div>

                        <div style="margin-top: 55px">
                            <div class="card-body" style="padding: 0px!important;">
                            @if(!isset($_REQUEST['search']))
                                <!-- Filters -->
                                    <!-- Filter-Size -->
                                    <?php
                                    $getSizes = ProductsFilter::getSizes($url);
                                    ?>
                                    @if($getSizes != null && $getSizes[0] !="free")

                                        <div id="main">
                                            <div class="container" style="padding: 0px">
                                                <div class="accordion" id="faq">
                                                    <div class="card">
                                                        <div class="card-header" id="faqhead1">
                                                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#size"
                                                               aria-expanded="true" aria-controls="faq1">سایز</a>
                                                        </div>
                                                        <div id="size" class="collapse " aria-labelledby="faqhead1" data-parent="#faq">
                                                            <div class="card-body" style="">

                                                                @foreach($getSizes as $key=> $size)
                                                                    <input type="checkbox" class="check-box size" name="size[]" id="size{{$key}}" value="{{$size}}">
                                                                    <label style="margin-right:12px" for="size{{$key}}">{{$size}}
                                                                    <!--                    <span class="total-fetch-items">(2)</span>-->
                                                                    </label>
                                                                    <br>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                <!-- Filter-Size -->
                                    <!-- Filter-Color -->
                                    <?php
                                    $getColors = ProductsFilter::getColors($url);
                                    ?>
                                    @if($getColors != null && $getColors[0] !="free")
                                    <div id="main">
                                        <div class="container" style="padding: 0px">
                                            <div class="accordion" id="faq">
                                                <div class="card">
                                                    <div class="card-header" id="faqhead1">
                                                        <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#color"
                                                           aria-expanded="true" aria-controls="faq1">رنگ</a>
                                                    </div>
                                                    <div id="color" class="collapse " aria-labelledby="faqhead1" data-parent="#faq">
                                                        <div class="card-body">

                                                            @foreach($getColors as $key=>$color)
                                                                <input type="checkbox" class="check-box color" name="color[]" id="color{{$key}}" value="{{$color}}">
                                                                <label style="margin-right:12px" for="color{{$key}}">{{$color}}
                                                                <!--                    <span class="total-fetch-items">(1)</span>-->
                                                                </label>
                                                                <br>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    <?php
                                    $getBrands = ProductsFilter::getBrands($url);
                                    ?>
                                    <div id="main">
                                        <div class="container" style="padding: 0px">
                                            <div class="accordion" id="faq">
                                                <div class="card">
                                                    <div class="card-header" id="faqhead1">
                                                        <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#brnad"
                                                           aria-expanded="true" aria-controls="faq1">برند</a>
                                                    </div>
                                                    <div id="brnad" class="collapse " aria-labelledby="faqhead1" data-parent="#faq">
                                                        <div class="card-body">
                                                            @foreach($getBrands as $key=>$brand)
                                                                <div>
                                                                    <input  type="checkbox" class="check-box brand" name="brand[]" id="brand{{$key}}" value="{{$brand['id']}}">
                                                                    <label style="margin-right:12px" for="brand{{$key}}">{{$brand['name']}}</label>
                                                                </div>
                                                                <br>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Filter-price/- -->
                                    <div id="main">
                                        <div class="container" style="padding: 0px">
                                            <div class="accordion" id="faq">
                                                <div class="card">
                                                    <div class="card-header" id="faqhead1">
                                                        <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#price"
                                                           aria-expanded="true" aria-controls="faq1">قیمت</a>
                                                    </div>
                                                    <div id="price" class="collapse " aria-labelledby="faqhead1" data-parent="#faq">
                                                        <div class="card-body">
                                                            <?php $prices = array('0-1000', '1000-2000', '2000-5000', '5000-10000', '10000-100000'); ?>
                                                            @foreach($prices as $key=>$price)
                                                                <input type="checkbox" class="check-box price" id="price{{$key}}" name="price[]" value="{{$price}}">
                                                                <label style="margin-right:12px" for="price{{$key}}">  {{$price}}  تومان
                                                                    <!--                        <span class="total-fetch-items">(0)</span>-->
                                                                </label>
                                                                <br>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Filter -->


                                    <div id="main">
                                        <div class="container" style="padding: 0px">
                                            <div class="accordion" id="faq">

                                                @foreach($productFilters as $filter)
                                                    <?php
                                                    $filterAvailable = ProductsFilter::filterAvailable($filter['id'], $categoryDetails['categoryDetails']['id'])
                                                    ?>
                                                    @if($filterAvailable == "Yes")
                                                        @if(count($filter['filter_values'])>0)

                                                            <div class="card">
                                                                <div class="card-header" id="faqhead1">
                                                                    <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#{{$filter['id']}}"
                                                                       aria-expanded="true" aria-controls="faq1">{{$filter['filter_name']}}</a>
                                                                </div>
                                                                <form class="facet-form" action="#" method="post">
                                                                    <div id="{{$filter['id']}}" class="collapse " aria-labelledby="faqhead1" data-parent="#faq">
                                                                        <div class="card-body">
                                                                            @foreach($filter['filter_values'] as $value)
                                                                                <input type="checkbox" class="check-box {{$filter['filter_column']}}"
                                                                                       name="{{$filter['filter_column']}}[]" id="{{$value['filter_value']}}"
                                                                                       value="{{$value['filter_value']}}">
                                                                                <label style="margin-right:12px"
                                                                                       for="{{$value['filter_value']}}">{{ucwords($value['filter_value'])}}
                                                                                <!--                    <span class="total-fetch-items">(0)</span>-->
                                                                                </label>
                                                                                <br>
                                                                            @endforeach
                                                                        </div>

                                                                    </div>
                                                                </form>

                                                            </div>

                                                        @endif
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Level 1 -->
<!--        <h3 class="fetch-mark-category">
            <a href="listing.html">T-Shirts
                <span class="total-fetch-items">(5)</span>
            </a>
        </h3>
        <ul>
            <li>
                <a href="shop-v3-sub-sub-category.html">Casual T-Shirts
                    <span class="total-fetch-items">(3)</span>
                </a>
            </li>
            <li>
                <a href="listing.html">Formal T-Shirts
                    <span class="total-fetch-items">(2)</span>
                </a>
            </li>
        </ul>-->
        <!-- //end Level 1 -->
        <!-- Level 2 -->
<!--        <h3 class="fetch-mark-category">
            <a href="listing.html">Shirts
                <span class="total-fetch-items">(5)</span>
            </a>
        </h3>
        <ul>
            <li>
                <a href="shop-v3-sub-sub-category.html">Casual Shirts
                    <span class="total-fetch-items">(3)</span>
                </a>
            </li>
            <li>
                <a href="listing.html">Formal Shirts
                    <span class="total-fetch-items">(2)</span>
                </a>
            </li>
        </ul>-->
        <!-- //end Level 2 -->
    </div>


    <!-- Fetch-Categories-from-Root-Category  /- -->

    <?php /*
    <!-- Filter-Brand /- -->
    <!-- Filter-Price -->
    <div class="facet-filter-by-price">
        <h3 class="title-name">Price</h3>
        <form class="facet-form" action="#" method="post">
            <!-- Final-Result -->
            <div class="amount-result clearfix">
                <div class="price-from">$0</div>
                <div class="price-to">$3000</div>
            </div>
            <!-- Final-Result /- -->
            <!-- Range-Slider  -->
            <div class="price-filter"></div>
            <!-- Range-Slider /- -->
            <!-- Range-Manipulator -->
            <div class="price-slider-range" data-min="0" data-max="5000" data-default-low="0" data-default-high="3000" data-currency="$"></div>
            <!-- Range-Manipulator /- -->
            <button type="submit" class="button button-primary">Filter</button>
        </form>
    </div>
    <!-- Filter-Price /- -->
    <!-- Filter-Free-Shipping -->

    <div class="facet-filter-by-shipping">
        <h3 class="title-name">Shipping</h3>
        <form class="facet-form" action="#" method="post">
            <input type="checkbox" class="check-box" id="cb-free-ship">
            <label class="label-text" for="cb-free-ship">Free Shipping</label>
        </form>
    </div>
    <!-- Filter-Free-Shipping /- -->
    <!-- Filter-Rating -->
    <div class="facet-filter-by-rating">
        <h3 class="title-name">Rating</h3>
        <div class="facet-form">
            <!-- 5 Stars -->
            <div class="facet-link">
                <div class="item-stars">
                    <div class='star'>
                        <span style='width:76px'></span>
                    </div>
                </div>
                <span class="total-fetch-items">(0)</span>
            </div>
            <!-- 5 Stars /- -->
            <!-- 4 & Up Stars -->
            <div class="facet-link">
                <div class="item-stars">
                    <div class='star'>
                        <span style='width:60px'></span>
                    </div>
                </div>
                <span class="total-fetch-items">& Up (5)</span>
            </div>
            <!-- 4 & Up Stars /- -->
            <!-- 3 & Up Stars -->
            <div class="facet-link">
                <div class="item-stars">
                    <div class='star'>
                        <span style='width:45px'></span>
                    </div>
                </div>
                <span class="total-fetch-items">& Up (0)</span>
            </div>
            <!-- 3 & Up Stars /- -->
            <!-- 2 & Up Stars -->
            <div class="facet-link">
                <div class="item-stars">
                    <div class='star'>
                        <span style='width:30px'></span>
                    </div>
                </div>
                <span class="total-fetch-items">& Up (0)</span>
            </div>
            <!-- 2 & Up Stars /- -->
            <!-- 1 & Up Stars -->
            <div class="facet-link">
                <div class="item-stars">
                    <div class='star'>
                        <span style='width:15px'></span>
                    </div>
                </div>
                <span class="total-fetch-items">& Up (0)</span>
            </div>
            <!-- 1 & Up Stars /- -->
        </div>
    </div>
    <!-- Filter-Rating -->
    <!-- Filters /- -->
 */?>
</div>
