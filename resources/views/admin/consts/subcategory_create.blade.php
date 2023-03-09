@extends('layouts.home')
@section('breadcrumb')
    <ol class="breadcrumb p-0 mb-0">
        <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="bx bx-home-alt"></i></a>
        </li>
        <li class="breadcrumb-item"><a href="/admin/category-const-list">لیست دسته بندی مشاور</a>
        </li>
        <li class="breadcrumb-item"><a href="">لیست دسته بندی مشاور</a>
        </li>
        <li class="breadcrumb-item active">
            افزودن زیر دسته بندی مشاور
        </li>
    </ol>
@endsection
@section('title')
    افزودن دسته بندی مشاور
@endsection
@section('script')
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
                                location.reload()
                            }
                        })
                    },
                    error: function (error) {
                        var text = error.responseText;
                        var obj = JSON.parse(text);
                        if (obj.errors.title_category === undefined) {
                            document.getElementById('titlecategorys').innerHTML = " "

                        } else {
                            document.getElementById('titlecategorys').innerHTML = obj.errors.title_category

                        }
                        if (obj.errors.category_id === undefined) {
                            document.getElementById('categoryidss').innerHTML = " "

                        } else {
                            document.getElementById('categoryidss').innerHTML = obj.errors.category_id

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
                        <h4 class="card-title">افزودن زیردسته  بندی مشاور</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" id="saveFaq" action="/api/V1/admin/subcategory_consts_create">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-column"  class="form-control" placeholder="عنوان دسته بندی" name="title_category">
                                                <label for="first-name-column">عنوان دسته بندی</label>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="titlecategorys"></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <select name="category_id" class="form-control" id="">
                                                    <option value="">لطفا دسته بندی والد را مشخص نمایید</option>
                                                    @foreach($category as $categories)
                                                        <option value="{{ $categories->id }}">{{ $categories->title_category }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="first-name-column">عنوان دسته بندی</label>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="categoryidss"></strong>
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
