@extends('layouts.home')
@section('breadcrumb')
    <ol class="breadcrumb p-0 mb-0">
        <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="bx bx-home-alt"></i></a>
        </li>
        <li class="breadcrumb-item active">پروفایل کارفرما
        </li>
    </ol>
@endsection
@section('title')
    پروفایل کارفرما
@endsection
@section('script')
    <script src="https://cdn.tiny.cloud/1/dzikk7ym099gk68o6a7sxkz550xrm83kgh5shr3nz1uzwqul/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>

        tinymce.init({
            selector: 'textarea',
            plugins: 'advlist autolink lists link image charmap preview anchor pagebreak',
            toolbar_mode: 'floating',
        });
    </script>
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
                                location.href = "/admin/profile_empolyee"
                            }
                        })
                    },
                    error: function (error) {
                        var text = error.responseText;
                        var obj = JSON.parse(text);
                        if (obj.errors.company_english === undefined) {
                            document.getElementById('companyenglishss').innerHTML = " "

                        } else {
                            document.getElementById('companyenglishss').innerHTML = obj.errors.company_english

                        }
                        if (obj.errors.company_persian === undefined) {
                            document.getElementById('companypersianss').innerHTML = " "

                        } else {
                            document.getElementById('companypersianss').innerHTML = obj.errors.company_persian

                        }
                        if (obj.errors.company_logo === undefined) {
                            document.getElementById('avatarass').innerHTML = " "

                        } else {
                            document.getElementById('avatarass').innerHTML = obj.errors.company_logo

                        }
                        if (obj.errors.address_company === undefined) {
                            document.getElementById('addresscompanyss').innerHTML = " "

                        } else {
                            document.getElementById('addresscompanyss').innerHTML = obj.errors.address_company

                        }
                        if (obj.errors.Activity_company === undefined) {
                            document.getElementById('Activitycompanyss').innerHTML = " "

                        } else {
                            document.getElementById('Activitycompanyss').innerHTML = obj.errors.Activity_company

                        }
                        if (obj.errors.bio_company === undefined) {
                            document.getElementById('biocompanyss').innerHTML = " "

                        } else {
                            document.getElementById('biocompanyss').innerHTML = obj.errors.bio_company

                        }
                        if (obj.errors.website_company === undefined) {
                            document.getElementById('websitecompanys').innerHTML = " "

                        } else {
                            document.getElementById('websitecompanys').innerHTML = obj.errors.website_company

                        }
                        if (obj.errors.phone_number === undefined) {
                            document.getElementById('phonenumbers').innerHTML = " "

                        } else {
                            document.getElementById('phonenumbers').innerHTML = obj.errors.phone_number

                        }
                        if (obj.errors.province_id === undefined) {
                            document.getElementById('provinceids').innerHTML = " "

                        } else {
                            document.getElementById('provinceids').innerHTML = obj.errors.province_id

                        }
                        if (obj.errors.city_id === undefined) {
                            document.getElementById('cityids').innerHTML = " "

                        } else {
                            document.getElementById('cityids').innerHTML = obj.errors.city_id

                        }
                        if (obj.errors.Fname_Lname_manager === undefined) {
                            document.getElementById('FnameLnamemanagers').innerHTML = " "

                        } else {
                            document.getElementById('FnameLnamemanagers').innerHTML = obj.errors.Fname_Lname_manager

                        }

                    }
                });
            }));
        });

        $('#provinceID').on('change',function (){
            var value = $(this).val();
            var token = localStorage.getItem('Token');

            $.ajax({
                url:"/api/V1/employer/city/"+value,
                type:"GET",
                beforeSend: function (xhr) {
                    xhr.setRequestHeader ("Authorization", "Bearer " + token);
                },
                success:function (response){
                    $('#cityList option').remove();
                    var trHTML = '';
                    $.each(response.data, function (i, item) {
                        trHTML += '<option value="'+item.id+'">'+item.namecity+'</option>';
                    });
                    $('#cityList').append(trHTML);

                }
            })
        })
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
                                        <form action="/api/V1/employer/employer_profile" id="UpdateAdmin" method="post">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                                                <div class="media">
                                                    <a href="">
                                                        <img @if(!empty($profile->company_logo)) src="../../image/users/admin/profile/{{ $profile->company_logo }}" @else src="../../panel/assets/images/portrait/small/avatar-s-16.jpg" @endif  class="rounded mr-75" alt="profile image" height="64" width="64">
                                                    </a>
                                                    <div class="media-body mt-25">
                                                        <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                            <label for="select-files" class="btn btn-sm btn-light-primary ml-50 mb-50 mb-sm-0">
                                                                <span>ارسال تصویر جدید</span>
                                                                <input id="select-files"  name="company_logo" type="file" hidden>
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
                                                                <label>نام و نام خانوداگی مدیرعامل</label>
                                                                <input type="text" class="form-control" placeholder="نام و نام خانوداگی مدیرعامل" value="{{ $profile->Fname_Lname_manager }}" name="Fname_Lname_manager">
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong id="FnameLnamemanagers"></strong>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>عنوان فارسی شرکت</label>
                                                                <input type="text" class="form-control text-left" placeholder="عنوان فارسی شرکت" value="{{ $profile->company_persian }}" name="company_persian">
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong id="companypersianss"></strong>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>عنوان انگلیسی شرکت</label>
                                                                <input type="text" class="form-control text-left" placeholder="عنوان فارسی شرکت" value="{{ $profile->company_english }}" name="company_english">
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong id="companyenglishss"></strong>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>آدرس شرکت</label>
                                                                <input type="text" class="form-control text-left" placeholder="آدرس شرکت" value="{{ $profile->address_company }}" name="address_company">
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong id="addresscompanyss"></strong>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>نوع فعالیت شرکت</label>
                                                                <select name="Activity_company" class="form-control" id="">
                                                                    <option value="">نوع فعالیت شرکت را انتخاب نمایید</option>
                                                                    <option value="artistic" @if($profile->Activity_company == "artistic") selected @endif>هنری</option>
                                                                    <option value="Business"  @if($profile->Activity_company == "Business") selected @endif>کسب و کار</option>
                                                                    <option value="Psychology"  @if($profile->Activity_company == "Psychology") selected @endif>روانشناسی</option>
                                                                </select>
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong id="Activitycompanyss"></strong>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>شماره همراه ( محرمانه)</label>
                                                                <input type="text" class="form-control text-left" placeholder="شماره همراه" value="{{ $profile->phone_number }}" name="phone_number">
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong id="phonenumbers"></strong>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>وبسایت شرکت</label>
                                                                <input type="text" class="form-control text-left" placeholder="وبسایت شرکت" value="{{ $profile->website_company }}" name="website_company">
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong id="websitecompanys"></strong>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <select name="province_id"  class="form-control" id="provinceID">
                                                                    @foreach($province as $provinces)
                                                                        <option value="{{ $provinces->id }}" @if($provinces->id == $profile->province_id) selected @endif>{{ $provinces->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong id="provinceids"></strong>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <select name="city_id" class="form-control js-example-basic-single" id="cityList">
                                                                    @if($city)
                                                                        <option value="{{ $city->id }}">{{ $city->namecity }}</option>

                                                                    @else
                                                                        <option value="">لطفا ابتدا استان را انتخاب نمایید</option>

                                                                    @endif
                                                                </select>
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong id="cityids"></strong>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>توضیحات در مورد شرکت</label>
                                                                <textarea name="bio_company" id="" cols="30" class="form-control" rows="10">{{ $profile->bio_company }}</textarea>
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong id="biocompanyss"></strong>
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
