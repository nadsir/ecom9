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
    <div class="page-account u-s-p-t-80">
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
                <div class="col-lg-6" style="text-align: right;direction: rtl;font-family: 'B Yekan'">
                    <div class="login-wrapper">
                        <h2 class="account-h2 u-s-m-b-20" style="text-align: right;direction: rtl"> ورود: </h2>
                        <h6 class="account-h6 u-s-m-b-30" style="text-align: right;direction: rtl">  باسلام به حساب کاربری خود وارد شوید. </h6>
                        <p class="alert alert-danger" id="login-error" style="display: none" role="alert">
                        </p>

                        <form id="loginForm" action="javascript:;" method="post">
                            @csrf
                            <div class="u-s-m-b-30" style="text-align: right;direction: rtl">
                                <label for="user-name-email" >ایمیل :
                                    <span class="astk">*</span>
                                </label>
                                <input type="email" name="email" id="users-email" id="user-email" class="text-field"
                                       placeholder="ایمیل">
                                <p class="alert alert-danger" id="login-email" style="display: none" role="alert">
                                </p>

                            </div>
                            <div class="u-s-m-b-30" style="text-align: right;direction: rtl">
                                <label for="login-password">رمز عبور :
                                    <span class="astk">*</span>
                                </label>
                                <input type="password" name="password" id="users-password" id="user-password" class="text-field" placeholder="رمز عبور">
                                <p class="alert alert-danger" id="login-password" style="display: none" role="alert">
                                </p>

                            </div>
                            <div class="group-inline u-s-m-b-30">
<!--                                <div class="group-1">
                                    <input type="checkbox" class="check-box" id="remember-me-token">
                                    <label class="label-text" for="remember-me-token">Remember me</label>
                                </div>-->
                                <div class="group-2 text-right">
                                    <div class="page-anchor">
                                        <a href="{{url('user/forgot-password')}}">
                                            <i class="fas fa-circle-o-notch u-s-m-r-9"></i>پسورد خود را فراموش کرده اید ؟</a>
                                    </div>
                                </div>
                            </div>
                            <div class="m-b-45">
                                <button class="button button-primary w-100">ورود</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Login /- -->
                <!-- Register -->
                <div class="col-lg-6" style="text-align: right;direction: rtl;font-family: 'B Yekan'">
                    <div class="reg-wrapper">
                        <h2 class="account-h2 u-s-m-b-20">ثبت نام :</h2>
                        <h6 class="account-h6 u-s-m-b-30">برای ثبت سفارش و دسترسی به ناحیه کابری ثبت نام کنید</h6>
                        <p id="register-success"></p>
                        <form id="registerForm" action="javascript:;" method="POST">
                            @csrf
                            <div class="u-s-m-b-30">
                                <label for="username">نام کابری :
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="user-name" name="name" class="text-field"
                                       placeholder="نام کابری">
                                <p class="alert alert-danger" id="register-name" style="display: none" role="alert">
                                </p>

                            </div>
                            <div class="u-s-m-b-30">
                                <label for="usermobile"> موبایل :
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="user-mobile" name="mobile" class="text-field"
                                       placeholder="موبایل کاربر ">
                                <p class="alert alert-danger" id="register-mobile" style="display: none" role="alert">
                                </p>

                            </div>
                            <div class="u-s-m-b-30">
                                <label for="useremail">ایمیل
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="user-email" name="email" class="text-field"
                                       placeholder=" ایمیل کابر">
                                <p class="alert alert-danger" id="register-email" style="display: none" role="alert">
                                </p>

                            </div>
                            <div class="u-s-m-b-30">
                                <label for="userpassword">گذر واژه
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="user-password" name="password" class="text-field"
                                       placeholder=" گذر واژه کاربر">
                                <p class="alert alert-danger" id="register-password" style="display: none" role="alert">
                                </p>

                            </div>
                            <div class="u-s-m-b-30">
                                <input type="checkbox" class="check-box" id="accept" name="accept">
                                قوانین سایت را میپذ یرم
<!--                                <label class="label-text no-color" for="accept" name="accept">I’ve read and accept the
                                    <a href="terms-and-conditions.html" class="u-c-brand">terms & conditions</a>
                                </label>-->
                                <p class="alert alert-danger" id="register-accept" style="display: none" role="alert">
                                </p>
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
