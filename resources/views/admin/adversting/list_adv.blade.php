@extends('layouts.home')
@section('csspanel')
    <link rel="stylesheet" type="text/css" href="{{ url('../../panel/assets/vendors/css/tables/datatable/datatables.min.css') }}">
@endsection
@section('title')
    لیست اگهی
@endsection
@section('breadcrumb')
    <ol class="breadcrumb p-0 mb-0">
        <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="bx bx-home-alt"></i></a>
        </li>
        <li class="breadcrumb-item active">لیست اگهی ها
        </li>
    </ol>
@endsection
@section('script')
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
                    url:"/api/V1/employer/adversting_list",
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
                    {data:'ad_title'},
                    {
                        "render": function (data, type, JsonResultRow, meta) {
                            if (JsonResultRow.Type_cooperation == "full_time"){
                                var type = "نمام وقت"
                            }else if(JsonResultRow.Type_cooperation == "Part_time"){
                                var type = "پاره وقت"

                            }else{
                                var type = "ریموت"

                            }
                            return type;
                        },
                    },
                    {data:'view'},
                    {data:'date_register'},
                    {
                        "render": function (data, type, JsonResultRow, meta) {
                            if (JsonResultRow.status == 1){
                                var state = "<div class='badge badge-success'>تایید شده </div>"
                            }else if(JsonResultRow.status == 0){
                                var state = "<div class='badge badge-info'>در حال بررسی </div>"
                            }else{
                                var state = JsonResultRow.message

                            }
                            return state;
                        },
                    },
                    {
                        sortable: false,
                        "render": function ( data, type, full, meta ) {
                            return "<button onclick='edit_adv("+full.id+")' style='background: darkred;border: none;width: 35px;height: 35px;border-radius: 20%;color: white;margin-left: 2px'><span class='action-edit'><i class='bx bxs-edit'></i></span></button><button onclick='delete_faq("+full.id+")' style='background: darkred;border: none;width: 35px;height: 35px;border-radius: 20%;color: white'><span class='action-edit'><i class='bx bxs-trash'></i></span></button>";
                        }
                    }
                ],

            });
        } );
        function edit_adv(id){
            location.href='/admin/adversting-edit/'+id;
        }
        function delete_faq(id){
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'آیا مطمئنی میخوای غیرفعال کنی؟',
                text: "در صورت غیرفعال کردن اگهی دوباره فعال نمیشود",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'بله, غیرفعال شود!',
                cancelButtonText: 'نه, انصراف میدم!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    var checkedValue = $('.rowID:checked').val();
                    var token = localStorage.getItem('Token');

                    $.ajax({
                        url: "/api/V1/employer/adversting_close/"+id,
                        type: "PATCH",
                        beforeSend: function (xhr) {
                            xhr.setRequestHeader ("Authorization", "Bearer " + token);
                        },
                        success: function (response) {
                            if(response.status == true){
                                Swal.fire({
                                    title: 'موفقیت امیز',
                                    text: 'با موفقیت اگهی غیرفعال شد',
                                    icon: 'success',

                                    showCloseButton: true,
                                    focusConfirm: false,
                                    confirmButtonText:
                                        'تایید',
                                })
                                location.href='/admin/adversting-list/'
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
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-6">
                                <h4 class="card-title">لیست اگهی های من</h4>
                            </div>
                            <div class="col-lg-6">
                                <a href="/admin/adversting-create" class="btn btn-info float-right">افزودن اگهی</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table zero-configuration" id="tblData">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>عنوان اگهی</th>
                                        <th>نوع اگهی</th>
                                        <th>تعداد بازدید</th>
                                        <th>تاریخ ثبت</th>
                                        <th>وضعیت</th>
                                        <th>عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>عنوان اگهی</th>
                                        <th>نوع اگهی</th>
                                        <th>تعداد بازدید</th>
                                        <th>تاریخ ثبت</th>
                                        <th>وضعیت</th>
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
    </section>

@endsection
