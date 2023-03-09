@extends('layouts.home')
@section('breadcrumb')
    <ol class="breadcrumb p-0 mb-0">
        <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="bx bx-home-alt"></i></a>
        </li>
        <li class="breadcrumb-item"><a href="/admin/setting_list">لیست تنظیمات سایت</a>
        </li>
        <li class="breadcrumb-item active">ویرایش تنظیمات سایت
        </li>
    </ol>
@endsection
@section('title')
    ویرایش تنظیمات
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
            $('#UpdateSetting').on('submit', (function (e) {
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
                                location.href = "/admin/setting_list"
                            }
                        })
                    },
                    error: function (error) {
                        var text = error.responseText;
                        var obj = JSON.parse(text);
                        if (obj.errors.title_s === undefined) {
                            document.getElementById('titless').innerHTML = " "

                        } else {
                            document.getElementById('titless').innerHTML = obj.errors.title_s

                        }
                        if (obj.errors.seo_s === undefined) {
                            document.getElementById('seosss').innerHTML = " "

                        } else {
                            document.getElementById('seosss').innerHTML = obj.errors.seo_s

                        }
                        if (obj.errors.keyword_seo === undefined) {
                            document.getElementById('keywordseoss').innerHTML = " "

                        } else {
                            document.getElementById('keywordseoss').innerHTML = obj.errors.keyword_seo

                        }
                        if (obj.errors.favicon_setting === undefined) {
                            document.getElementById('faviconsettingss').innerHTML = " "

                        } else {
                            document.getElementById('faviconsettingss').innerHTML = obj.errors.favicon_setting

                        }
                        if (obj.errors.logo_setting === undefined) {
                            document.getElementById('logosettings').innerHTML = " "

                        } else {
                            document.getElementById('logosettings').innerHTML = obj.errors.logo_setting

                        }
                        if (obj.errors.aboutUs_setting === undefined) {
                            document.getElementById('aboutUssettingss').innerHTML = " "

                        } else {
                            document.getElementById('aboutUssettingss').innerHTML = obj.errors.aboutUs_setting

                        }
                        if (obj.errors.copyright_website === undefined) {
                            document.getElementById('copyrightwebsites').innerHTML = " "

                        } else {
                            document.getElementById('copyrightwebsites').innerHTML = obj.errors.copyright_website

                        }
                    }
                });
            }));
        });


    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endsection
@section('content')
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">ویرایش تنظیمات</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" id="UpdateSetting" action="/api/V1/admin/setting_update/{{ $setting->id }}">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-column" value="{{ $setting->title_website }}" class="form-control" placeholder="عنوان وبسایت" name="title_s">
                                                <label for="first-name-column">عنوان وبسایت</label>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="titless"></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <input type="file" id="last-name-column" class="form-control" placeholder="لوگو وبسایت" name="logo_setting">
                                                <label for="last-name-column">لوگو وبسایت</label>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="logosettings"></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <input type="file" id="city-column" class="form-control" placeholder="فایوایکن" name="favicon_setting">
                                                <label for="city-column">فایوایکن</label>
                                                <span class="invalid-feedback" role="alert">
                                                        <strong id="faviconsettingss"></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="country-floating" value="{{ $setting->seo_website }}" class="form-control" name="seo_s" placeholder="سئو">
                                                <label for="country-floating">سئو</label>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="seosss"></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="company-column" value="{{ $setting->keyword_website }}" class="form-control" name="keyword_seo" placeholder="کلمات کلیدی">
                                                <label for="company-column">کلمات کلیدی</label>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="keywordseoss"></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="company-column" value="{{ $setting->copyright_website }}" class="form-control" name="copyright_website" placeholder="کپی رایت">
                                                <label for="company-column">کپی رایت</label>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="copyrightwebsites"></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-label-group">
                                                <textarea name="aboutUs_setting" class="form-control" placeholder="درباره ی ما" id="" cols="30" rows="10">{{ $setting->aboutme }}</textarea>
                                                <label for="email-id-column">درباره ی ما</label>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="aboutUssettingss"></strong>
                                                </span>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
