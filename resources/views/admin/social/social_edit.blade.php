@extends('layouts.home')
@section('csspanel')
    <link rel = "stylesheet" href = "<?php echo url('../../panel/map/leaflet.contextmenu.css')?>"/>
    <link rel = "stylesheet" href = "<?php echo url('../../panel/map/leaflet-routing-machine.css')?>"/>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"/>

@endsection
@section('breadcrumb')
    <ol class="breadcrumb p-0 mb-0">
        <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="bx bx-home-alt"></i></a>
        </li>
        <li class="breadcrumb-item"><a href="/admin/social_media_list">لیست شبکه های اجتماعی</a>
        </li>
        <li class="breadcrumb-item active">ویرایش شبکه های اجتماعی
        </li>
    </ol>
@endsection
@section('title')
    ویرایش شبکه های اجتماعی
@endsection
@section('script')
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
            integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
            crossorigin=""></script>
    <script src = "<?php echo url('../../panel/map/LeafletConfig.js')?>"></script>
    <script src = "<?php echo url('../../panel/map/scripts.js')?>"></script>

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
                                location.href = "/admin/social_media_list"
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
                            <form class="form" method="post" id="UpdateSetting" action="/api/V1/admin/social_media_update/{{ $social->id }}">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-column" value="{{ $social->instagram_id }}" class="form-control" placeholder="اینستاگرام" name="instagram">
                                                <label for="first-name-column">اینستاگرام</label>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="titless"></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="last-name-column" class="form-control" value="{{ $social->telegram_id }}" placeholder="تلگرام" name="telegram">
                                                <label for="last-name-column">تلگرام</label>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="logosettings"></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="city-column" class="form-control" value="{{ $social->twitter_id }}" placeholder="توئیتر" name="twitter">
                                                <label for="city-column">توئیتر</label>
                                                <span class="invalid-feedback" role="alert">
                                                        <strong id="faviconsettingss"></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="country-floating" value="{{ $social->whatsapp_phone }}" class="form-control" name="whatsapp" placeholder="واتس آپ">
                                                <label for="country-floating">واتس آپ</label>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="seosss"></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="company-column" value="{{ $social->address }}" class="form-control" name="address" placeholder="آدرس">
                                                <label for="company-column">آدرس</label>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="keywordseoss"></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="company-column" value="{{ $social->phone_number }}" class="form-control" name="phone" placeholder="شماره همراه">
                                                <label for="company-column">شماره همراه</label>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="copyrightwebsites"></strong>
                                                </span>
                                            </div>
                                        </div>
                                       <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="company-column" value="{{ $social->email }}" class="form-control" name="email" placeholder="ایمیل">
                                                <label for="company-column">ایمیل</label>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="copyrightwebsites"></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="lon" readonly value="{{ $social->Longitude }}" class="form-control" name="lon" placeholder="طول جغرافیایی">
                                                <label for="company-column">طول جغرافیایی</label>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="copyrightwebsites"></strong>
                                                </span>
                                            </div>
                                        </div>
                                       <div class="col-md-12 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="lat" readonly value="{{ $social->latitude }}" class="form-control" name="lat" placeholder="عرض جغرافیایی">
                                                <label for="company-column">عرض جغرافیایی</label>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="copyrightwebsites"></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-label-group">
                                                <div id="map" class="map" style="position:relative;width:100%;height:400px;"  tabindex="0"></div>

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
