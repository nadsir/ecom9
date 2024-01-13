<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('admin/dashboard')}}" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <div>
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    @if(!empty(Auth::guard('admin')->user()->image))
                        <img src="{{url('admin/images/photos/'.Auth::guard('admin')->user()->image)}}" class="img-circle elevation-2" alt="User Image">
                    @endif

                </div>
                <div class="info">
                    <a href="#" class="d-block">{{Auth::guard('admin')->user()->name}}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview menu-open">
                        <a href="{{url('admin/dashboard')}}" class="nav-link active">
                            <i class="nav-icon fa fa-dashboard"></i>
                            <p>
                                داشبوردها
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                    </li>
                    @if(Auth::guard('admin')->user()->type=="vendor")
                        <li class="nav-item has-treeview @if(Session::get('page')=='update_personal_details' || Session::get('page')=='update_business_details'  || Session::get('page')=='update_bank_details')menu-open @endif">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon fa fa-cogs"></i>
                                <p>
                                    تنظیمات فروشندگان
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview"
                                @if(Session::get('page')=='update_personal_details' || Session::get('page')=='update_business_details'  || Session::get('page')=='update_bank_details')style="display: block;" @endif>
                                <li class="nav-item">
                                    <a href="{{url('admin/update-vendor-details/personal')}}"
                                       class="nav-link  @if(Session::get('page')=='update_personal_details')active @endif">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>اطلاعات شخصی</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('admin/update-vendor-details/business')}}"
                                       class="nav-link @if(Session::get('page')=='update_business_details')active @endif">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>اطلاعات کاری</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('admin/update-vendor-details/bank')}}"
                                       class="nav-link @if(Session::get('page')=='update_bank_details')active @endif">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>اطلاعات بانکی</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview @if(Session::get('page')=='products')menu-open @endif">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon  fa fa-lock"></i>
                                <p>
                                    مدیرت فهرست ها
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview"
                                @if(Session::get('page')=='products' || Session::get('page')=='coupon')style="display: block;" @endif>
                                <li class="nav-item">
                                    <a href="{{url('admin/products')}}" class="nav-link @if(Session::get('page')=='products')active @endif">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>محصولات</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('admin/coupons')}}" class="nav-link @if(Session::get('page')=='coupon')active @endif">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>کوپن ها</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item has-treeview @if(Session::get('page')=='orders')menu-open @endif">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon  fa fa-lock"></i>
                                <p>
                                    مدیرت سفارشات
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview"
                                @if(Session::get('page')=='orders' )style="display: block;" @endif>
                                <li class="nav-item">
                                    <a href="{{url('admin/orders')}}" class="nav-link @if(Session::get('page')=='orders')active @endif">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>سفارشات</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                    @else
                        <li class="nav-item has-treeview @if(Session::get('page')=='update-admin-password' || Session::get('page')=='update-admin-details')menu-open @endif">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon fa fa-cogs"></i>
                                <p>
                                    تنظیمات
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview"
                                @if(Session::get('page')=='update-admin-password' || Session::get('page')=='update-admin-details')style="display: block;" @endif>
                                <li class="nav-item">
                                    <a href="{{url('admin/update-admin-password')}}"
                                       class="nav-link @if(Session::get('page')=='update-admin-password')active @endif">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>بروز رسانی کلمه عبور ادمین</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('admin/update-admin-details')}}"
                                       class="nav-link  @if(Session::get('page')=='update-admin-details')active @endif">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>بروز رسانی پروفایل ادمین</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item has-treeview @if(Session::get('page')=='view_admins' || Session::get('page')=='view_subadmins'|| Session::get('page')=='view_vendors'|| Session::get('page')=='view_all')menu-open @endif">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon  fa fa-lock"></i>
                                <p>
                                    مدیرت ادمینها
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview"
                                @if(Session::get('page')=='view_admins' || Session::get('page')=='view_subadmins'|| Session::get('page')=='view_vendors'|| Session::get('page')=='view_all')style="display: block;" @endif>
                                <li class="nav-item">
                                    <a href="{{url('admin/admins/admin')}}"
                                       class="nav-link @if(Session::get('page')=='view_admins')active @endif">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>مدیران ارشد</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('admin/admins/subadmin')}}"
                                       class="nav-link @if(Session::get('page')=='view_subadmins')active @endif">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>مدیران</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('admin/admins/vendor')}}"
                                       class="nav-link @if(Session::get('page')=='view_vendors')active @endif">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>فروشندگان</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('admin/admins')}}"
                                       class="nav-link @if(Session::get('page')=='view_all')active @endif">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>کلیه مدیران</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview @if(Session::get('page')=='coupon' ||Session::get('page')=='sections' || Session::get('page')=='categories'|| Session::get('page')=='product_images'|| Session::get('page')=='filters')menu-open @endif">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon  fa fa-lock"></i>
                                <p>
                                    مدیرت فهرست ها
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview"
                                @if(Session::get('page')=='sections' || Session::get('page')=='categories'|| Session::get('page')=='products'|| Session::get('page')=='brands')style="display: block;" @endif>
                                <li class="nav-item">
                                    <a href="{{url('admin/sections')}}" class="nav-link @if(Session::get('page')=='sections')active @endif">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p> بخش ها</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('admin/categories')}}" class="nav-link @if(Session::get('page')=='categories')active @endif">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>دسته بندی ها</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('admin/brands')}}" class="nav-link @if(Session::get('page')=='brands')active @endif">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>برند</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('admin/products')}}" class="nav-link @if(Session::get('page')=='products')active @endif">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>محصولات</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('admin/filters')}}" class="nav-link @if(Session::get('page')=='filters')active @endif">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>فیلترها</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('admin/coupons')}}" class="nav-link @if(Session::get('page')=='coupon')active @endif">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>کوپن ها</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview @if(Session::get('page')=='orders')menu-open @endif">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon  fa fa-lock"></i>
                                <p>
                                    مدیرت سفارشات
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview"
                                @if(Session::get('page')=='orders' )style="display: block;" @endif>
                                <li class="nav-item">
                                    <a href="{{url('admin/orders')}}" class="nav-link @if(Session::get('page')=='orders')active @endif">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>سفارشات</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item has-treeview @if(Session::get('page')=='users' )menu-open @endif">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon  fa fa-lock"></i>
                                <p>
                                    مدیرت کاربران
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" @if(Session::get('page')=='users')style="display: block;" @endif>
                                <li class="nav-item">
                                    <a href="{{url('admin/users')}}"  class="nav-link @if(Session::get('page')=='users')active @endif">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p> کاربران</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('admin/subscribers')}}" class="nav-link ">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>امضا کننده</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item has-treeview @if( Session::get('page')=='banner')menu-open @endif">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon  fa fa-file-picture-o"></i>
                                <p>
                                    مدیرت اسلایدر
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{url('admin/banners')}}" class="nav-link @if(Session::get('page')=='banner')active @endif" >
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p> اسلایدر صفحه اصلی</p>
                                    </a>
                                </li>


                            </ul>
                        </li>
                        <li class="nav-item has-treeview @if( Session::get('page')=='shipping')menu-open @endif">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon  fa fa-file-picture-o"></i>
                                <p>
                                    مدیرت ارسال
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{url('admin/shipping-charges')}}" class="nav-link @if(Session::get('page')=='shipping')active @endif" >
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>تعرفه ارسال محصولات</p>
                                    </a>
                                </li>


                            </ul>
                        </li>
                    @endif

                    <li class="nav-item">
                        <a href="pages/widgets.html" class="nav-link">
                            <i class="nav-icon fa fa-th"></i>
                            <p>
                                ویجت‌ها
                                <span class="right badge badge-danger">جدید</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-pie-chart"></i>
                            <p>
                                چارت‌ها
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/charts/chartjs.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>نمودار ChartJS</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/charts/flot.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>نمودار Flot</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/charts/inline.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>نمودار Inline</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-tree"></i>
                            <p>
                                اشیای گرافیکی
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/UI/general.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>عمومی</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/UI/icons.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>آیکون‌ها</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/UI/buttons.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>دکمه‌ها</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/UI/sliders.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>اسلایدر‌ها</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-edit"></i>
                            <p>
                                فرم‌ها
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/forms/general.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>اجزا عمومی</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/forms/advanced.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>پیشرفته</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/forms/editors.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ویشرایشگر</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-table"></i>
                            <p>
                                جداول
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/tables/simple.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>جداول ساده</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/tables/data.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>جداول داده</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-header">مثال‌ها</li>
                    <li class="nav-item">
                        <a href="pages/calendar.html" class="nav-link">
                            <i class="nav-icon fa fa-calendar"></i>
                            <p>
                                تقویم
                                <span class="badge badge-info right">2</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-envelope-o"></i>
                            <p>
                                ایمیل‌ باکس
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/mailbox/mailbox.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>اینباکس</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/mailbox/compose.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ایجاد</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/mailbox/read-mail.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>خواندن</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-book"></i>
                            <p>
                                صفحات
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/examples/invoice.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>سفارشات</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/profile.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>پروفایل</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/login.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>صفحه ورود</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/register.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>صفحه عضویت</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/lockscreen.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>قفل صفحه</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-plus-square-o"></i>
                            <p>
                                بیشتر
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/examples/404.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ارور 404</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/500.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ارور 500</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/blank.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>صفحه خالی</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="starter.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>صفحه شروع</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-header">متفاوت</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-file"></i>
                            <p>مستندات</p>
                        </a>
                    </li>
                    <li class="nav-header">برچسب‌ها</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-circle-o text-danger"></i>
                            <p class="text">مهم</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-circle-o text-warning"></i>
                            <p>هشدار</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-circle-o text-info"></i>
                            <p>اطلاعات</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('admin/logout')}}" class="nav-link">
                            <button type="button" class="btn btn-block btn-warning"><i class="fa fa-sign-out"
                                                                                       style="font-size:24px"></i>خروج
                            </button>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>
