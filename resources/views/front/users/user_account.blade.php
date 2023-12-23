@extends('front.layout.layouts')
@section('content')
    <!-- Page Introduction Wrapper -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>Account</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="index.html">Home</a>
                    </li>
                    <li class="is-marked">
                        <a href="account.html">Account</a>
                    </li>
                </ul>
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
                <div class="col-lg-6" >
                    <div class="login-wrapper">
                        <h2 class="account-h2 u-s-m-b-20" style="text-align: right;direction: rtl"> بروز رسانی اطلاعات تماس : </h2>
                        <h6 class="account-h6 u-s-m-b-30" style="text-align: right;direction: rtl">  باسلام به حساب کاربری خود وارد شوید. </h6>
                        <p id="account-success"></p>
                        <p id="account-error"></p>

                        <form id="accountForm" action="javascript:;" method="post">
                            @csrf
                            <div class="u-s-m-b-30" style="text-align: right;direction: rtl">
                                <label for="user-email" >ایمیل :
                                    <span class="astk">*</span>
                                </label>
                                <input class="text-field" value="{{Auth::user()->email}}" disabled style="background-color: #e3e3e3">
                                <p id="login-email"></p>
                            </div>
                            <div class="u-s-m-b-30" style="text-align: right;direction: rtl">
                                <label for="user-name" >نام :
                                    <span class="astk">*</span>
                                </label>
                                <input class="text-field" id="user-name" name="name" value="{{Auth::user()->name}}" >
                                <p id="account-name"></p>


                            </div>
                            <div class="u-s-m-b-30" style="text-align: right;direction: rtl">
                                <label for="user-address" >آدرس :
                                    <span class="astk">*</span>
                                </label>
                                <input class="text-field" id="user-address" name="address" value="{{Auth::user()->address}}" >
                                <p id="account-address"></p>

                            </div>
                            <div class="u-s-m-b-30" style="text-align: right;direction: rtl">
                                <label for="user-city" >شهر :
                                    <span class="astk">*</span>
                                </label>
                                <input class="text-field" id="user-city" name="city" value="{{Auth::user()->city}}" >
                                <p id="account-city"></p>

                            </div>
                            <div class="u-s-m-b-30" style="text-align: right;direction: rtl">
                                <label for="user-state" >استان :
                                    <span class="astk">*</span>
                                </label>
                                <input class="text-field" id="user-state" name="state" value="{{Auth::user()->state}}" >
                                <p id="account-state"></p>

                            </div>
                            <div class="u-s-m-b-30" style="text-align: right;direction: rtl">
                                <label for="user-country" >کشور :
                                    <span class="astk">*</span>
                                </label>
                                <select class="text-field" name="country" id="user_country">
                                    <option value="">انتخاب کشور</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country['country_name']}} "
                                                @if(isset($country['country_name']) && $country['country_name']==Auth::user()->country)selected @endif

                                        >{{$country['country_name']}}</option>

                                    @endforeach
                                </select>
                                <p id="account-country"></p>
                            </div>
                            <div class="u-s-m-b-30" style="text-align: right;direction: rtl">
                                <label for="user-pincode" >کدپستی :
                                    <span class="astk">*</span>
                                </label>
                                <input class="text-field" id="user-pincode" name="pincode" value="{{Auth::user()->pincode}}" >
                                <p id="account-pincode"></p>

                            </div>
                            <div class="u-s-m-b-30" style="text-align: right;direction: rtl">
                                <label for="user-mobile" >موبایل :
                                    <span class="astk">*</span>
                                </label>
                                <input class="text-field" id="user-mobile" name="mobile" value="{{Auth::user()->mobile}}" >
                                <p id="account-mobile"></p>

                            </div>
                            <div class="u-s-m-b-30" style="text-align: right;direction: rtl">
                                <div class="m-b-45">
                                    <button class="button button-outline-secondary w-100">بروزرسانی</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- Login /- -->
                <!-- Register -->
                <div class="col-lg-6">
                    <div class="reg-wrapper">
                        <h2 class="account-h2 u-s-m-b-20">بروزرسانی رمز عبور :</h2>
                        <p id="register-success"></p>
                        <form id="registerForm" action="javascript:;" method="POST">
                            @csrf
                            <div class="u-s-m-b-30">
                                <label for="username">پسورد فعلی :
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="user-name" name="name" class="text-field"
                                       placeholder="user Name">
                                <p id="register-name"></p>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="usermobile"> پسورد جدید :
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="user-mobile" name="mobile" class="text-field"
                                       placeholder="user Mobile">
                                <p id="register-mobile"></p>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="useremail">تکرار پسورد جدید :
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="user-email" name="email" class="text-field"
                                       placeholder="user Email">
                                <p id="register-email"></p>
                            </div>

                            <div class="u-s-m-b-45">
                                <button class="button button-primary w-100">بروزرسانی</button>
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
