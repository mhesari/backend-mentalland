@extends('layouts.home')
@section('breadcrumb')
    <ol class="breadcrumb p-0 mb-0">
        <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="bx bx-home-alt"></i></a>
        </li>
        <li class="breadcrumb-item"><a href="/admin/faq_list">لیست سوالات متداول</a>
        </li>
        <li class="breadcrumb-item active">افزودن سوالات متداول
        </li>
    </ol>
@endsection
@section('title')
    افزودن سوالات متداول
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
                        if (obj.errors.title_faqs === undefined) {
                            document.getElementById('titlefaqss').innerHTML = " "

                        } else {
                            document.getElementById('titlefaqss').innerHTML = obj.errors.title_faqs

                        }
                        if (obj.errors.content_faqs === undefined) {
                            document.getElementById('contentfaqsss').innerHTML = " "

                        } else {
                            document.getElementById('contentfaqsss').innerHTML = obj.errors.content_faqs

                        }
                        if (obj.errors.Priority_faqs === undefined) {
                            document.getElementById('Priorityfaqss').innerHTML = " "

                        } else {
                            document.getElementById('Priorityfaqss').innerHTML = obj.errors.Priority_faqs

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
                        <h4 class="card-title">افزودن سوالات متداول</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" id="saveFaq" action="/api/V1/admin/faqs_create">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-column"  class="form-control" placeholder="عنوان سوالات" name="title_faqs">
                                                <label for="first-name-column">عنوان سوالات</label>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="titlefaqss"></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="last-name-column" class="form-control" placeholder="پاسخ سوالات" name="content_faqs">
                                                <label for="last-name-column">پاسخ سوالات</label>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="contentfaqsss"></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="last-name-column" class="form-control" placeholder="اولویت" name="Priority_faqs">
                                                <label for="last-name-column">اولویت</label>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="Priorityfaqss"></strong>
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
