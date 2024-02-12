@extends('front.layout.layouts')
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
                    <h2 style="text-align: center">حساب کاربری</h2>
                    <ul class="bread-crumb" style="text-align: center">
                        <li class="has-separator" >
                            <i class="ion ion-md-home"></i>
                            <a href="index.html">صفحه اصلی</a>
                        </li>
                        <li class="is-marked">
                            <a href="account.html">حساب کاربری</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Introduction Wrapper /- -->
    <!-- Account-Page -->
    <div class="container" style="direction: rtl;text-align: center;font-family: 'B Yekan'">
        <div class="card text-white bg-warning mb-3" style="max-width: 100%;">
            <div class="card-header">با سلام و خوش آمدگویی به شما بازدید کننده محترم</div>
            <div class="card-body">
                <h5 class="card-title">این بخش مخصوص ثبت نام و ورود فروشندگان سایت می باشد</h5>
                <p class="card-text">برای ثبت نام یا وردو به عنوان کاربر وارد لینک زیر شوید</p>
                <a href="{{url('/user/login-register')}}">
                    <button type="button" class="btn btn-secondary">ورود به بخش کابران</button>
                </a>

            </div>

        </div>

    </div>
    <div class="page-account u-s-p-t-10" style="direction: rtl;text-align: right;font-family: 'B Yekan'">

        <div class="container">
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
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>پیام خطا !</strong>
                    <?php echo implode('', $errors->all('<div>:message</div>')) ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="row">


                <!-- Login -->
                <div class="col-lg-6" >

                        <h2 class="account-h2 u-s-m-b-20" style="text-align: right;direction: rtl"> ورود: </h2>
                        <h6 class="account-h6 u-s-m-b-30" style="text-align: right;direction: rtl">  باسلام به حساب کاربری خود وارد شوید. </h6>
                        <form action="{{url('admin/login')}}" method="post">
                            @csrf
                            <div class="u-s-m-b-30" style="text-align: right;direction: rtl">
                                <label for="user-name-email" >ایمیل :
                                    <span class="astk">*</span>
                                </label>
                                <input type="email" name="email" id="email" id="vendor-email" class="text-field"
                                       placeholder="ایمیل">
                            </div>
                            <div class="u-s-m-b-30" style="text-align: right;direction: rtl">
                                <label for="login-password">کلمه عبور :
                                    <span class="astk">*</span>
                                </label>
                                <input  type="password" name="password" id="password" id="vendor-password" class="text-field" placeholder="کلمه عبور">
                            </div>
                            <div class="m-b-45">
                                <button class="button button-primary w-100">ورود </button>

                            </div>
                        </form>

                </div>
                <!-- Login /- -->
                <!-- Register -->
                <div class="col-lg-6">
                    <div class="reg-wrapper">
                        <h2 class="account-h2 u-s-m-b-20">ثبت نام</h2>
                        <h6 class="account-h6 u-s-m-b-30">برای دسترسی به پنل کاربری ثبت نام کنید</h6>
                        <form id="vendorForm" action="{{url('/vendor/register')}}" method="post">
                            @csrf
                            <div class="u-s-m-b-30">
                                <label for="vendorname">نام :
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="vendorname" name="name" class="text-field"
                                       placeholder="نام فروشنده">
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="vendormobile"> موبایل :
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="vendormobile" name="mobile" class="text-field"
                                       placeholder="موبایل فروشنده">
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="vendoremail">ایمیل
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="vendoremail" name="email" class="text-field"
                                       placeholder="ایمیل فروشنده">
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="vendorpassword">کلمه عبور
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="vendorpassword" name="password" class="text-field"
                                       placeholder="کلمه عبور فروشنده">
                            </div>
                            <div class="u-s-m-b-30">
                                <input type="checkbox" class="check-box" id="accept" name="accept">
                                پذیرفتن قوانین
                            </div>
                            <div class="u-s-m-b-45">
                                <button class="button button-primary w-100">ثبت نام</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Register /- -->
            </div>
        </div>
    </div>
    <!-- Account-Page /- -->



@endsection
