@extends('layouts.home')
@section('breadcrumb')
    <ol class="breadcrumb p-0 mb-0">
        <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="bx bx-home-alt"></i></a>
        </li>

        <li class="breadcrumb-item active">
            تعریف قیمت مشاور
        </li>
    </ol>
@endsection
@section('title')
    تعریف قیمت مشاور
@endsection
@section('csspanel')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ url('../../panel/assets/vendors/css/tables/datatable/datatables.min.css') }}">

@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
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
                        if (data.response == true){
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
                        }else{
                            Swal.fire({
                                title: 'هشدار',
                                text: "متاسفم شما یکبار این دسته بندی و زیر دسته بندی را ثبت کرده اید",
                                icon: 'warning',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'باشه'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload()
                                }
                            })
                        }

                    },
                    error: function (error) {
                        var text = error.responseText;
                        var obj = JSON.parse(text);
                        if (obj.errors.category_id === undefined) {
                            document.getElementById('categoryidss').innerHTML = " "

                        } else {
                            document.getElementById('categoryidss').innerHTML = obj.errors.category_id

                        }
                        if (obj.errors.subcategory === undefined) {
                            document.getElementById('subcategoryss').innerHTML = " "

                        } else {
                            document.getElementById('subcategoryss').innerHTML = obj.errors.subcategory

                        }
                        if (obj.errors.price === undefined) {
                            document.getElementById('pricess').innerHTML = " "

                        } else {
                            document.getElementById('pricess').innerHTML = obj.errors.price

                        }



                    }
                });
            }));
        });
        $(document).ready(function (){
            var token = localStorage.getItem('Token');

            $('#categoryID').on('change',function (){
               var value = $(this).val();
                $.ajax({
                    url:"/api/V1/const/get_subcategory_value/"+value,
                    type:"GET",
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader ("Authorization", "Bearer " + token);
                    },
                    success:function (response){
                        $('#subcategory option').remove();
                        var trHTML = '';
                        $.each(response.data, function (i, item) {
                            trHTML += '<option value="'+item.id+'">'+item.subcategory_title+'</option>';
                        });
                        $('#subcategory').append(trHTML);

                    }
                })
            });
        })
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
                    url:"/api/V1/const/list_price_const",
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
                    {data:'title_category'},
                    {data:'subcategory_title'},
                    {
                        "render": function (data, type, JsonResultRow, meta) {
                            var formatNumber = new Intl.NumberFormat().format(JsonResultRow.price);
                            return formatNumber+" "+"تومان"

                        },
                    },
                    {
                        sortable: false,
                        "render": function ( data, type, full, meta ) {
                            return "<button onclick='delete_faq("+full.id+")' style='background: darkred;border: none;width: 35px;height: 35px;border-radius: 20%;color: white'><span class='action-edit'><i class='bx bxs-trash'></i></span></button>";
                        }
                    }
                ],

            });
        } );
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
                        url: "/api/V1/const/list_price_const_delete/"+id,
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
                                location.href='/admin/set-price-const/'
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
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">تعریف قیمت مشاور</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" id="saveFaq" action="/api/V1/const/save_price_const">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <select name="category_id" class="form-control js-example-basic-single" id="categoryID">
                                                    <option value="">لطفا دسته بندی را مشخص نمایید</option>
                                                    @foreach($category_const as $category_consts)
                                                    <option value="{{ $category_consts->id }}">{{ $category_consts->title_category }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="categoryidss"></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <select name="subcategory" class="form-control js-example-basic-single" id="subcategory">
                                                    <option value="">لطفا ابتدا دسته بندی والد را مشخص نمایید</option>

                                                </select>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="subcategoryss"></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-label-group">
                                                <input type="text" name="price" class="form-control" placeholder="مبلغ ">
                                                <label for="">مبلغ</label>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="pricess"></strong>
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
                            <hr>
                            <div class="table-responsive">
                                <table class="table zero-configuration" id="tblData">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>عنوان دسته بندی</th>
                                        <th>عنوان زیر دسته بندی</th>
                                        <th>مبلغ</th>
                                        <th>عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                    <tr>
                                        <th>#</th>
                                        <th>عنوان دسته بندی</th>
                                        <th>عنوان زیر دسته بندی</th>
                                        <th>مبلغ</th>
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
