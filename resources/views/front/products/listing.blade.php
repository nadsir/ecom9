<?php
use App\Models\Product;
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

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col" style="text-align: center">
                <div class="page-intro" style="font-family: 'B Yekan';text-align: right;direction: rtl">
                    <h2 style="text-align: center">فروشگاه</h2>
                    <ul class="bread-crumb" style="text-align: center" >
                        <li class="has-separator">
                            <i class="ion ion-md-home"></i>
                            <a href="index.html">صفحه اصلی</a>
                        </li>
                        <li class="is-marked" >
                            <a  href="cart.html">                   <?php
                                echo $categoryDetails['breadcrumb'];

                                ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Introduction Wrapper /- -->
    <!-- Shop-Page -->
    <div class="page-shop u-s-p-t-80">
        <div class="container-fluid">
            <!-- Shop-Intro -->
<!--            <div class="shop-intro">
                <ul class="bread-crumb" style="font-family: 'B Yekan'">
                    <li class="has-separator">
                        <a href="{{url('/')}}">خانه</a>
                    </li>
                   <?php
                   echo $categoryDetails['breadcrumb'];

                   ?>
                </ul>
            </div>-->
            <!-- Shop-Intro /- -->
            <div class="row"  id="frontApp">
                <!-- Shop-Left-Side-Bar-Wrapper -->
                <!-- Shop-Left-Side-Bar-Wrapper /- -->
                <!-- Shop-Right-Wrapper -->
                <div class="col-lg-9 col-md-9 col-sm-12 ">
                    <!-- Page-Bar -->
                    <div class="page-bar clearfix">
<!--                        <div class="shop-settings">
                            <a id="list-anchor" >
                                <i class="fas fa-th-list"></i>
                            </a>
                            <a id="grid-anchor" class="active">
                                <i class="fas fa-th"></i>
                            </a>
                        </div>-->
                        <!-- Toolbar Sorter 1  -->
                        @if(!isset($_REQUEST['search']))
                        <form action="" name="sortProducts" id="sortProducts">
                            <input type="hidden" name="url" value="{{$url}}" id="url">
                        <div class="toolbar-sorter">
                            <div class="select-box-wrapper">
                                <label class="sr-only" for="sort-by">Sort By</label>
                                <select name="sort" id="sort"  class="select-box" >
<!--                                    <option selected="selected" value="">Sort By: Best Selling</option>-->
                                    <option value="" selected=""> انتخاب کنید</option>
                                    <option value="product_latest" @if(isset($_GET['sort']) && $_GET['sort']=="product_latest") selected @endif>Sort By: Latest</option>
                                    <option value="price_lowest" @if(isset($_GET['sort']) && $_GET['sort']=="price_lowest") selected @endif>Sort By: Lowest Price</option>
                                    <option value="price_highest" @if(isset($_GET['sort']) && $_GET['sort']=="price_highest") selected @endif>Sort By: Highest Price</option>
                                    <option value="name_a_z" @if(isset($_GET['sort']) && $_GET['sort']=="name_a_z") selected @endif>Sort By: Name A - Z</option>
                                    <option value="name_z_a" @if(isset($_GET['sort']) && $_GET['sort']=="name_z_a") selected @endif>Sort By: Name Z - A</option>
<!--                                    <option value="">Sort By: Best Rating</option>-->
                                </select>
                            </div>
                        </div>
                        </form>
                        <!-- //end Toolbar Sorter 1  -->
                        @endif
                        <!-- Toolbar Sorter 2  -->
<!--                        <div class="toolbar-sorter-2">
                            <div class="select-box-wrapper">
                                <label class="sr-only" for="show-records">Show Records Per Page</label>
                                <select class="select-box" id="show-records">
                                    <option selected="selected" value="">Show: 8</option>
                                    <option value="">Show: 16</option>
                                    <option value="">Show: 28</option>
                                </select>
                            </div>
                        </div>-->
                        <div class="toolbar-sorter-2">
                            <div class="select-box-wrapper">
                                <label class="sr-only" for="show-records">Show Records Per Page</label>
                                <select class="select-box" id="show-records">
                                    <option selected="selected" value=""> نمایش: {{count($categoryProducts)}}</option>
                                    <option value="">نمایش همه</option>

                                </select>
                            </div>
                        </div>
                        <!-- //end Toolbar Sorter 2  -->
                    </div>
                    <!-- Page-Bar /- -->
                    <!-- Row-of-Product-Container -->
                    <div class="filter_products">
                        @include('front.products.ajax_products_listing')
                    </div>
                    @if(!isset($_REQUEST['search']))


                    @if(isset($_GET['sort']))
                        <div class="mt-3 mb-3" >{{$categoryProducts->appends(['sort'=>$_GET['sort']])->links()}}</div>
                    @else
                        <div class="mt-3 mb-3" >{{$categoryProducts->links()}}</div>
                    @endif
                    @endif
                    <div class="row" >
                        <div class="col" style="font-family: 'B Yekan';text-align: right;direction: rtl">
                            {{$categoryDetails['categoryDetails']['description']}}
                        </div>
                    </div>


                    <!-- Row-of-Product-Container /- -->
                </div >
            @include('front.products.filters')

            <!-- Shop-Right-Wrapper /- -->

                <!-- Shop-Pagination -->

                <!-- Shop-Pagination /- -->
            </div>
        </div>
    </div>
    <!-- Shop-Page /- -->

@section('collapse_filter_menu')

@endsection
@endsection
