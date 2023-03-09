@extends('layouts.home')
@section('csspanel')
    <link rel="stylesheet" type="text/css" href="{{ url('../../panel/assets/vendors/css/tables/datatable/datatables.min.css') }}">

@endsection
@section('title')
    لیست  تنظیمات
@endsection
@section('breadcrumb')
    <ol class="breadcrumb p-0 mb-0">
        <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="bx bx-home-alt"></i></a>
        </li>
        <li class="breadcrumb-item active">لیست تنظیمات سایت
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
                    url:"/api/V1/admin/setting_list",
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
                    {data:'title_website'},
                    {
                        "render": function (data, type, JsonResultRow, meta) {
                            return '<a href="../../../image/setting/logo/'+JsonResultRow.Logo_website+'"><img src="../../../image/setting/logo/'+JsonResultRow.Logo_website+'" style="width: 80px;height: 80px"></a>';
                        },
                    },
                    {
                        "render": function (data, type, JsonResultRow, meta) {
                            return '<a href="../../../image/setting/favicon/'+JsonResultRow.Favicon_website+'"><img src="../../../image/setting/favicon/'+JsonResultRow.Favicon_website+'" style="width: 80px;height: 80px"></a>';
                        },
                    },
                    {data:'copyright_website'},

                    {
                        sortable: false,
                        "render": function ( data, type, full, meta ) {
                            return "<button onclick='edit_setting("+full.id+")' style='background: darkred;border: none;width: 35px;height: 35px;border-radius: 20%;color: white'><span class='action-edit'><i class='bx bxs-edit-alt'></i></span></button>";
                        }
                    }
                ],

            });
        } );
        function edit_setting(id){
           location.href='/admin/setting_edit/'+id;
        }

    </script>
@endsection
@section('content')
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">لیست تنظیمات</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table zero-configuration" id="tblData">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>عنوان وبسایت</th>
                                        <th>لوگو وبسایت</th>
                                        <th>فایوایکن</th>
                                        <th>قانون کپی رایت</th>
                                        <th>عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>عنوان وبسایت</th>
                                        <th>لوگو وبسایت</th>
                                        <th>فایوایکن</th>
                                        <th>قانون کپی رایت</th>
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
