<!DOCTYPE html>
<html class="loading" lang="fa" data-textdirection="rtl" dir="rtl">
<!-- BEGIN: Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>صفحه ورود</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('../../panel/assets/images/ico/favicon.ico') }}">
    <meta name="theme-color" content="#5A8DEE">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('../../panel/assets/vendors/css/vendors.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('../../panel/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('../../panel/assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('../../panel/assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('../../panel/assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('../../panel/assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('../../panel/assets/css/themes/semi-dark-layout.css') }}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('../../panel/assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('../../panel/assets/css/pages/authentication.css') }}">
    <!-- END: Page CSS-->
    <style>
        .invalid-feedback{
            display: block;
            text-align: left;
        }
    </style>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern 1-column  navbar-sticky footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column" style="background: url('{{ url('../../panel/assets/images/pages/auth-bg.jpg') }}')no-repeat center center;
    background-size: cover;">
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- login page start -->
            <section id="auth-login" class="row flexbox-container">
                <div class="col-xl-8 col-11">
                    <div class="card bg-authentication mb-0">
                        <div class="row m-0">
                            <!-- left section-login -->
                            <div class="col-md-6 col-12 px-0">
                                <div class="card disable-rounded-right mb-0 p-2 h-100 d-flex justify-content-center">
                                    <div class="card-header pb-1">
                                        <div class="card-title">
                                            <h4 class="text-center mb-2">خوش آمدید</h4>
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="d-flex flex-md-row flex-column justify-content-around">
                                                <a href="#" class="btn btn-social btn-google btn-block font-small-3 mr-md-1 mb-md-0 mb-1">
                                                    <i class="bx bxl-google font-medium-3"></i><span class="pl-50 d-block text-center">گوگل</span></a>
                                                <a href="#" class="btn btn-social btn-block mt-0 btn-facebook font-small-3">
                                                    <i class="bx bxl-facebook-square font-medium-3"></i><span class="pl-50 d-block text-center">فیسبوک</span></a>
                                            </div>
                                            <div class="divider">
                                                <div class="divider-text text-uppercase text-muted"><small>یا توسط ایمیل وارد شوید</small>
                                                </div>
                                            </div>
                                            <form action="index.html">
                                                <div class="form-group mb-50">
                                                    <label class="text-bold-700" for="exampleInputEmail1">آدرس ایمیل</label>
                                                    <input type="email" class="form-control text-left" id="Email" placeholder="آدرس ایمیل" dir="ltr">
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong id="emailUser"></strong>
                                                    </span>
                                            </div>
                                                <div class="form-group">
                                                    <label class="text-bold-700" for="exampleInputPassword1">رمز عبور</label>
                                                    <input type="password" class="form-control text-left" id="Password" placeholder="رمز عبور" dir="ltr">
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong id="paawordUser"></strong>
                                                    </span>
                                                </div>
                                                <div class="form-group d-flex flex-md-row flex-column justify-content-between align-items-center">
                                                    <div class="text-left">
                                                        <div class="checkbox checkbox-sm">
                                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                            <label class="checkboxsmall" for="exampleCheck1"><small>مرا به خاطر بسپار</small></label>
                                                        </div>
                                                    </div>
                                                    <div class="text-right line-height-2"><a href="auth-forgot-password.html" class="card-link"><small>رمز عبورتان را فراموش کرده اید؟</small></a></div>
                                                </div>
                                                <button type="button" id="btnLogin" class="btn btn-primary glow w-100 position-relative">ورود<i id="icon-arrow" class="bx bx-left-arrow-alt"></i></button>
                                            </form>
                                            <hr>
                                            <div class="text-center"><small class="mr-25">حسابی ندارید؟</small><a href="{{route('regi')}}"><small>ثبت نام</small></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- right section image -->
                            <div class="col-md-6 d-md-block d-none text-center align-self-center p-3">
                                <div class="card-content">
                                    <img class="img-fluid" src="../../panel/assets/images/pages/login.png" alt="branding logo">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- login page ends -->

        </div>
    </div>
</div>
<!-- END: Content-->


<!-- BEGIN: Vendor JS-->
<script src="{{ url('../../panel/assets/vendors/js/vendors.min.js') }}"></script>
<script src="{{ url('../../panel/assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.min.js') }}"></script>
<script src="{{ url('../../panel/assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.js') }}"></script>
<script src="{{ url('../../panel/assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js') }}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<!-- END: Page Vendor JS-->
<script>
    $('#btnLogin').on('click',function (){
        $.ajax({
            url:"{{ route('login') }}",
            type:"POST",
            data:{
                "_token":"{{ csrf_token() }}",
                email:$('#Email').val(),
                password:$('#Password').val()
            },
            success:function (response){
                    localStorage.setItem('Token',response.access_token);
                    location.href='/admin/dashboard'
            },
            error:function (error){
                var text = error.responseText;
                var obj = JSON.parse(text);
                if (obj.errors.email === undefined) {
                    document.getElementById('emailUser').innerHTML = " "

                } else {
                    document.getElementById('emailUser').innerHTML = obj.errors.email

                }
                if (obj.errors.password === undefined) {
                    document.getElementById('paawordUser').innerHTML = " "

                } else {
                    document.getElementById('paawordUser').innerHTML = obj.errors.password

                }
            }
        })
    })
</script>

<!-- BEGIN: Theme JS-->
<script src="{{ url('../../panel/assets/js/scripts/configs/vertical-menu-light.js') }}"></script>
<script src="{{ url('../../panel/assets/js/core/app-menu.js') }}"></script>
<script src="{{ url('../../panel/assets/js/core/app.js') }}"></script>
<script src="{{ url('../../panel/assets/js/scripts/components.js') }}"></script>
<script src="{{ url('../../panel/assets/js/scripts/footer.js') }}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<!-- END: Page JS-->

</body>
<!-- END: Body-->
</html>
