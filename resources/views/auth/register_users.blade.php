<!DOCTYPE html>
<html class="loading" lang="fa" data-textdirection="rtl" dir="rtl">
<!-- BEGIN: Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>صفحه ثبت نام</title>
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
        <div class="content-body"><!-- register section starts -->
            <section class="row flexbox-container">
                <div class="col-xl-8 col-10">
                    <div class="card bg-authentication mb-0">
                        <div class="row m-0">
                            <!-- register section left -->
                            <div class="col-md-6 col-12 px-0">
                                <div class="card disable-rounded-right mb-0 p-2 h-100 d-flex justify-content-center">
                                    <div class="card-header pb-1">
                                        <div class="card-title">
                                            <h4 class="text-center mb-2">ثبت نام کاربر</h4>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form action="/api/V1/auth/users_register" id="RegisterEmployer" method="post">
                                                @csrf
                                                <div class="form-row">
                                                    <div class="form-group col-md-6 mb-50">
                                                        <label for="inputfirstname4">نام </label>
                                                        <input type="text" class="form-control" name="Fname" id="inputfirstname4" placeholder="نام">
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong id="Fnameess"></strong>
                                                    </span>
                                                    </div>

                                                    <div class="form-group col-md-6 mb-50">
                                                        <label for="inputlastname4">نام خانوادگی</label>
                                                        <input type="text" class="form-control" id="Lname" name="Lname" placeholder="نام خانوادگی">
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong id="Lnamess"></strong>
                                                    </span>
                                                    </div>
                                                </div>

                                                <div class="form-group mb-50">
                                                    <label class="text-bold-700" for="exampleInputUsername1">ایمیل</label>
                                                    <input type="text" class="form-control text-left" name="email" id="exampleInputUsername1" placeholder="ایمیل" dir="ltr">
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong id="emailss"></strong>
                                                    </span>
                                                </div>

                                                <div class="form-group mb-50">
                                                    <label class="text-bold-700" for="exampleInputEmail1">شماره همراه</label>
                                                    <input type="text" name="phone" class="form-control text-left" id="exampleInputEmail1" placeholder="شماره همراه" dir="ltr">
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong id="phoness"></strong>
                                                    </span>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label class="text-bold-700" for="exampleInputPassword1">رمز عبور</label>
                                                    <input type="password" name="password" class="form-control text-left" id="exampleInputPassword1" placeholder="رمز عبور" dir="ltr">
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong id="passwordss"></strong>
                                                    </span>
                                                </div>
                                                <button type="submit" class="btn btn-primary glow position-relative w-100">ثبت نام<i id="icon-arrow" class="bx bx-left-arrow-alt"></i></button>
                                            </form>
                                            <hr>
                                            <div class="text-center"><small class="mr-25">حساب کاربری دارید؟</small><a href="{{route('login')}}"><small>ورود</small> </a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- image section right -->
                            <div class="col-md-6 d-md-block d-none text-center align-self-center p-3">
                                <img class="img-fluid" src="../../panel/assets/images/pages/register.png" alt="branding logo">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- register section endss -->
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

<script src=""></script>
<script src="{{ url('../../panel/assets/js/core/app-menu.js') }}"></script>
<script src="{{ url('../../panel/assets/js/core/app.js') }}"></script>
<script src="{{ url('../../panel/assets/js/scripts/components.js') }}"></script>
<script src="{{ url('../../panel/assets/js/scripts/footer.js') }}"></script>
<!-- END: Theme JS-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    $(document).ready(function (e) {


        $('#RegisterEmployer').on('submit', (function (e) {
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                cache: false,
                contentType: false,
                processData: false,

                success: function (data) {
                    Swal.fire({
                        title: 'موفقیت آمیز',
                        text: "باموفقیت ثبت شد",
                        icon: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'باشه'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.href = "/login"
                        }
                    })
                },
                error: function (error) {
                    var text = error.responseText;
                    var obj = JSON.parse(text);
                    if (obj.errors.Fname === undefined) {
                        document.getElementById('Fnameess').innerHTML = " "

                    } else {
                        document.getElementById('Fnameess').innerHTML = obj.errors.Fname

                    }
                    if (obj.errors.Lname === undefined) {
                        document.getElementById('Lnamess').innerHTML = " "

                    } else {
                        document.getElementById('Lnamess').innerHTML = obj.errors.Lname

                    }
                    if (obj.errors.email === undefined) {
                        document.getElementById('emailss').innerHTML = " "

                    } else {
                        document.getElementById('emailss').innerHTML = obj.errors.email

                    }
                    if (obj.errors.phone === undefined) {
                        document.getElementById('phoness').innerHTML = " "

                    } else {
                        document.getElementById('phoness').innerHTML = obj.errors.phone

                    }
                    if (obj.errors.password === undefined) {
                        document.getElementById('passwordss').innerHTML = " "

                    } else {
                        document.getElementById('passwordss').innerHTML = obj.errors.password

                    }

                }
            });
        }));
    });


</script>
<!-- BEGIN: Page JS-->
<!-- END: Page JS-->

</body>
<!-- END: Body-->
</html>
