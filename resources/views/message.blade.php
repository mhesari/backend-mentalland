@extends('layoutss.master')
@section('content')
    <main class="app-content">
        <div class="row">
            <div class="col-md-6">
                <div class="tile">
                    <div class="tile-title-w-btn">
                        <h3 style="text-align: center;" class="title">نمره انضباط جدید</h3>
                    </div>
                    <div class="tile-body">
                        <form class="text-center" method="POST" enctype="multipart/form-data" action="{{route('create_m')}}">
                            @CSRF
                            @if($errors->any())
                                <div class="col-md-12">
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                            <br>
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleInputEmail111">بارگذاری صوت برای کلاس / کلاس ها</label>--}}
{{--                                <select class="form-control" name="voices[]"  id="categories" multiple>--}}
{{--                                    --}}{{--                                    @foreach($classes as $class)--}}
{{--                                    --}}{{--                                        <option value="{{ $class->id }}">{{ $class->name}} </option>--}}
{{--                                    --}}{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}

                            <br>
                            <div class="form-group">
                                <label class="col-form-label" for="inputDefault">نام</label>
                                <input class="form-control" name="Name" id="inputDefault" type="text">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" for="inputDefault">ایمیل</label>
                                <input class="form-control" name="Email" id="inputDefault" type="text">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" for="inputDefault">متن</label>
                                <input class="form-control" name="Message" id="inputDefault" type="text">
                            </div>
                            <br> <br> <br>
                            <button type="submit" class="btn btn-primary mr-2">ارسال تکلیف</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    </body>
@endsection

