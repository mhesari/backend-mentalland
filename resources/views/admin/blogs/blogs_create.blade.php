@extends('layouts.home')
@section('breadcrumb')
    <ol class="breadcrumb p-0 mb-0">
        <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="bx bx-home-alt"></i></a>
        </li>
        <li class="breadcrumb-item"><a href="/admin/blogs-list">لیست مقالات</a>
        </li>
        <li class="breadcrumb-item active">افزودن مقالات
        </li>
    </ol>
@endsection
@section('title')
    افزودن  مقالات
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
                        if (data.status == true){
                            Swal.fire({
                                title: 'موفقیت آمیز',
                                text: "باموفقیت ثبت شد",
                                icon: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'باشه'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.href='/admin/blogs-list'
                                }
                            })
                        }else{
                            document.getElementById('thumbnailblogs').innerHTML = "اپلود تصویر الزامی هست"
                        }

                    },
                    error: function (error) {
                        var text = error.responseText;
                        var obj = JSON.parse(text);
                        if (obj.errors.title_blog === undefined) {
                            document.getElementById('titleblogs').innerHTML = " "

                        } else {
                            document.getElementById('titleblogs').innerHTML = obj.errors.title_blog

                        }
                        if (obj.errors.thumbnail_blog === undefined) {
                            document.getElementById('thumbnailblogs').innerHTML = " "

                        } else {
                            document.getElementById('thumbnailblogs').innerHTML = obj.errors.thumbnail_blog

                        }
                        if (obj.errors.content_blog === undefined) {
                            document.getElementById('contentblogs').innerHTML = " "

                        } else {
                            document.getElementById('contentblogs').innerHTML = obj.errors.content_blog

                        }
                        if (obj.errors.meta_description === undefined) {
                            document.getElementById('metadescriptions').innerHTML = " "

                        } else {
                            document.getElementById('metadescriptions').innerHTML = obj.errors.meta_description

                        }
                        if (obj.errors.category_id === undefined) {
                            document.getElementById('categoryids').innerHTML = " "

                        } else {
                            document.getElementById('categoryids').innerHTML = obj.errors.category_id

                        }
                        if (obj.errors.keyword_description === undefined) {
                            document.getElementById('keyworddescriptions').innerHTML = " "

                        } else {
                            document.getElementById('keyworddescriptions').innerHTML = obj.errors.keyword_description

                        }
                        if (obj.errors.slug === undefined) {
                            document.getElementById('slugss').innerHTML = " "

                        } else {
                            document.getElementById('slugss').innerHTML = obj.errors.slug

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
                        <h4 class="card-title">افزودن  مقالات</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" id="saveFaq" action="/api/V1/admin/blogs_create">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-column"  class="form-control" placeholder="عنوان مقاله" name="title_blog">
                                                <label for="first-name-column">عنوان مقاله</label>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="titleblogs"></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-label-group">
                                                <input type="file" id="first-name-column"  class="form-control" placeholder="تصویر شاخص مقاله" name="thumbnail_blog">
                                                <label for="first-name-column">تصویر شاخص مقاله</label>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="thumbnailblogs"></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-column"  class="form-control" placeholder="مسیر دستیابی به مقاله" name="slug">
                                                <label for="first-name-column">مسیر دستیابی به مقاله</label>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="slugss"></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-label-group">
                                                <select name="category_id" class="form-control" id="">
                                                    <option value="">لطفا دسته بندی مقاله را انتخاب نمایید</option>
                                                    @foreach($category as $categores)
                                                        <option value="{{ $categores->id }}">{{ $categores->title_category }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="first-name-column">دسته بندی مقاله</label>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="categoryids"></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-label-group">
                                                <textarea name="content_blog" class="form-control" id="" cols="30" rows="10"></textarea>
                                                <label for="first-name-column">محتوا مقاله</label>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="contentblogs"></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-column"  class="form-control" placeholder="متا سئو" name="meta_description">
                                                <label for="first-name-column">متا سئو</label>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="metadescriptions"></strong>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-12">
                                            <div class="form-label-group">
                                                <input type="text" id="first-name-column"  class="form-control" placeholder="کلمات کلیدی" name="keyword_description">
                                                <label for="first-name-column">کلمات کلیدی</label>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="keyworddescriptions"></strong>
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
