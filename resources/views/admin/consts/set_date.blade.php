@extends('layouts.home')
@section('csspanel')
    <link rel="stylesheet" href="https://unpkg.com/persian-datepicker@1.2.0/dist/css/persian-datepicker.css">
@endsection
@section('breadcrumb')
    <ol class="breadcrumb p-0 mb-0">
        <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="bx bx-home-alt"></i></a>
        </li>
        <li class="breadcrumb-item"><a href="/admin/set-const-list">لیست تاریخ و زمان</a>
        </li>
        <li class="breadcrumb-item active">افزودن تاریخ و زمان
        </li>
    </ol>
@endsection
@section('title')
    افزودن ست کردن زمان مشاور
@endsection
@section('script')
    <script src="https://unpkg.com/persian-date@latest/dist/persian-date.js"></script>
    <script src="https://unpkg.com/persian-datepicker@latest/dist/js/persian-datepicker.js"></script>

    <script>
        document.getElementById('TimeStart').value  = "8:00";
        document.getElementById('TimeEnd').value  = "20:00";

        $('.observer-example').persianDatepicker({
            observer: true,
            format: 'YYYY/MM/DD',
            altField: '.observer-example-alt'
        });
       function check_click(){
           if( $('#checkbox2').is(':checked') ){
                document.getElementById('setCustomizeTime').style.display="block";
               document.getElementById('TimeStart').value  = " ";
               document.getElementById('TimeEnd').value  = " ";

           }
           else{
               document.getElementById('setCustomizeTime').style.display="none";
               document.getElementById('TimeStart').value  = "8:00";
               document.getElementById('TimeEnd').value  = "20:00";
           }

       }

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
                                location.reload()
                            }
                        })
                    },
                    error: function (error) {
                        var text = error.responseText;
                        var obj = JSON.parse(text);
                        if (obj.errors.date === undefined) {
                            document.getElementById('datess').innerHTML = " "

                        } else {
                            document.getElementById('datess').innerHTML = obj.errors.date

                        }
                        if (obj.errors.time_start === undefined) {
                            document.getElementById('timestartss').innerHTML = " "

                        } else {
                            document.getElementById('timestartss').innerHTML = obj.errors.time_start

                        }
                        if (obj.errors.time_end === undefined) {
                            document.getElementById('timeendss').innerHTML = " "

                        } else {
                            document.getElementById('timeendss').innerHTML = obj.errors.time_end

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
                        <h4 class="card-title">ست کردن تاریخ و زمان مشاور</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" id="saveFaq" action="/api/V1/const/set_date_time">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-column"  class="form-control observer-example" placeholder="انتخاب تاریخ" name="date">
                                                <label for="first-name-column">انتخاب تاریخ</label>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="datess"></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-label-group">
                                                <fieldset>
                                                    <div class="checkbox">
                                                        <input type="checkbox" onclick="check_click()" class="checkbox-input" id="checkbox2">
                                                        <label for="checkbox2">شخصی سازی زمان ( میخوام خودم زمان را انتخاب نماییم)</label>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>

                                        <div id="setCustomizeTime" style="display: none;width: 100%">
                                            <div class="col-md-12 col-12">
                                                <div class="form-label-group">
                                                    <input type="text" id="TimeStart" class="form-control" placeholder="زمان شروع" name="time_start">
                                                    <label for="last-name-column">زمان شروع</label>
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong id="timestartss"></strong>
                                                </span>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <div class="form-label-group">
                                                    <input type="text" id="TimeEnd" class="form-control" placeholder="زمان پایان" name="time_end">
                                                    <label for="last-name-column">زمان پایان</label>
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong id="timeendss"></strong>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
