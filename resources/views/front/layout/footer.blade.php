<footer class="footer" style="background-color: #111111;">
    <div class="container">
        <!-- Outer-Footer -->
        <div class="outer-footer-wrapper u-s-p-y-80" style="color: white;font-family: ">
            <h5 style="color: white;font-family: 'B Yekan'">

                برای مطلع شدن از فروش ویژه و تخفیفات
            </h5>
            <h1 style="color: white;font-family: 'B Yekan'">
               اشتراک در خبرنامه پارس اگزوز
            </h1>
            <p style="color: white;font-family: 'B Yekan'">
                برای دریافت جدید ترین محصولات و تخفیفات ایمیل خودرا وارد کنید
            </p>
            <form class="newsletter-form">
                @csrf
                <label class="sr-only" for="newsletter-field">Enter your Email</label>
                <input type="text" id="subscriber_email" placeholder="ایمیل آدرس شما" name="subscriber_email" required style="background-color: white">
                <button type="button" class="button" onclick="addSubscriber()"  style="color: black;font-family: 'B Yekan'">اشتراک</button>
            </form>
        </div>
        <!-- Outer-Footer /- -->
        <!-- Mid-Footer -->
        <div class="mid-footer-wrapper u-s-p-b-80">
            <div class="row" style="text-align: end;">
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="footer-list">
                        <h6 style="color: white;font-family: 'B Yekan'">شرکت</h6>
                        <ul style="color: white;font-family: 'B Yekan'">
                            <li>
                                <a href="{{url('about-us')}}">درباره ما</a>
                            </li>
                            <li>
                                <a href="{{url('contact')}}">تماس با ما</a>
                            </li>
                            <li>
                                <a href="{{url('faq')}}">سوالات متداول</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="footer-list">
                        <h6 style="color: white;font-family: 'B Yekan'">دسته بندی محصولات</h6>
                        <ul style="color: white;font-family: 'B Yekan'">
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
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="footer-list">
                        <h6 style="color: white;font-family: 'B Yekan'">حساب کاربری</h6>
                        <ul style="color: white;font-family: 'B Yekan'">
                            <li>
                                <a href="{{url('user/account')}}">حساب من</a>
                            </li>
                        <!--                                    <li>
                                        <a href="{{url('about-us')}}">My Profile</a>
                                    </li>-->
                            <li>
                                <a href="{{url('user/orders')}}">سفارشات من</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="footer-list">
                        <h6 style="color: white;font-family: 'B Yekan'">تماس با ما</h6>
                        <ul style="color: white;font-family: 'B Yekan'">
                            <li>

                                <span>Stack Developers Youtube Channel</span>
                                <i class="fas fa-location-arrow u-s-m-r-9"></i>
                            </li>
                            <li>
                                <a href="tel:+111-222-333">

                                    <span> 021-44984041</span>
                                    <i class="fas fa-phone u-s-m-r-9"></i>
                                </a>
                            </li>
                            <li>
                                <a href="mailto:info@sitemakers.in">

                                    <span>
                                            info@parsegzoz.com</span>
                                    <i class="fas fa-envelope u-s-m-r-9"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mid-Footer /- -->
        <!-- Bottom-Footer -->
        <div class="bottom-footer-wrapper">
            <div class="social-media-wrapper">
                <ul class="social-media-list" >
                    <li>
                        <a target="_blank" href="#">
                            <i class="fab fa-facebook-f" style="color: white"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="#">
                            <i class="fab fa-twitter" style="color: white"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="#">
                            <i class="fab fa-google-plus-g" style="color: white"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="#">
                            <i class="fas fa-rss" style="color: white"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="#">
                            <i class="fab fa-pinterest" style="color: white"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="#">
                            <i class="fab fa-linkedin-in" style="color: white"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="#">
                            <i class="fab fa-youtube" style="color: white"></i>
                        </a>
                    </li>
                </ul>
            </div>
<!--            <p class="copyright-text">Copyright &copy; 2022
                <a target="_blank" rel="nofollow" href="https://youtube.com/stackdevelopers">Stack Developers</a> | All Right Reserved</p>-->
        </div>
    </div>
    <!-- Bottom-Footer /- -->
</footer>
