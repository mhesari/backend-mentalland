@extends('layouts.home')
@section('breadcrumb')
    <ol class="breadcrumb p-0 mb-0">
        <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="bx bx-home-alt"></i></a>
        </li>
        <li class="breadcrumb-item"><a href="/admin/single-adversting-admin-list">لیست اگهی مدیریت</a>
        </li>
        <li class="breadcrumb-item active">جزئیات اگهی
        </li>
    </ol>
@endsection
@section('title')
    جزئیات اگهی
@endsection
@section('script')
    <script>
        function check_adv(){
            var token = localStorage.getItem('Token');

            Swal.fire({
                title: '<strong>تایید و عدم تایید اگهی</strong>',
                icon: 'info',
                html:
                    '<select class="form-control" id="state"><option value="">لطفا وضعیت اگهی را مشخص نمایید</option><option value="1">تایید اگهی</option><option value="2">عدم تایید</option></select>' +
                    '<input class="form-control mt-2" id="message" placeholder="پیام عدم تایید اگهی"> ',
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: 'ذخیره وثبت',
                cancelButtonText: 'انصراف',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        url : "/api/V1/admin/adversting_check_admin/"+{{ $id }},
                        type:"PATCH",
                        data:{
                            "_token":"{{ csrf_token() }}",
                            state : $('#state :selected').val(),
                            message:$('#message').val()
                        },
                        beforeSend: function (xhr) {
                            xhr.setRequestHeader ("Authorization", "Bearer " + token);
                        },
                        success:function (response){
                            if (response.status === true){
                                Swal.fire({
                                    icon: 'success',
                                    title: 'موفقیت امیز',
                                    text: 'با موفقیت ثبت شد',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }else{
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'هشدار',
                                    text: 'متاسفم شما یکبار ثبت را انجام داده اید',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }

                        },
                        error:function (){

                        }
                    })
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire({
                        icon: 'info',
                        title: 'منصرف شدم',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
        }
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

@endsection
@section('content')
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">جزئیات اگهی </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="">عنوان اگهی</label>
                                    <br>
                                    <p>
                                        {{ $adv->ad_title }}
                                    </p>
                                </div>
                                <div class="col-lg-3">
                                    <label for="">عنوان دسته بندی</label>
                                    <br>
                                    <p>
                                        @if($adv->ad_category == "artistic")
                                            هنری
                                        @elseif($adv->ad_category == "Business")
                                            کسب و کار
                                        @elseif($adv->ad_category == "Psychology")
                                            روانشناسی
                                        @endif
                                    </p>
                                </div>
                                <div class="col-lg-3">
                                    <label for="">استان</label>
                                    <br>
                                    <p>
                                        {{ $adv->name }}
                                    </p>
                                </div>
                                <div class="col-lg-3">
                                    <label for="">شهرستان</label>
                                    <br>
                                    <p>
                                        {{ $adv->namecity }}
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="">نوع استخدام</label>
                                    <br>
                                    <p>
                                        @if($adv->Type_cooperation == "full_time")
                                            تمام وقت
                                        @elseif($adv->Type_cooperation == "Part_time")
                                            پاره وقت
                                        @elseif($adv->Type_cooperation == "remote")
                                            دورکار
                                        @endif
                                    </p>
                                </div>
                                <div class="col-lg-3">
                                    <label for="">حقوق</label>
                                    <br>
                                    <p>
                                        {{ $adv->minimum_salary }}

                                    </p>
                                </div>
                                <div class="col-lg-3">
                                    <label for="">سابقه کاری</label>
                                    <br>
                                    <p>
                                        @if($adv->Relevant_work_experience == "3year")
                                           سه سال
                                        @elseif($adv->Relevant_work_experience == "3_6year")
                                            سه تا 6 سال
                                        @elseif($adv->Relevant_work_experience == "6+year")
                                         بیش از 6 سال
                                        @endif

                                    </p>
                                </div>
                                <div class="col-lg-3">
                                    <label for="">تاریخ ثبت</label>
                                    <br>
                                    <p>
                                        {{ $adv->date_register }}

                                    </p>
                                </div>

                            </div>
                            <div class="row">
                                <label for="">توضیحات اگهی</label>
                                <br>
                                <div class="col-lg-12">
                                    {!! $adv->ad_content !!}
                                </div>
                            </div>
                            <hr>
                            <button class="btn btn-primary w-100" onclick="check_adv()" type="button">وضعیت این اگهی</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
