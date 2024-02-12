<!DOCTYPE html>
<html class="no-js" lang="en-US">

<head>
    <meta charset="UTF-8">
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{csrf_token()}}"/>
    <meta name="description" content="">
    <meta name="author" content="">
    <title>
        @if(!empty($meta_title))
            {{$meta_title}}
        @else
        Laravel Multi Vendor E-commerce Template - By Stack Developers Youtube Channel
        @endif
    </title>
    @if(!empty($meta_description))
        <meta name="description" content="{{$meta_description}}">
    @endif
    @if(!empty($meta_Keywords))
        <meta name="Keywords" content="{{$meta_Keywords}}">
    @endif
    <!-- Standard Favicon -->
    <link href="favicon.ico" rel="shortcut icon">
    <!-- Base Google Font for Web-app -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <!-- Google Fonts for Banners only -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,800" rel="stylesheet">
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="{{url('front/css/bootstrap.min.css')}}">
    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="{{url('front/css/fontawesome.min.css')}}">
    <!-- Ion-Icons 4 -->
    <link rel="stylesheet" href="{{url('front/css/ionicons.min.css')}}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{url('front/css/animate.min.css')}}">
    <!-- Owl-Carousel -->
    <link rel="stylesheet" href="{{url('front/css/owl.carousel.min.css')}}">
    <!-- Jquery-Ui-Range-Slider -->
    <link rel="stylesheet" href="{{url('front/css/jquery-ui-range-slider.min.css')}}">
    <!-- Utility -->
    <link rel="stylesheet" href="{{url('front/css/utility.css')}}">
    <!-- Main -->
    <link rel="stylesheet" href="{{url('front/css/bundle.css')}}">
    <!--zoom-->
    <link rel="stylesheet" href="{{url('front/css/easyzoom.css')}}">
    <!--custom-->
    <link rel="stylesheet" href="{{url('front/css/custom.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        @yield('collapse_filter_menu_css')
        span {cursor:pointer; }

        .minus, .plus{
            width:20px;
            height:34px;
            background:#f2f2f2;
            border-radius:4px;
            padding:3px 5px 8px 5px;
            border:1px solid #ddd;
            display: inline-block;
            vertical-align: middle;
            text-align: center;
            color: #fdb414;

        }
        .inputcounter {
            height: 34px;
            width: 100px;
            text-align: center;
            font-size: 26px;
            border: 1px solid #ddd;
            border-radius: 4px;
            display: inline-block;
            vertical-align: middle;
        }
        .minus-a, .plus-a{
            width:20px;
            height:34px;
            background:#f2f2f2;
            border-radius:4px;
            padding:3px 5px 8px 5px;
            border:1px solid #ddd;
            display: inline-block;
            vertical-align: middle;
            text-align: center;
            color: #fdb414 !important;

        }

        .swal2-container{
           font-family: "B Yekan";
        }

    </style>
    <script src="https://kit.fontawesome.com/ea3dc63fb4.js" crossorigin="anonymous"></script>
    @yield('jquery_slider_css')

</head>

<body>
<div class="loader">
    <img width="150px" src="{{asset('front/images/loaders/loader.gif')}}" alt="loading...." />
</div>

<!-- app -->
<div id="app">
    <!-- Header -->
@include('front.layout.header')

<!-- Header /- -->
    @yield('content')

    <!-- Footer -->
     @include('front.layout.footer')
       <!-- Footer /- -->
    @include('front.layout.models')

</div>
<!-- app /- -->
<!--[if lte IE 9]>
<div class="app-issue">
<div class="vertical-center">
    <div class="text-center">
        <h1>You are using an outdated browser.</h1>
        <span>This web app is not compatible with following browser. Please upgrade your browser to improve your security and experience.</span>
    </div>
</div>
</div>
<style> #app {
    display: none;
} </style>
<![endif]-->
<!-- NoScript -->
<noscript>
    <div class="app-issue">
        <div class="vertical-center">
            <div class="text-center">
                <h1>JavaScript is disabled in your browser.</h1>
                <span>Please enable JavaScript in your browser or upgrade to a JavaScript-capable browser.</span>
            </div>
        </div>
    </div>
    <style>
        #app {
            display: none;
        }
    </style>
</noscript>


<script>
    @yield('collapse_filter_menu_js')
</script>

<script type="text/javascript">

</script>

<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
<script>

    window.ga = function () {
        ga.q.push(arguments)
    };
    ga.q = [];
    ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto');
    ga('send', 'pageview')
</script>
<script src="https://www.google-analytics.com/analytics.js" async defer></script>
<!-- Modernizr-JS -->
<script type="text/javascript" src="{{url('front/js/vendor/modernizr-custom.min.js')}}"></script>
<!-- NProgress -->
<script type="text/javascript" src="{{url('front/js/nprogress.min.js')}}"></script>
<!-- jQuery -->
<script type="text/javascript" src="{{url('front/js/jquery.min.js')}}"></script>
<!-- Bootstrap JS -->
<script type="text/javascript" src="{{url('front/js/bootstrap.min.js')}}"></script>
<!-- Popper -->
<script type="text/javascript" src="{{url('front/js/popper.min.js')}}"></script>
<!-- ScrollUp -->
<script type="text/javascript" src="{{url('front/js/jquery.scrollUp.min.js')}}"></script>
<!-- Elevate Zoom -->
<script type="text/javascript" src="{{url('front/js/jquery.elevatezoom.min.js')}}"></script>
<!-- jquery-ui-range-slider -->
<script type="text/javascript" src="{{url('front/js/jquery-ui.range-slider.min.js')}}"></script>
<!-- jQuery Slim-Scroll -->
<script type="text/javascript" src="{{url('front/js/jquery.slimscroll.min.js')}}"></script>
<!-- jQuery Resize-Select -->
<script type="text/javascript" src="{{url('front/js/jquery.resize-select.min.js')}}"></script>
<!-- jQuery Custom Mega Menu -->
<script type="text/javascript" src="{{url('front/js/jquery.custom-megamenu.min.js')}}"></script>
<!-- jQuery Countdown -->
<script type="text/javascript" src="{{url('front/js/jquery.custom-countdown.min.js')}}"></script>
<!-- Owl Carousel -->
<script type="text/javascript" src="{{url('front/js/owl.carousel.min.js')}}"></script>
<!-- Main -->
<script type="text/javascript" src="{{url('front/js/app.js')}}"></script>

<script type="text/javascript" src="{{url('front/js/custom.js')}}"></script>

<!--zoom-->
<script type="text/javascript" src="{{url('front/js/easyzoom.js')}}"></script>

<script>
    // Instantiate EasyZoom instances
    var $easyzoom = $('.easyzoom').easyZoom();

    // Setup thumbnails example
    var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

    $('.thumbnails').on('click', 'a', function(e) {
        var $this = $(this);

        e.preventDefault();

        // Use EasyZoom's `swap` method
        api1.swap($this.data('standard'), $this.attr('href'));
    });

    // Setup toggles example
    var api2 = $easyzoom.filter('.easyzoom--with-toggle').data('easyZoom');

    $('.toggle').on('click', function() {
        var $this = $(this);

        if ($this.data("active") === true) {
            $this.text("Switch on").data("active", false);
            api2.teardown();
        } else {
            $this.text("Switch off").data("active", true);
            api2._init();
        }
    });
    $(document).ready(function() {
        $('.minus').click(function () {
            var $input = $(this).parent().find('input');
            var count = parseInt($input.val()) - 1;
            count = count < 1 ? 1 : count;
            $input.val(count);
            $input.change();
            return false;
        });
        $('.plus').click(function () {
            var $input = $(this).parent().find('input');
            $input.val(parseInt($input.val()) + 1);
            $input.change();
            return false;
        });
    });
</script>
@include('front.layout.scripts')
@yield('jquery_slider_js')
</body>
</html>
