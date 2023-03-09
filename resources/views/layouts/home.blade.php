<!DOCTYPE html>
<html class="loading" lang="fa" data-textdirection="rtl" dir="rtl">
<!-- BEGIN: Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>@yield('title') -  {{ title_website() }}</title>
    <meta name="description" content="{{ seo_website() }}" />
    <meta name="keywords" content="{{ keyword_website() }}">

    <link rel="shortcut icon" type="image/x-icon" href="{!! favicon_website() !!}">
    <meta name="theme-color" content="#5A8DEE">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('../../panel/assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('../../panel/assets/vendors/css/charts/apexcharts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('../../panel/assets/vendors/css/extensions/swiper.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('../../panel/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('../../panel/assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('../../panel/assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('../../panel/assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('../../panel/assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('../../panel/assets/css/themes/semi-dark-layout.css') }}">
    <!-- END: Theme CSS-->
    @yield('csspanel')
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('../../panel/assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('../../panel/assets/css/pages/dashboard-ecommerce.css') }}">
    <!-- END: Page CSS-->
    <style>
        .invalid-feedback{
            display: block;
            text-align: left;
        }
        button.swal2-confirm.btn.btn-success {
            margin-right: 11px;
        }

        element.style {
            position: relative;
            top: 3px;
        }
        span.action-edit {
            position: relative;
            top: 3px;
        }
    </style>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

<!-- BEGIN: Header-->
<div class="header-navbar-shadow"></div>
<nav class="header-navbar main-header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top ">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon bx bx-menu"></i></a></li>
                    </ul>
                    <ul class="nav navbar-nav bookmark-icons">
                    </ul>

                </div>
                <ul class="nav navbar-nav float-right">

                    <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon bx bx-fullscreen"></i></a></li>

{{--                    <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon bx bx-bell bx-tada bx-flip-horizontal"></i><span class="badge badge-pill badge-danger badge-up">5</span></a>--}}
{{--                        <ul class="dropdown-menu dropdown-menu-media">--}}
{{--                            <li class="dropdown-menu-header">--}}
{{--                                <div class="dropdown-header px-1 py-75 d-flex justify-content-between"><span class="notification-title">7 اعلان جدید</span><span class="text-bold-400 cursor-pointer">علامت خوانده شده به همه</span></div>--}}
{{--                            </li>--}}
{{--                            <li class="scrollable-container media-list"><a class="d-flex justify-content-between" href="javascript:void(0)">--}}
{{--                                    <div class="media d-flex align-items-center">--}}
{{--                                        <div class="media-left pr-0">--}}
{{--                                            <div class="avatar mr-1 m-0"><img src="../../panel/assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="39" width="39"></div>--}}
{{--                                        </div>--}}
{{--                                        <div class="media-body">--}}
{{--                                            <h6 class="media-heading"><span class="text-bold-500">تبریک بابت دریافت جوایز</span> در مسابقات سالانه</h6><small class="notification-text">15 اردیبهشت 12:32 ب.ظ</small>--}}
{{--                                        </div>--}}
{{--                                    </div></a>--}}
{{--                                <div class="d-flex justify-content-between read-notification cursor-pointer">--}}
{{--                                    <div class="media d-flex align-items-center">--}}
{{--                                        <div class="media-left pr-0">--}}
{{--                                            <div class="avatar mr-1 m-0"><img src="../../panel/assets/images/portrait/small/avatar-s-16.jpg" alt="avatar" height="39" width="39"></div>--}}
{{--                                        </div>--}}
{{--                                        <div class="media-body">--}}
{{--                                            <h6 class="media-heading"><span class="text-bold-500">پیام جدید</span> دریافت شد</h6><small class="notification-text">شما 18 پیام خوانده نشده دارید</small>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="d-flex justify-content-between cursor-pointer">--}}
{{--                                    <div class="media d-flex align-items-center py-0">--}}
{{--                                        <div class="media-left pr-0"><img class="mr-1" src="../../panel/assets/images/icon/sketch-mac-icon.png" alt="avatar" height="39" width="39"></div>--}}
{{--                                        <div class="media-body">--}}
{{--                                            <h6 class="media-heading"><span class="text-bold-500">به روز رسانی آماده است</span></h6><small class="notification-text">لورم ایپسوم متن ساختگی با تولید سادگی</small>--}}
{{--                                        </div>--}}
{{--                                        <div class="media-right pl-0">--}}
{{--                                            <div class="row border-left text-center">--}}
{{--                                                <div class="col-12 px-50 py-50 border-bottom">--}}
{{--                                                    <h6 class="media-heading text-bold-500 mb-0">به‌روزرسانی</h6>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-12 px-50 py-50">--}}
{{--                                                    <h6 class="media-heading mb-0">بستن</h6>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="d-flex justify-content-between cursor-pointer">--}}
{{--                                    <div class="media d-flex align-items-center">--}}
{{--                                        <div class="media-left pr-0">--}}
{{--                                            <div class="avatar bg-primary bg-lighten-5 mr-1 m-0 p-25"><span class="avatar-content text-primary font-medium-2">ل‌د</span></div>--}}
{{--                                        </div>--}}
{{--                                        <div class="media-body">--}}
{{--                                            <h6 class="media-heading"><span class="text-bold-500">مشتری جدید</span> ثبت نام کرد</h6><small class="notification-text">1 ساعت پیش</small>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="cursor-pointer">--}}
{{--                                    <div class="media d-flex align-items-center justify-content-between">--}}
{{--                                        <div class="media-left pr-0">--}}
{{--                                            <div class="media-body">--}}
{{--                                                <h6 class="media-heading">پیشنهاد های جدید</h6>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="media-right">--}}
{{--                                            <div class="custom-control custom-switch">--}}
{{--                                                <input class="custom-control-input" type="checkbox" checked id="notificationSwtich">--}}
{{--                                                <label class="custom-control-label" for="notificationSwtich"></label>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="d-flex justify-content-between cursor-pointer">--}}
{{--                                    <div class="media d-flex align-items-center">--}}
{{--                                        <div class="media-left pr-0">--}}
{{--                                            <div class="avatar bg-danger bg-lighten-5 mr-1 m-0 p-25"><span class="avatar-content"><i class="bx bxs-heart text-danger"></i></span></div>--}}
{{--                                        </div>--}}
{{--                                        <div class="media-body">--}}
{{--                                            <h6 class="media-heading"><span class="text-bold-500">نرم افزار</span> تایید شد</h6><small class="notification-text">6 ساعت پیش</small>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="d-flex justify-content-between read-notification cursor-pointer">--}}
{{--                                    <div class="media d-flex align-items-center">--}}
{{--                                        <div class="media-left pr-0">--}}
{{--                                            <div class="avatar mr-1 m-0"><img src="../../panel/assets/images/portrait/small/avatar-s-4.jpg" alt="avatar" height="39" width="39"></div>--}}
{{--                                        </div>--}}
{{--                                        <div class="media-body">--}}
{{--                                            <h6 class="media-heading"><span class="text-bold-500">فایل جدید</span> ارسال شد</h6><small class="notification-text">4 ساعت پیش</small>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="d-flex justify-content-between cursor-pointer">--}}
{{--                                    <div class="media d-flex align-items-center">--}}
{{--                                        <div class="media-left pr-0">--}}
{{--                                            <div class="avatar bg-rgba-danger m-0 mr-1 p-25">--}}
{{--                                                <div class="avatar-content"><i class="bx bx-detail text-danger"></i></div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="media-body">--}}
{{--                                            <h6 class="media-heading"><span class="text-bold-500">گزارش بودجه</span> ایجاد شد</h6><small class="notification-text">25 ساعت پیش</small>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="d-flex justify-content-between cursor-pointer">--}}
{{--                                    <div class="media d-flex align-items-center border-0">--}}
{{--                                        <div class="media-left pr-0">--}}
{{--                                            <div class="avatar mr-1 m-0"><img src="../../panel/assets/images/portrait/small/avatar-s-16.jpg" alt="avatar" height="39" width="39"></div>--}}
{{--                                        </div>--}}
{{--                                        <div class="media-body">--}}
{{--                                            <h6 class="media-heading"><span class="text-bold-500">مشتری جدید</span> دیدگاهی ارسال کرد</h6><small class="notification-text">2 روز پیش</small>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="dropdown-menu-footer"><a class="dropdown-item p-50 text-primary justify-content-center" href="javascript:void(0)">خواندن همه اعلان ها</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
                    @php
                     $users = \App\Models\user_profile::where('user_id',auth()->user()->id)->first();
                     $admin = \App\Models\admin_profile::where('user_id',auth()->user()->id)->first();
                     $const = \App\Models\const_profile::where('user_id',auth()->user()->id)->first();
                     $employe = \App\Models\employer_profile::where('user_id',auth()->user()->id)->first();
                    @endphp
                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none"><span class="user-name">
                                @if (Auth::user()->hasRole('consts'))
                                    {{ $const->Fname }} {{ $const->Lname }}
                                @elseif(Auth::user()->hasRole('manager'))
                                        {{ $admin->Fname }} {{ $admin->Lname }}

                                    @elseif(Auth::user()->hasRole('user'))
                                        {{ $users->Fname }} {{ $users->Lname }}
                                    @elseif(Auth::user()->hasRole('empolyer'))
                                        {{ $employe->Fname }} {{ $employe->Lname }}

                                @endif
                                </span><span class="user-status text-muted">انلاین</span></div><span><img class="round"  @if (Auth::user()->hasRole('consts')) @if(!empty($const->avatar)) src="{{ url('../../image/users/cons/'.$const->avatar) }}" @else src="{{ url('../../image/avatar.png') }}" @endif @elseif(Auth::user()->hasRole('manager')) @if(!empty($admin->avatar)) src="{{ url('../../image/users/admin/profile/'.$admin->avatar) }}" @else src="{{ url('../../image/avatar.png') }}" @endif @elseif(Auth::user()->hasRole('user')) @if(!empty($users->avatar)) src="{{ url('../../image/users/user/profile/'.$users->avatar) }}" @else src="{{ url('../../image/avatar.png') }}" @endif @elseif(Auth::user()->hasRole('empolyer')) @if(!empty($employe->company_logo)) src="{{ url('../../image/users/employer/profile/'.$employe->company_logo) }}" @else src="{{ url('../../image/avatar.png') }}" @endif  @endif alt="avatar" height="40" width="40"></span></a>
                        <div class="dropdown-menu pb-0"><a class="dropdown-item" @if (Auth::user()->hasRole('consts')) href="/admin/profile_const"  @elseif(Auth::user()->hasRole('manager')) href="/admin/profile_admin" @elseif(Auth::user()->hasRole('user')) href="/admin/profile_user" @elseif(Auth::user()->hasRole('empolyer'))  href="/admin/profile_empolyee" @endif><i class="bx bx-user mr-50"></i> ویرایش پروفایل</a>
                            <div class="dropdown-divider mb-0"></div><a class="dropdown-item" onclick="logout()"><i class="bx bx-power-off mr-50"></i> خروج</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- END: Header-->


<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="../../html/vertical-menu-template/index.html">
                    <h2 class="brand-text mb-0">{{ title_website() }}</h2></a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="bx bx-x d-block d-xl-none font-medium-4 primary"></i><i class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block primary" data-ticon="bx-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="lines">
            <li class=" nav-item {{ (request()->is('admin/dashboard')) ? 'active' : '' }}"><a href="/admin/dashboard"><i class="menu-livicon" data-icon="desktop"></i><span class="menu-title" data-i18n="Dashboard">داشبورد</span></a>

            </li>
            @if (Auth::user()->hasRole('manager'))
            <li class=" nav-item {{ (request()->is('admin/event-list')) ? 'active' : '' }}"><a href="/admin/event-list"><i class="menu-livicon" data-icon="save"></i><span class="menu-title" data-i18n="File Manager">لیست رویدادها</span></a></li>
            <li class=" nav-item {{ (request()->is('admin/category-const-list')) ? 'active' : '' }}"><a href="/admin/category-const-list"><i class="menu-livicon" data-icon="save"></i><span class="menu-title" data-i18n="File Manager">لیست دسته بندی مشاور</span></a></li>
            <li class=" nav-item {{ (request()->is('admin/adversting-admin-list')) ? 'active' : '' }}"><a href="/admin/adversting-admin-list"><i class="menu-livicon" data-icon="save"></i><span class="menu-title" data-i18n="File Manager">لیست اگهی ها</span></a></li>
                <li class=" nav-item @if(str_contains(url()->current(), '/admin/category-blog-list')) has-sub open @elseif(str_contains(url()->current(), '/admin/category-blog-list'))  has-sub open @endif"><a href="#"><i class="menu-livicon" data-icon="notebook"></i><span class="menu-title" data-i18n="Invoice">مقالات</span></a>
                    <ul class="menu-content">
                        <li class="{{ (request()->is('admin/category-blog-list')) ? 'active' : '' }}"><a href="/admin/category-blog-list"><i class="bx bx-left-arrow-alt"></i><span class="menu-item" data-i18n="Invoice List">دسته بندی</span></a>
                        </li>
                        <li  class="{{ (request()->is('admin/blogs-list')) ? 'active' : '' }}"><a href="/admin/blogs-list"><i class="bx bx-left-arrow-alt"></i><span class="menu-item" data-i18n="Invoice">مقالات</span></a>
                        </li>

                    </ul>
                </li>
            <li class=" nav-item  @if(str_contains(url()->current(), '/admin/admin_list')) has-sub open @elseif(str_contains(url()->current(), '/admin/consts_list'))  has-sub open @elseif(str_contains(url()->current(), '/admin/users_list'))  has-sub open @elseif(str_contains(url()->current(), '/admin/employer_list'))  has-sub open @endif"><a href="#"><i class="menu-livicon" data-icon="users"></i><span class="menu-title" data-i18n="Invoice">کاربران</span></a>
                    <ul class="menu-content">
                        <li class="{{ (request()->is('admin/admin_list')) ? 'active' : '' }}"><a href="/admin/admin_list"><i class="bx bx-left-arrow-alt"></i><span class="menu-item" data-i18n="Invoice List">مدیران</span></a>
                        </li>
                        <li class="{{ (request()->is('admin/consts_list')) ? 'active' : '' }}"><a href="/admin/consts_list"><i class="bx bx-left-arrow-alt"></i><span class="menu-item" data-i18n="Invoice">مشاوران</span></a>
                        </li>
                        <li class="{{ (request()->is('admin/users_list')) ? 'active' : '' }}"><a href="/admin/users_list"><i class="bx bx-left-arrow-alt"></i><span class="menu-item" data-i18n="Invoice Edit">کاربران</span></a>
                        </li>
                        <li class="{{ (request()->is('admin/employer_list')) ? 'active' : '' }}"><a href="/admin/employer_list"><i class="bx bx-left-arrow-alt"></i><span class="menu-item" data-i18n="Invoice Add">کارفرمایان</span></a>
                        </li>
                    </ul>
            </li>
            <li class=" nav-item @if(str_contains(url()->current(), '/admin/setting_list')) has-sub open @elseif(str_contains(url()->current(), '/admin/social_media_list'))  has-sub open @elseif(str_contains(url()->current(), '/admin/contact-us'))  has-sub open @elseif(str_contains(url()->current(), '/admin/faq_list'))  has-sub open @endif"><a href="#"><i class="menu-livicon" data-icon="list"></i><span class="menu-title" data-i18n="Invoice">تنظیمات</span></a>
                <ul class="menu-content">
                    <li class="{{ (request()->is('admin/setting_list')) ? 'active' : '' }}"><a href="/admin/setting_list"><i class="bx bx-left-arrow-alt"></i><span class="menu-item" data-i18n="Invoice List">تنظیمات اصلی</span></a>
                    </li>
                    <li class="{{ (request()->is('admin/social_media_list')) ? 'active' : '' }}"><a href="/admin/social_media_list"><i class="bx bx-left-arrow-alt"></i><span class="menu-item" data-i18n="Invoice">شبکه های اجتماعی</span></a>
                    </li>
                    <li class="{{ (request()->is('admin/contact-us')) ? 'active' : '' }}"><a href="/admin/contact-us"><i class="bx bx-left-arrow-alt"></i><span class="menu-item" data-i18n="Invoice Edit">تماس با ما</span></a>
                    </li>
                    <li class="{{ (request()->is('admin/faq_list')) ? 'active' : '' }}"><a href="/admin/faq_list"><i class="bx bx-left-arrow-alt"></i><span class="menu-item" data-i18n="Invoice Add">سوالات متداول</span></a>
                    </li>
                </ul>
            </li>
            @endif
            @if (Auth::user()->hasRole('empolyer'))
            <li class=" nav-item {{ (request()->is('admin/adversting-list')) ? 'active' : '' }}"><a href="/admin/adversting-list"><i class="menu-livicon" data-icon="save"></i><span class="menu-title" data-i18n="File Manager">لیست اگهی ها</span></a>
            </li>
            @endif
            @if (Auth::user()->hasRole('consts'))
            <li class=" nav-item  {{ (request()->is('admin/set-const-list')) ? 'active' : '' }}"><a href="/admin/set-const-list"><i class="menu-livicon" data-icon="save"></i><span class="menu-title" data-i18n="File Manager">لیست ثبت تاریخ </span></a>
            </li>
            <li class=" nav-item  {{ (request()->is('admin/set-price-const')) ? 'active' : '' }}"><a href="/admin/set-price-const"><i class="menu-livicon" data-icon="save"></i><span class="menu-title" data-i18n="File Manager">لیست ثبت تعرفه </span></a>
            </li>
            @endif

        </ul>
    </div>
</div>
<!-- END: Main Menu-->

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h5 class="content-header-title float-left pr-1">@yield('title')</h5>
                        <div class="breadcrumb-wrapper">
                            @yield('breadcrumb')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">

            @yield('content')

        </div>
    </div>
</div>
<!-- END: Content-->


<!-- BEGIN: Customizer-->
<div class="customizer d-none d-md-block"><a class="customizer-close" href="#"><i class="bx bx-x"></i></a><a class="customizer-toggle" href="#"><i class="bx bx-cog bx bx-spin white"></i></a><div class="customizer-content p-2">
        <h4 class="text-uppercase mb-0 mt-n50">سفارشی سازی قالب</h4>
        <small>سفارشی سازی کنید و به صورت زنده مشاهده کنید.</small>
        <hr>
        <!-- Theme options starts -->
        <h5 class="mt-n25">طرح قالب</h5>
        <div class="theme-layouts">
            <div class="d-flex justify-content-start">
                <div class="mx-50">
                    <fieldset>
                        <div class="radio">
                            <input type="radio" name="layoutOptions" value="false" id="radio-light" class="layout-name" data-layout="" checked>
                            <label for="radio-light">روشن</label>
                        </div>
                    </fieldset>
                </div>
                <div class="mx-50">
                    <fieldset>
                        <div class="radio">
                            <input type="radio" name="layoutOptions" value="false" id="radio-dark" class="layout-name" data-layout="dark-layout">
                            <label for="radio-dark">تیره</label>
                        </div>
                    </fieldset>
                </div>
                <div class="mx-50">
                    <fieldset>
                        <div class="radio">
                            <input type="radio" name="layoutOptions" value="false" id="radio-semi-dark" class="layout-name" data-layout="semi-dark-layout">
                            <label for="radio-semi-dark">نیمه تیره</label>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
        <!-- Theme options starts -->
        <hr>

        <!-- Menu Colors Starts -->
        <div id="customizer-theme-colors">
            <h5>رنگ های فهرست</h5>
            <ul class="list-inline unstyled-list">
                <li class="color-box bg-primary selected" data-color="theme-primary"> </li>
                <li class="color-box bg-success" data-color="theme-success"> </li>
                <li class="color-box bg-danger" data-color="theme-danger"> </li>
                <li class="color-box bg-info" data-color="theme-info"> </li>
                <li class="color-box bg-warning" data-color="theme-warning"> </li>
                <li class="color-box bg-dark" data-color="theme-dark"> </li>
            </ul>
            <hr>
        </div>
        <!-- Menu Colors Ends -->
        <!-- Menu Icon Animation Starts -->
        <div id="menu-icon-animation">
            <div class="d-flex justify-content-between align-items-center">
                <div class="icon-animation-title">
                    <h5 class="pt-25">انیمیشن آیکن ها</h5>
                </div>
                <div class="icon-animation-switch">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" checked id="icon-animation-switch">
                        <label class="custom-control-label" for="icon-animation-switch"></label>
                    </div>
                </div>
            </div>
            <hr>
        </div>
        <!-- Menu Icon Animation Ends -->
        <!-- Collapse sidebar switch starts -->
        <div class="collapse-sidebar d-flex justify-content-between align-items-center">
            <div class="collapse-option-title">
                <h5 class="pt-25">جمع کردن فهرست</h5>
            </div>
            <div class="collapse-option-switch">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="collapse-sidebar-switch">
                    <label class="custom-control-label" for="collapse-sidebar-switch"></label>
                </div>
            </div>
        </div>
        <!-- Collapse sidebar switch Ends -->
        <hr>

        <!-- Navbar colors starts -->
        <div id="customizer-navbar-colors">
            <h5>رنگ های نوار بالایی</h5>
            <ul class="list-inline unstyled-list">
                <li class="color-box bg-white border selected" data-navbar-default=""> </li>
                <li class="color-box bg-primary" data-navbar-color="bg-primary"> </li>
                <li class="color-box bg-success" data-navbar-color="bg-success"> </li>
                <li class="color-box bg-danger" data-navbar-color="bg-danger"> </li>
                <li class="color-box bg-info" data-navbar-color="bg-info"> </li>
                <li class="color-box bg-warning" data-navbar-color="bg-warning"> </li>
                <li class="color-box bg-dark" data-navbar-color="bg-dark"> </li>
            </ul>
            <small><strong>نکته :</strong> این گزینه تنها در حالت نوار ثابت و در هنگام اسکرول صفحه نمایش داده خواهد شد.</small>
            <hr>
        </div>
        <!-- Navbar colors starts -->
        <!-- Navbar Type Starts -->
        <h5 class="mt-n25">نوع نوار بالایی</h5>
        <div class="navbar-type d-flex justify-content-start">
            <div class="hidden-ele mx-50">
                <fieldset>
                    <div class="radio">
                        <input type="radio" name="navbarType" value="false" id="navbar-hidden">
                        <label for="navbar-hidden">مخفی</label>
                    </div>
                </fieldset>
            </div>
            <div class="mx-50">
                <fieldset>
                    <div class="radio">
                        <input type="radio" name="navbarType" value="false" id="navbar-static">
                        <label for="navbar-static">ایستا</label>
                    </div>
                </fieldset>
            </div>
            <div class="mx-50">
                <fieldset>
                    <div class="radio">
                        <input type="radio" name="navbarType" value="false" id="navbar-sticky" checked>
                        <label for="navbar-sticky">ثابت</label>
                    </div>
                </fieldset>
            </div>
        </div>
        <hr>
        <!-- Navbar Type Starts -->

        <!-- Footer Type Starts -->
        <h5 class="mt-n25">نوع فوتر</h5>
        <div class="footer-type d-flex justify-content-start">
            <div class="mx-50">
                <fieldset>
                    <div class="radio">
                        <input type="radio" name="footerType" value="false" id="footer-hidden">
                        <label for="footer-hidden">مخفی</label>
                    </div>
                </fieldset>
            </div>
            <div class="mx-50">
                <fieldset>
                    <div class="radio">
                        <input type="radio" name="footerType" value="false" id="footer-static" checked>
                        <label for="footer-static">ایستا</label>
                    </div>
                </fieldset>
            </div>
            <div class="mx-50">
                <fieldset>
                    <div class="radio">
                        <input type="radio" name="footerType" value="false" id="footer-sticky">
                        <label for="footer-sticky" class="">چسبان</label>
                    </div>
                </fieldset>
            </div>
        </div>
        <!-- Footer Type Ends -->
        <hr>

        <!-- Card Shadow Starts-->
        <div class="card-shadow d-flex justify-content-between align-items-center py-25">
            <div class="hide-scroll-title">
                <h5 class="pt-25">سایه کارت</h5>
            </div>
            <div class="card-shadow-switch">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" checked id="card-shadow-switch">
                    <label class="custom-control-label" for="card-shadow-switch"></label>
                </div>
            </div>
        </div>
        <!-- Card Shadow Ends-->
        <hr>

        <!-- Hide Scroll To Top Starts-->
        <div class="hide-scroll-to-top d-flex justify-content-between align-items-center py-25">
            <div class="hide-scroll-title">
                <h5 class="pt-25">مخفی سازی دکمه اسکرول به بالا</h5>
            </div>
            <div class="hide-scroll-top-switch">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="hide-scroll-top-switch">
                    <label class="custom-control-label" for="hide-scroll-top-switch"></label>
                </div>
            </div>
        </div>
        <!-- Hide Scroll To Top Ends-->
    </div>
</div>
<!-- End: Customizer-->

<!-- Buynow Button-->

</div>
<!-- demo chat-->
<div class="widget-chat-demo"><!-- widget chat demo footer button start -->
    <!-- widget chat demo footer button ends -->
    <!-- widget chat demo start -->
    <div class="widget-chat widget-chat-demo d-none">
        <div class="card mb-0">
            <div class="card-header border-bottom p-0">
                <div class="media m-75">
                    <a href="JavaScript:void(0);">
                        <div class="avatar mr-75">
                            <img src="../../panel/assets/images/portrait/small/avatar-s-2.jpg" alt="avtar images" width="32" height="32">
                            <span class="avatar-status-online"></span>
                        </div>
                    </a>
                    <div class="media-body">
                        <h6 class="media-heading mb-0 mt-n25"><a href="javaScript:void(0);">جان اسنو</a></h6>
                        <span class="text-muted font-small-3">فعال</span>
                    </div>
                    <i class="bx bx-x widget-chat-close float-right my-auto cursor-pointer"></i>
                </div>
            </div>
            <div class="card-body widget-chat-container widget-chat-demo-scroll">
                <div class="chat-content">
                    <div class="badge badge-pill badge-light-secondary my-1">امروز</div>
                    <div class="chat">
                        <div class="chat-body">
                            <div class="chat-message">
                                <p>لورم ایپسوم متن ساختگی</p>
                                <span class="chat-time">7:45 ق.ظ</span>
                            </div>
                        </div>
                    </div>
                    <div class="chat chat-left">
                        <div class="chat-body">
                            <div class="chat-message">
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت</p>
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</p>
                                <span class="chat-time">7:50 ق.ظ</span>
                            </div>
                        </div>
                    </div>
                    <div class="chat">
                        <div class="chat-body">
                            <div class="chat-message">
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</p>
                                <span class="chat-time">8:01 ق.ظ</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer border-top p-1">
                <form class="d-flex" onsubmit="widgetChatMessageDemo();" action="javascript:void(0);">
                    <input type="text" class="form-control chat-message-demo mr-75" placeholder="اینجا بنویسید ...">
                    <button type="submit" class="btn btn-primary glow px-1"><i class="bx bx-paper-plane"></i></button>
                </form>
            </div>
        </div>
    </div>
    <!-- widget chat demo ends -->

</div>
<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix mb-0"><span class="float-left d-inline-block">{{ setting_copyright() }}</span>
        <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="bx bx-up-arrow-alt"></i></button>
    </p>
</footer>
<!-- END: Footer-->


<!-- BEGIN: Vendor JS-->
<script src="{{ url('../../panel/assets/vendors/js/vendors.min.js') }}"></script>
<script src="{{ url('../../panel/assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.min.js') }}"></script>
<script src="{{ url('../../panel/assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.js') }}"></script>
<script src="{{ url('../../panel/assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js') }}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{ url('../../panel/assets/vendors/js/charts/apexcharts.min.js') }}"></script>
<script src="{{ url('../../panel/assets/vendors/js/extensions/swiper.min.js') }}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ url('../../panel/assets/js/scripts/configs/vertical-menu-light.js') }}"></script>
<script src="{{ url('../../panel/assets/js/core/app-menu.js') }}"></script>
<script src="{{ url('../../panel/assets/js/core/app.js') }}"></script>
<script src="{{ url('../../panel/assets/js/scripts/components.js') }}"></script>
<script src="{{ url('../../panel/assets/js/scripts/footer.js') }}"></script>
<script src="{{ url('../../panel/assets/js/scripts/customizer.js') }}"></script>
<!-- END: Theme JS-->
<script>
    function logout(){
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'ایا مطمئن هستی؟',
            text: "ایا واقعا میخوای از پنل خارج شوید",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'بله, خارج میشم!',
            cancelButtonText: 'نه, دوست دارم بمونم!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                var token = localStorage.getItem('Token');
                $.ajax({
                    url:"/api/V1/auth/logout",
                    type:"POST",
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader ("Authorization", "Bearer " + token);
                    },
                    success:function (){
                        localStorage.removeItem("Token");
                        document.getElementById('logout-form').submit();
                        location.href='/'
                    }
                })

            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
            }

        })

    }
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- BEGIN: Page JS-->
<script src="{{ url('../../panel/assets/js/scripts/pages/dashboard-ecommerce.js') }}"></script>
<!-- END: Page JS-->
@yield('script')
</body>
<!-- END: Body-->
</html>
