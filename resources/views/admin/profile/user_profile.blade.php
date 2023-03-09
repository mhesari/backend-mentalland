@extends('layouts.home')
@section('csspanel')
    <link rel="stylesheet" href="https://unpkg.com/persian-datepicker@1.2.0/dist/css/persian-datepicker.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ url('../../panel/assets/vendors/css/tables/datatable/datatables.min.css') }}">

@endsection
@section('title')
    پروفایل کاربر
@endsection
@section('breadcrumb')
    <ol class="breadcrumb p-0 mb-0">
        <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="bx bx-home-alt"></i></a>
        </li>
        <li class="breadcrumb-item active">پروفایل کاربر
        </li>
    </ol>
@endsection
@section('script')
    <script src="https://unpkg.com/persian-date@latest/dist/persian-date.js"></script>
    <script src="https://unpkg.com/persian-datepicker@latest/dist/js/persian-datepicker.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
    <script>
        function endWork(){
            if( $('#NullInput').is(':checked') ){
                document.getElementById('endWorkCol').style.display="none";
                document.getElementById('EndWork').value  = " ";

            }
            else{
                document.getElementById('endWorkCol').style.display="block";
            }


        }
        function endWorkedicatonal(){
            if( $('#NullInputEdu').is(':checked') ){
                document.getElementById('endWorkColDate').style.display="none";
                document.getElementById('EndWorkEdu').value  = " ";

            }
            else{
                document.getElementById('endWorkColDate').style.display="block";
            }


        }
        $('.observer-example').persianDatepicker({
            observer: true,
            format: 'YYYY/MM/DD',
            altField: '.observer-example-alt'
        });
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
                                location.href = "/admin/profile_user"
                            }
                        })
                    },
                    error: function (error) {
                        var text = error.responseText;
                        var obj = JSON.parse(text);
                        if (obj.errors.Fname === undefined) {
                            document.getElementById('Fnamess').innerHTML = " "

                        } else {
                            document.getElementById('Fnamess').innerHTML = obj.errors.Fname

                        }
                        if (obj.errors.Lname === undefined) {
                            document.getElementById('Lnamess').innerHTML = " "

                        } else {
                            document.getElementById('Lnamess').innerHTML = obj.errors.Lname

                        }
                        if (obj.errors.gender === undefined) {
                            document.getElementById('genderss').innerHTML = " "

                        } else {
                            document.getElementById('genderss').innerHTML = obj.errors.gender

                        }
                        if (obj.errors.avatar === undefined) {
                            document.getElementById('avatarss').innerHTML = " "

                        } else {
                            document.getElementById('avatarss').innerHTML = obj.errors.avatar

                        }
                        if (obj.errors.marital_status === undefined) {
                            document.getElementById('maritalstatuss').innerHTML = " "

                        } else {
                            document.getElementById('maritalstatuss').innerHTML = obj.errors.marital_status

                        }
                        if (obj.errors.date_birthday === undefined) {
                            document.getElementById('datesbirthdayss').innerHTML = " "

                        } else {
                            document.getElementById('datesbirthdayss').innerHTML = obj.errors.date_birthday

                        }
                        if (obj.errors.Expected_Salary === undefined) {
                            document.getElementById('ExpectedSalarys').innerHTML = " "

                        } else {
                            document.getElementById('ExpectedSalarys').innerHTML = obj.errors.Expected_Salary

                        }
                        if (obj.errors.phone_number === undefined) {
                            document.getElementById('phonenumberss').innerHTML = " "

                        } else {
                            document.getElementById('phonenumberss').innerHTML = obj.errors.phone_number

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
            $('#UpdateWork').on('submit', (function (e) {
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
                                location.href = "/admin/profile_user"
                            }
                        })
                    },
                    error: function (error) {
                        var text = error.responseText;
                        var obj = JSON.parse(text);
                        if (obj.errors.title_job === undefined) {
                            document.getElementById('titlejobs').innerHTML = " "

                        } else {
                            document.getElementById('titlejobs').innerHTML = obj.errors.title_job

                        }
                        if (obj.errors.company_name === undefined) {
                            document.getElementById('companynames').innerHTML = " "

                        } else {
                            document.getElementById('companynames').innerHTML = obj.errors.company_name

                        }
                        if (obj.errors.company_city === undefined) {
                            document.getElementById('companycitys').innerHTML = " "

                        } else {
                            document.getElementById('companycitys').innerHTML = obj.errors.company_city

                        }
                        if (obj.errors.start_work === undefined) {
                            document.getElementById('startwork').innerHTML = " "

                        } else {
                            document.getElementById('startwork').innerHTML = obj.errors.start_work

                        }



                    }
                });
            }));
        });
        $(document).ready(function (e) {
            var token = localStorage.getItem('Token');

            $(document).ajaxStart(function () {
                document.getElementById("btnshow").style.display = "block";
                document.getElementById("btnRequest").style.display = "none";

            }).ajaxStop(function () {
                document.getElementById("btnshow").style.display = "none";
                document.getElementById("btnRequest").style.display = "block";
            });
            $('#UpdateEducational').on('submit', (function (e) {
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
                                location.href = "/admin/profile_user"
                            }
                        })
                    },
                    error: function (error) {
                        var text = error.responseText;
                        var obj = JSON.parse(text);
                        if (obj.errors.degree_level === undefined) {
                            document.getElementById('degreelevel').innerHTML = " "

                        } else {
                            document.getElementById('degreelevel').innerHTML = obj.errors.degree_level

                        }
                        if (obj.errors.major === undefined) {
                            document.getElementById('majorss').innerHTML = " "

                        } else {
                            document.getElementById('majorss').innerHTML = obj.errors.major

                        }
                        if (obj.errors.university === undefined) {
                            document.getElementById('universityss').innerHTML = " "

                        } else {
                            document.getElementById('universityss').innerHTML = obj.errors.university

                        }
                        if (obj.errors.start_date === undefined) {
                            document.getElementById('startdates').innerHTML = " "

                        } else {
                            document.getElementById('startdates').innerHTML = obj.errors.start_date

                        }



                    }
                });
            }));
        });
    </script>
    <script src="../../panel/assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="../../panel/assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="../../panel/assets/vendors/js/tables/datatable/dataTables.buttons.min.js"></script>
    <script src="../../panel/assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="../../panel/assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="../../panel/assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
    <script src="../../panel/assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
    <script src="../../panel/assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
    <script src="../../panel/assets/js/scripts/datatables/datatable.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        $(document).ready(function() {
            var b=1;
            var token = localStorage.getItem('Token');

            $('#tblData').DataTable({
                "language": {
                    "paginate": {
                        "previous": "قبلی",
                        "next": "بعدی",
                    },
                    "sSearch": "جستجو : "
                },
                stateSave: false,
                "bDestroy": true,

                "order":[],
                "ajax":{
                    url:"/api/V1/user/work_experence_user_list",
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader ("Authorization", "Bearer " + token);
                    },
                },

                "columns":[
                    {
                        "render": function (data, type, JsonResultRow, meta) {

                            return b++;
                        },
                    },
                    {data:'title_job'},
                    {data:'company_name'},
                    {data:'company_city'},
                    {data:'start_work'},
                    {
                        "render": function (data, type, JsonResultRow, meta) {
                            if (JsonResultRow.end_work){
                                var Check = JsonResultRow.end_work;
                            }else{
                                var Check = "هم اکنون کار میکنید";

                            }
                            return Check;
                        },
                    },
                    {
                        sortable: false,
                        "render": function ( data, type, full, meta ) {
                            return "<button onclick='delete_work("+full.id+")' style='background: darkred;border: none;width: 35px;height: 35px;border-radius: 20%;color: white'><span class='action-edit'><i class='bx bxs-trash'></i></span></button>";
                        }
                    }
                ],

            });
            $('#tblDataEducational').DataTable({
                "language": {
                    "paginate": {
                        "previous": "قبلی",
                        "next": "بعدی",
                    },
                    "sSearch": "جستجو : "
                },
                stateSave: false,
                "bDestroy": true,

                "order":[],
                "ajax":{
                    url:"/api/V1/user/educational_record_list",
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader ("Authorization", "Bearer " + token);
                    },
                },

                "columns":[
                    {
                        "render": function (data, type, JsonResultRow, meta) {

                            return b++;
                        },
                    },
                    {data:'Degree_level'},
                    {data:'Major'},
                    {data:'university'},
                    {data:'start_date'},
                    {
                        "render": function (data, type, JsonResultRow, meta) {
                            if (JsonResultRow.end_date){
                                var Check = JsonResultRow.end_work;
                            }else{
                                var Check = "هم اکنون تحصیل میکنید";

                            }
                            return Check;
                        },
                    },
                    {
                        sortable: false,
                        "render": function ( data, type, full, meta ) {
                            return "<button onclick='delete_educational("+full.id+")' style='background: darkred;border: none;width: 35px;height: 35px;border-radius: 20%;color: white'><span class='action-edit'><i class='bx bxs-trash'></i></span></button>";
                        }
                    }
                ],

            });
        } );
        function delete_work(id){
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'آیا مطمئنی میخوای حذف کنی؟',
                text: "در صورت حذف اطلاعات بازنمیگردد",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'بله, حذف شود!',
                cancelButtonText: 'نه, انصراف میدم!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    var checkedValue = $('.rowID:checked').val();
                    var token = localStorage.getItem('Token');

                    $.ajax({
                        url: "/api/V1/user/work_experence_user_delete/"+id,
                        type: "DELETE",
                        beforeSend: function (xhr) {
                            xhr.setRequestHeader ("Authorization", "Bearer " + token);
                        },
                        success: function (response) {
                            if(response.status == true){
                                Swal.fire({
                                    title: 'موفقیت امیز',
                                    text: 'با موفقیت حذف شد',
                                    icon: 'success',

                                    showCloseButton: true,
                                    focusConfirm: false,
                                    confirmButtonText:
                                        'تایید',
                                })
                                location.href='/admin/profile_user/'
                            }else{
                                Swal.fire({
                                    title: 'هشدار',
                                    text: 'لطفا ابتدا یک سطر را انتخاب نمایید',
                                    icon: 'warning',

                                    showCloseButton: true,
                                    focusConfirm: false,
                                    confirmButtonText:
                                        'تایید',
                                })
                            }


                        }
                    })

                }
            })
        }
        function delete_educational(id){
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'آیا مطمئنی میخوای حذف کنی؟',
                text: "در صورت حذف اطلاعات بازنمیگردد",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'بله, حذف شود!',
                cancelButtonText: 'نه, انصراف میدم!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    var checkedValue = $('.rowID:checked').val();
                    var token = localStorage.getItem('Token');

                    $.ajax({
                        url: "/api/V1/user/educational_record_delete/"+id,
                        type: "DELETE",
                        beforeSend: function (xhr) {
                            xhr.setRequestHeader ("Authorization", "Bearer " + token);
                        },
                        success: function (response) {
                            if(response.status == true){
                                Swal.fire({
                                    title: 'موفقیت امیز',
                                    text: 'با موفقیت حذف شد',
                                    icon: 'success',

                                    showCloseButton: true,
                                    focusConfirm: false,
                                    confirmButtonText:
                                        'تایید',
                                })
                                location.href='/admin/profile_user/'
                            }else{
                                Swal.fire({
                                    title: 'هشدار',
                                    text: 'لطفا ابتدا یک سطر را انتخاب نمایید',
                                    icon: 'warning',

                                    showCloseButton: true,
                                    focusConfirm: false,
                                    confirmButtonText:
                                        'تایید',
                                })
                            }


                        }
                    })

                }
            })
        }

    </script>

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
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" id="account-pill-work" data-toggle="pill" href="#account-vertical-work" aria-expanded="false">
                                    <i class="bx bx-world"></i>
                                    <span>سوابق شغلی</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" id="account-pill-educational" data-toggle="pill" href="#account-vertical-educational" aria-expanded="false">
                                    <i class="bx bxs-log-in"></i>
                                    <span>سوابق تحصیلی</span>
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

                                            <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                                                <form action="/api/V1/user/user_profile" id="UpdateAdmin" method="post">
                                                    @csrf
                                                    {{ method_field('PUT') }}

                                                    <div class="media">
                                                    <a href="">
                                                        <img @if(!empty($profile->avatar)) src="../../image/users/user/profile/{{ $profile->company_logo }}" @else src="../../panel/assets/images/portrait/small/avatar-s-16.jpg" @endif  class="rounded mr-75" alt="profile image" height="64" width="64">
                                                    </a>
                                                    <div class="media-body mt-25">
                                                        <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                            <label for="select-files" class="btn btn-sm btn-light-primary ml-50 mb-50 mb-sm-0">
                                                                <span>ارسال تصویر جدید</span>
                                                                <input id="select-files"  name="company_logo" type="file" hidden>
                                                            </label>
                                                            <button class="btn btn-sm btn-light-secondary ml-50">بازنشانی</button>
                                                        </div>
                                                        <p class="text-muted ml-1 mt-50"><small id="avatarss"></small></p>
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
                                                                <label>نام </label>
                                                                <input type="text" class="form-control" placeholder="نام" value="{{ $profile->Fname }}" name="Fname">
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong id="Fnamess"></strong>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>نام خانوادگی </label>
                                                                <input type="text" class="form-control" placeholder=" نام خانوداگی " value="{{ $profile->Lname }}" name="Lname">
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong id="Lnamess"></strong>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <select name="gender" class="form-control js-example-basic-single" id="">
                                                                    <option value="">لطفا جنسیت را مشخص نمایید</option>
                                                                    <option value="men" @if($profile->gender == "men") selected @endif>مر</option>
                                                                    <option value="women" @if($profile->gender == "women") selected @endif>زن</option>
                                                                </select>
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong id="genderss"></strong>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <select name="marital_status" class="form-control js-example-basic-single" id="">
                                                                    <option value="">لطفا وضعیت تاهل را مشخص نمایید</option>
                                                                    <option value="single" @if($profile->marital_status == "single") selected @endif>مجرد</option>
                                                                    <option value="married" @if($profile->marital_status == "married") selected @endif>متاهل</option>
                                                                </select>
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong id="maritalstatuss"></strong>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <select name="Expected_Salary" class="form-control js-example-basic-single" id="">
                                                                    <option value="">لطفا حقوق پیشنهادی خود را انتخاب نمایید</option>
                                                                    <option value="1 تا 3 میلیون" @if($profile->Expected_Salary == "1 تا 3 میلیون") selected @endif>1 تا 3 میلیون</option>
                                                                    <option value="4 تا 6 میلیون" @if($profile->Expected_Salary == "4 تا 6 میلیون") selected @endif>4 تا 6 میلیون</option>
                                                                    <option value="بیش از 8 میلیون" @if($profile->Expected_Salary == "بیش از 8 میلیون") selected @endif>بیش از 8 میلیون</option>                                                                </select>
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong id="ExpectedSalarys"></strong>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>تاریخ تولد</label>
                                                                <input type="text" class="form-control  observer-example" placeholder="تاریخ تولد"  name="date_birthday">
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong id="datesbirthdayss"></strong>
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
                                                                    <strong id="phonenumberss"></strong>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <select name="province_id"  class="form-control js-example-basic-single" id="provinceID">
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

                                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                        <button type="submit" id="btnRequest" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1"> ذخیره تغییرات</button>
                                                        <button id="btnshow" class="btn btn-primary" type="button" disabled style="display: none">
                                                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                            منتظر بمانید...
                                                        </button>
                                                    </div>
                                                </div>
                                                </form>

                                            </div>
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
                                        <div class="tab-pane fade " id="account-vertical-work" role="tabpanel" aria-labelledby="account-pill-work" aria-expanded="false">
                                            <form action="/api/V1/user/work_experence_user_create" id="UpdateWork" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>عنوان شغل</label>
                                                                <input type="text" class="form-control text-left" name="title_job" placeholder="عنوان شغل" >
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong id="titlejobs"></strong>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>عنوان شرکت</label>
                                                                <input type="text" class="form-control text-left" name="company_name" placeholder="عنوان شرکت" >
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong id="companynames"></strong>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <select name="company_city"  class="form-control js-example-basic-single" id="">
                                                                    @foreach($cites as $city)
                                                                        <option value="{{ $city->namecity }}" >{{ $city->namecity }}</option>
                                                                    @endforeach
                                                                </select>

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>تاریخ شروع</label>
                                                                <input type="text" class="form-control observer-example" name="start_work" placeholder="تاریخ شروع" >
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong id="startwork"></strong>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="col-lg-12 text-center">
                                                            <input type="checkbox" onclick="endWork()" value="1" id="NullInput"><span class="ml-1">هم اکنون مشغول هستم</span>
                                                        </div>
                                                        <div class="form-group" id="endWorkCol">
                                                            <div class="controls">
                                                                <label>تاریخ پایان</label>
                                                                <input type="text" class="form-control observer-example" id="EndWork" name="end_work" placeholder="تاریخ پایان" >
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit" class="btn btn-primary glow mr-sm-1 mb-1">ذخیره تغییرات</button>
                                                        <button type="reset" class="btn btn-light mb-1">انصراف</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <hr>
                                            <div class="col-lg-12">
                                                <h5 class="text-center">
                                                    لیست سوابق شغلی
                                                </h5>
                                                <table class="table zero-configuration" id="tblData">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>عنوان شغلی </th>
                                                        <th>نام شرکت</th>
                                                        <th>شهرستان شرکت</th>
                                                        <th>تاریخ شروع</th>
                                                        <th>تاریخ پایان</th>
                                                        <th>عملیات</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>عنوان شغلی </th>
                                                        <th>نام شرکت</th>
                                                        <th>شهرستان شرکت</th>
                                                        <th>تاریخ شروع</th>
                                                        <th>تاریخ پایان</th>
                                                        <th>عملیات</th>

                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade " id="account-vertical-educational" role="tabpanel" aria-labelledby="account-pill-educational" aria-expanded="false">
                                            <form action="/api/V1/user/educational_record_create" id="UpdateEducational" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>مدرک تحصیلی</label>
                                                                <select name="degree_level" class="form-control" id="">
                                                                    <option value="دیپلم">دیپلم</option>
                                                                    <option value="فوق دیپلم">فوق دیپلم</option>
                                                                    <option value="لیسانس">لیسانس</option>
                                                                    <option value="فوق لیسانس">فوق لیسانس</option>
                                                                    <option value="دکترا">دکترا</option>
                                                                </select>
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong id="degreelevel"></strong>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>رشته</label>
                                                                <input type="text" class="form-control text-left" name="major" placeholder="رشته" >
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong id="majorss"></strong>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>دانشگاه</label>
                                                                <input type="text" class="form-control text-left" name="university" placeholder="دانشگاه" >
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong id="universityss"></strong>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>تاریخ شروع</label>
                                                                <input type="text" class="form-control observer-example" name="start_date" placeholder="تاریخ شروع" >
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong id="startdates"></strong>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="col-lg-12 text-center">
                                                            <input type="checkbox" onclick="endWorkedicatonal()" value="1" id="NullInputEdu"><span class="ml-1">هم اکنون مشغول هستم</span>
                                                        </div>
                                                        <div class="form-group" id="endWorkColDate">
                                                            <div class="controls">
                                                                <label>تاریخ پایان</label>
                                                                <input type="text" class="form-control observer-example" id="EndWorkEdu" name="end_date" placeholder="تاریخ پایان" >
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit" class="btn btn-primary glow mr-sm-1 mb-1">ذخیره تغییرات</button>
                                                        <button type="reset" class="btn btn-light mb-1">انصراف</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <hr>
                                            <div class="col-lg-12">
                                                <h5 class="text-center">
                                                    لیست سوابق تحصیلی
                                                </h5>
                                                <table class="table zero-configuration" id="tblDataEducational">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>عنوان شغلی </th>
                                                        <th>نام شرکت</th>
                                                        <th>شهرستان شرکت</th>
                                                        <th>تاریخ شروع</th>
                                                        <th>تاریخ پایان</th>
                                                        <th>عملیات</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>عنوان شغلی </th>
                                                        <th>نام شرکت</th>
                                                        <th>شهرستان شرکت</th>
                                                        <th>تاریخ شروع</th>
                                                        <th>تاریخ پایان</th>
                                                        <th>عملیات</th>

                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
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
