@extends('layouts.home')
@section('breadcrumb')
    <ol class="breadcrumb p-0 mb-0">
        <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="bx bx-home-alt"></i></a>
        </li>
        <li class="breadcrumb-item active">پروفایل مدیریت
        </li>
    </ol>
@endsection
@section('title')
    پروفایل مدیریت
@endsection
@section('script')
    <script>
        $(document).ready(function (e) {
            var token = localStorage.getItem('Token');

            $(document).ajaxStart(function () {
                document.getElementById("btnshow").style.display = "block";
                document.getElementById("btnRequest").style.display = "none";

            }).ajaxStop(function () {
                document.getElementById("btnshow").style.display = "none";
                document.getElementById("btnRequest").style.display = "block";
            });
            $('#UpdateAdmin').on('submit', (function (e) {
                e.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader ("Authorization", "Bearer " + token);
                    },
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
                                location.href = "/admin/profile_admin"
                            }
                        })
                    },
                    error: function (error) {
                        var text = error.responseText;
                        var obj = JSON.parse(text);
                        if (obj.errors.Fname === undefined) {
                            document.getElementById('Fnamesss').innerHTML = " "

                        } else {
                            document.getElementById('Fnamesss').innerHTML = obj.errors.Fname

                        }
                        if (obj.errors.Lname === undefined) {
                            document.getElementById('Lnamesss').innerHTML = " "

                        } else {
                            document.getElementById('Lnamesss').innerHTML = obj.errors.Lname

                        }
                        if (obj.errors.avatar === undefined) {
                            document.getElementById('avatarass').innerHTML = " "

                        } else {
                            document.getElementById('avatarass').innerHTML = obj.errors.avatar

                        }

                    }
                });
            }));
        });


    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

@endsection
@section('content')
    <section id="page-account-settings">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <!-- left menu section -->
                    <div class="col-md-3 mb-2 mb-md-0 pills-stacked">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
                                    <i class="bx bx-cog"></i>
                                    <span>عمومی</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
                                    <i class="bx bx-lock"></i>
                                    <span>تغییر رمز عبور</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <!-- right content section -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="tab-content">
                                        <form action="/api/V1/admin/admin_profile" id="UpdateAdmin" method="post">
                                            @csrf
                                            {{ method_field('PUT') }}
                                        <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                                            <div class="media">
                                                <a href="">
                                                    <img @if(!empty($profile->avatar)) src="../../image/users/admin/profile/{{ $profile->avatar }}" @else src="../../panel/assets/images/portrait/small/avatar-s-16.jpg" @endif  class="rounded mr-75" alt="profile image" height="64" width="64">
                                                </a>
                                                <div class="media-body mt-25">
                                                    <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                        <label for="select-files" class="btn btn-sm btn-light-primary ml-50 mb-50 mb-sm-0">
                                                            <span>ارسال تصویر جدید</span>
                                                            <input id="select-files"  name="avatar" type="file" hidden>
                                                        </label>
                                                        <button class="btn btn-sm btn-light-secondary ml-50">بازنشانی</button>
                                                    </div>
                                                    <p class="text-muted ml-1 mt-50"><small id="avatarass"></small></p>
                                                </div>
                                            </div>
                                            <hr>

                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>نام کاربری</label>
                                                                <input type="text" class="form-control text-left" placeholder="نام کاربری" value="{{ auth::user()->email }}" readonly >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>نام</label>
                                                                <input type="text" class="form-control" placeholder="نام" value="{{ $profile->Fname }}" name="Fname">
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong id="Fnamesss"></strong>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>نام خانوادگی</label>
                                                                <input type="text" class="form-control text-left" placeholder="ایمیل" value="{{ $profile->Lname }}" name="Lname">
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong id="Lnamesss"></strong>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                        <button type="submit" id="btnRequest" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1"> ذخیره تغییرات</button>
                                                        <button id="btnshow" class="btn btn-primary" type="button" disabled style="display: none">
                                                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                            منتظر بمانید...
                                                        </button>
                                                    </div>
                                                </div>

                                        </div>
                                        </form>
                                        <div class="tab-pane fade " id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">
                                            <form novalidate>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>رمز عبور قدیمی</label>
                                                                <input type="password" class="form-control text-left" required placeholder="رمز عبور قدیمی" data-validation-required-message="وارد کردن رمز عبور قدیمی الزامی است" dir="ltr">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>رمز عبور جدید</label>
                                                                <input type="password" name="password" class="form-control text-left" placeholder="رمز عبور جدید" required data-validation-required-message="وارد کردن رمز عبور الزامی است" minlength="6" data-validation-minlength-message="حداقل 6 کاراکتر وارد کنید" dir="ltr">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>تکرار رمز عبور جدید</label>
                                                                <input type="password" name="con-password" class="form-control text-left" required data-validation-match-match="password" data-validation-match-message="رمز عبور های وارد شده مطابقت ندارند" placeholder="رمز عبور جدید" data-validation-required-message="وارد کردن تکرار رمز عبور الزامی است" minlength="6" data-validation-minlength-message="حداقل 6 کاراکتر وارد کنید" dir="ltr">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit" class="btn btn-primary glow mr-sm-1 mb-1">ذخیره تغییرات</button>
                                                        <button type="reset" class="btn btn-light mb-1">انصراف</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
