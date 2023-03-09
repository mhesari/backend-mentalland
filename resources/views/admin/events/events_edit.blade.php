@extends('layouts.home')
@section('csspanel')
    <link rel="stylesheet" href="https://unpkg.com/persian-datepicker@1.2.0/dist/css/persian-datepicker.css">
@endsection
@section('breadcrumb')
    <ol class="breadcrumb p-0 mb-0">
        <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="bx bx-home-alt"></i></a>
        </li>
        <li class="breadcrumb-item"><a href="/admin/event-list">لیست رویدادها</a>
        </li>
        <li class="breadcrumb-item active">ویرایش رویداد
        </li>
    </ol>
@endsection
@section('title')
    ویرایش رویداد
@endsection
@section('script')
    <script src="https://unpkg.com/persian-date@latest/dist/persian-date.js"></script>
    <script src="https://unpkg.com/persian-datepicker@latest/dist/js/persian-datepicker.js"></script>
    <script src="https://cdn.tiny.cloud/1/dzikk7ym099gk68o6a7sxkz550xrm83kgh5shr3nz1uzwqul/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        $('.observer-example').persianDatepicker({
            observer: true,
            format: 'YYYY/MM/DD',
            altField: '.observer-example-alt'
        });
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
                                location.href="/admin/event-list"
                            }
                        })
                    },
                    error: function (error) {
                        var text = error.responseText;
                        var obj = JSON.parse(text);
                        if (obj.errors.title_event === undefined) {
                            document.getElementById('titleevents').innerHTML = " "

                        } else {
                            document.getElementById('titleevents').innerHTML = obj.errors.title_event

                        }
                        if (obj.errors.thumbnail_events === undefined) {
                            document.getElementById('thumbnailevents').innerHTML = " "

                        } else {
                            document.getElementById('thumbnailevents').innerHTML = obj.errors.thumbnail_events

                        }
                        if (obj.errors.teacher_events === undefined) {
                            document.getElementById('teachersevents').innerHTML = " "

                        } else {
                            document.getElementById('teachersevents').innerHTML = obj.errors.teacher_events


                        }
                        if (obj.errors.time_events === undefined) {
                            document.getElementById('timesevents').innerHTML = " "

                        } else {
                            document.getElementById('timesevents').innerHTML = obj.errors.time_events

                        }
                        if (obj.errors.date_events === undefined) {
                            document.getElementById('datesevents').innerHTML = " "

                        } else {
                            document.getElementById('datesevents').innerHTML = obj.errors.date_events

                        }
                        if (obj.errors.view_register === undefined) {
                            document.getElementById('viewregisters').innerHTML = " "

                        } else {
                            document.getElementById('viewregisters').innerHTML = obj.errors.view_register

                        }
                        if (obj.errors.price_event === undefined) {
                            document.getElementById('priceevents').innerHTML = " "

                        } else {
                            document.getElementById('priceevents').innerHTML = obj.errors.price_event

                        }
                        if (obj.errors.description_events === undefined) {
                            document.getElementById('descriptionsevents').innerHTML = " "

                        } else {
                            document.getElementById('descriptionsevents').innerHTML = obj.errors.description_events

                        }
                        if (obj.errors.teacher_image_events === undefined) {
                            document.getElementById('teacherimageevents').innerHTML = " "

                        } else {
                            document.getElementById('teacherimageevents').innerHTML = obj.errors.teacher_image_events

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
                        <h4 class="card-title">افزودن رویداد</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" id="saveFaq" action="/api/V1/admin/events_update/{{ $events->id }}">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-column" value="{{ $events->title_event }}" class="form-control" placeholder="عنوان رویداد" name="title_event">
                                                <label for="first-name-column">عنوان رویداد</label>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="titleevents"></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <input type="file" id="last-name-column" class="form-control" placeholder="تصویر شاخص رویداد" name="thumbnail_events">
                                                <label for="last-name-column">تصویر شاخص رویداد</label>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="thumbnailevents"></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="last-name-column" class="form-control" value="{{ $events->teacher_events }}" placeholder="مدرس دوره" name="teacher_events">
                                                <label for="last-name-column">مدرس دوره</label>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="teachersevents"></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <input type="file" id="last-name-column" class="form-control" placeholder="تصویر مدرس دوره" name="teacher_image_events">
                                                <label for="last-name-column">تصویر مدرس دوره</label>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="teacherimageevents"></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="last-name-column" class="form-control observer-example" placeholder="تاریخ برگزاری دوره" name="date_events">
                                                <label for="last-name-column">تاریخ برگزاری دوره</label>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="datesevents"></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="last-name-column" class="form-control" value="{{ $events->time_events }}" placeholder="ساعت برگزاری دوره" name="time_events">
                                                <label for="last-name-column">ساعت برگزاری دوره</label>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="timesevents"></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <input type="number" id="last-name-column" class="form-control" value="{{ $events->view_register }}" placeholder="تعداد مجاز ثبت نام" name="view_register">
                                                <label for="last-name-column">تعداد مجاز ثبت نام</label>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="viewregisters"></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="last-name-column" class="form-control" value="{{ $events->price_event }}" placeholder="مبلغ دوره" name="price_event">
                                                <label for="last-name-column">مبلغ دوره</label>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="priceevents"></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="last-name-column" class="form-control" value="{{ $events->price_gift_events }}" placeholder="مبلغ تخفیف دوره" name="price_gift_events">
                                                <label for="last-name-column">مبلغ تخفیف دوره</label>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="Priorityfaqss"></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-label-group">
                                                <textarea name="description_events" class="form-control" id="" cols="30" rows="10">{{ $events->description_events }}</textarea>
                                                <label for="last-name-column">توضیحات و سرفصل های دوره</label>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="descriptionsevents"></strong>
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
