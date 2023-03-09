@extends('layouts.home')
@section('csspanel')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section('title')
افزودن اگهی
@endsection
@section('breadcrumb')
    <ol class="breadcrumb p-0 mb-0">
        <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="bx bx-home-alt"></i></a>
        </li>
        <li class="breadcrumb-item"><a href="/admin/adversting-list">لیست اگهی ها</a>
        </li>
        <li class="breadcrumb-item active">افزودن اگهی
        </li>
    </ol>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
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
            $('#saveFaq').on('submit', (function (e) {
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
                                location.href='/admin/adversting-list'
                            }
                        })
                    },
                    error: function (error) {
                        var text = error.responseText;
                        var obj = JSON.parse(text);
                        if (obj.errors.ad_title === undefined) {
                            document.getElementById('adtitless').innerHTML = " "

                        } else {
                            document.getElementById('adtitless').innerHTML = obj.errors.ad_title

                        }
                        if (obj.errors.ad_category === undefined) {
                            document.getElementById('adcategoryss').innerHTML = " "

                        } else {
                            document.getElementById('adcategoryss').innerHTML = obj.errors.ad_category

                        }
                        if (obj.errors.province_id === undefined) {
                            document.getElementById('provinceidss').innerHTML = " "

                        } else {
                            document.getElementById('provinceidss').innerHTML = obj.errors.province_id

                        }
                        if (obj.errors.city_id === undefined) {
                            document.getElementById('cityids').innerHTML = " "

                        } else {
                            document.getElementById('cityids').innerHTML = obj.errors.city_id

                        }
                        if (obj.errors.Type_cooperation === undefined) {
                            document.getElementById('Typecooperationss').innerHTML = " "

                        } else {
                            document.getElementById('Typecooperationss').innerHTML = obj.errors.Type_cooperation

                        }
                        if (obj.errors.minimum_salary === undefined) {
                            document.getElementById('minimumsalaryss').innerHTML = " "

                        } else {
                            document.getElementById('minimumsalaryss').innerHTML = obj.errors.minimum_salary

                        }
                        if (obj.errors.ad_content === undefined) {
                            document.getElementById('adcontentss').innerHTML = " "

                        } else {
                            document.getElementById('adcontentss').innerHTML = obj.errors.ad_content

                        }
                        if (obj.errors.Relevant_work_experience === undefined) {
                            document.getElementById('Relevantworkexperiences').innerHTML = " "

                        } else {
                            document.getElementById('Relevantworkexperiences').innerHTML = obj.errors.Relevant_work_experience

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
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">افزودن اگهی</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" id="saveFaq" action="/api/V1/employer/adversting_save">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-column"  class="form-control" placeholder="عنوان اگهی" name="ad_title">
                                                <label for="first-name-column">عنوان اگهی</label>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="adtitless"></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <select name="ad_category" class="form-control" id="">
                                                    <option value="">لطفا دسته بندی اگهی را انتخاب نمایید</option>
                                                    <option value="artistic">هنری</option>
                                                    <option value="Business">تجارت</option>
                                                    <option value="Psychology">روانشناسی</option>
                                                </select>
                                                <label for="last-name-column">دسته بندی اگهی</label>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="adcategoryss"></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <select name="Type_cooperation" class="form-control" id="">
                                                    <option value="">لطفا نوع همکاری را انتخاب نمایید</option>
                                                    <option value="full_time">تمام وقت</option>
                                                    <option value="Part_time">پاره وقت</option>
                                                    <option value="remote">دورکاری</option>
                                                </select>
                                                <label for="last-name-column">نوع همکاری</label>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="Typecooperationss"></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <select name="minimum_salary" class="form-control" id="">
                                                    <option value="">میزان حقوق انتظاری شما</option>
                                                    <option value="1 تا 3 میلیون">1 تا 3 میلیون</option>
                                                    <option value="4 تا 6 میلیون">4 تا 6 میلیون</option>
                                                    <option value="بیش از 8 میلیون">بیش از 8 میلیون</option>
                                                </select>
                                                <label for="last-name-column">نوع همکاری</label>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="minimumsalaryss"></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <select name="province_id" class="form-control js-example-basic-single" id="provinceID">
                                                    <option value="">استان انتخابی شما</option>
                                                    @foreach($province as $provinces)
                                                    <option value="{{ $provinces->id }}">{{ $provinces->name }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="last-name-column">نوع همکاری</label>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="provinceidss"></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <select name="city_id" class="form-control js-example-basic-single" id="cityList">
                                                    <option value="">لطفا ابتدا استان را انتخاب نمایید</option>
                                                </select>
                                                <label for="last-name-column">نوع همکاری</label>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="cityids"></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-label-group">
                                                <select name="Relevant_work_experience" class="form-control" >
                                                    <option value="">سابقه کاری را انتخاب نمایید</option>
                                                    <option value="3year">سه سال</option>
                                                    <option value="3_6year">سه تا شش سال</option>
                                                    <option value="6+year">بیش از شش سال</option>
                                                </select>
                                                <label for="last-name-column">نوع همکاری</label>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="Relevantworkexperiences"></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-label-group">
                                                <textarea name="ad_content" class="form-control" id="" cols="30" rows="10"></textarea>
                                                <label for="last-name-column">نوع همکاری</label>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="adcontentss"></strong>
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
