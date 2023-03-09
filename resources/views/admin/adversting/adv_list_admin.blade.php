@extends('layouts.home')
@section('csspanel')
    <link rel="stylesheet" type="text/css" href="{{ url('../../panel/assets/vendors/css/tables/datatable/datatables.min.css') }}">

@endsection
@section('breadcrumb')
    <ol class="breadcrumb p-0 mb-0">
        <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="bx bx-home-alt"></i></a>
        </li>
        <li class="breadcrumb-item active">لیست اگهی مدیر
        </li>
    </ol>
@endsection
@section('title')
    لیست اگهی ادمین
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
                    url:"/api/V1/admin/adversting_list_admin",
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
                    {data:'company_persian'},
                    {data:'Fname_Lname_manager'},
                    {data:'ad_title'},
                    {data:'date_register'},
                    {
                        "render": function (data, type, JsonResultRow, meta) {
                            if (JsonResultRow.status == 1){
                                var state = "<div class='badge badge-success'>تایید شده </div>"
                            }else if(JsonResultRow.status == 0){
                                var state = "<div class='badge badge-info'>در حال بررسی </div>"
                            }else{
                                var state = "<div class='badge badge-danger'>'+JsonResultRow.message+' </div>"

                            }
                            return state;
                        },
                    },
                    {
                        sortable: false,
                        "render": function ( data, type, full, meta ) {
                            return "<button onclick='single_adv("+full.id+")' style='background: darkred;border: none;width: 35px;height: 35px;border-radius: 20%;color: white;margin-left: 2px'><span class='action-edit'><i class='bx bxs-file'></i></span></button><button onclick='delete_faq("+full.id+")' style='background: darkred;border: none;width: 35px;height: 35px;border-radius: 20%;color: white'><span class='action-edit'><i class='bx bxs-trash'></i></span></button>";
                        }
                    }
                ],

            });
        } );
        function single_adv(id){
            location.href='/admin/single-adversting-admin-list/'+id;
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
                        url: "/api/V1/admin/adversting_delete_admin/"+id,
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
                                location.href='/admin/faq_list/'
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
                        <h4 class="card-title">لیست اگهی های </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table zero-configuration" id="tblData">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>شرکت </th>
                                        <th> نام و نام خانوادگی مدیرعامل </th>
                                        <th>عنوان اگهی</th>
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
                                        <th>شرکت </th>
                                        <th> نام و نام خانوادگی مدیرعامل </th>
                                        <th>نوع اگهی</th>
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
