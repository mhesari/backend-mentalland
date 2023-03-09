@extends('layouts.home')
@section('breadcrumb')
    <ol class="breadcrumb p-0 mb-0">

        <li class="breadcrumb-item active"><i class="bx bx-home-alt"></i>
        </li>
    </ol>
@endsection
@section('title')
    داشبورد
@endsection
@section('content')
    <section id="dashboard-ecommerce">
        <div class="row">
            <div class="col-xl-12 col-12 dashboard-users">
                <div class="row  ">
                    <!-- Statistics Cards Starts -->
                    <div class="col-12">
                        <div class="row">
                            @if (Auth::user()->hasRole('manager'))

                            <div class="col-sm-4 col-12 dashboard-users-success">
                                <div class="card text-center">
                                    <div class="card-content">
                                        <div class="card-body py-1">
                                            <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto my-75">
                                                <i class="bx bxs-briefcase font-medium-5"></i>
                                            </div>
                                            <div class="text-muted line-ellipsis line-height-2 mb-50">اگهی ها</div>
                                            <h3 class="line-height-1 mb-50 primary-font">{{ $adv }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-12 dashboard-users-danger">
                                <div class="card text-center">
                                    <div class="card-content">
                                        <div class="card-body py-1">
                                            <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto my-75">
                                                <i class="bx bx-user font-medium-5"></i>
                                            </div>
                                            <div class="text-muted line-ellipsis line-height-2 mb-50">کاربران </div>
                                            <h3 class="line-height-1 mb-50 primary-font">{{ $users }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-12 dashboard-users-danger">
                                <div class="card text-center">
                                    <div class="card-content">
                                        <div class="card-body py-1">
                                            <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto my-75">
                                                <i class="bx bx-news font-medium-5"></i>
                                            </div>
                                            <div class="text-muted line-ellipsis line-height-2 mb-50">مقالات</div>
                                            <h3 class="line-height-1 mb-50 primary-font">{{ $blogs }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-12 dashboard-users-danger">
                                <div class="card text-center">
                                    <div class="card-content">
                                        <div class="card-body py-1">
                                            <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto my-75">
                                                <i class="bx bx-user-pin font-medium-5"></i>
                                            </div>
                                            <div class="text-muted line-ellipsis line-height-2 mb-50">مدیران</div>
                                            <h3 class="line-height-1 mb-50 primary-font">{{ $manager }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-12 dashboard-users-danger">
                                <div class="card text-center">
                                    <div class="card-content">
                                        <div class="card-body py-1">
                                            <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto my-75">
                                                <i class="bx bx-user-minus font-medium-5"></i>
                                            </div>
                                            <div class="text-muted line-ellipsis line-height-2 mb-50">کارفرمایان</div>
                                            <h3 class="line-height-1 mb-50 primary-font">{{ $empolyee }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-12 dashboard-users-danger">
                                <div class="card text-center">
                                    <div class="card-content">
                                        <div class="card-body py-1">
                                            <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto my-75">
                                                <i class="bx bxs-user-detail font-medium-5"></i>
                                            </div>
                                            <div class="text-muted line-ellipsis line-height-2 mb-50">مشاوران</div>
                                            <h3 class="line-height-1 mb-50 primary-font">{{ $blogs }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-12 dashboard-users-danger">
                                <div class="card text-center">
                                    <div class="card-content">
                                        <div class="card-body py-1">
                                            <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto my-75">
                                                <i class="bx bxs-card font-medium-5"></i>
                                            </div>
                                            <div class="text-muted line-ellipsis line-height-2 mb-50">رویداد</div>
                                            <h3 class="line-height-1 mb-50 primary-font">{{ $event }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @elseif(Auth::user()->hasRole('consts'))
                                <div class="col-sm-6 col-12 dashboard-users-success">
                                    <div class="card text-center">
                                        <div class="card-content">
                                            <div class="card-body py-1">
                                                <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto my-75">
                                                    <i class="bx bx-user font-medium-5"></i>
                                                </div>
                                                <div class="text-muted line-ellipsis line-height-2 mb-50">تعداد رزروها</div>
                                                <h3 class="line-height-1 mb-50 primary-font">1.2k</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-12 dashboard-users-danger">
                                    <div class="card text-center">
                                        <div class="card-content">
                                            <div class="card-body py-1">
                                                <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto my-75">
                                                    <i class="bx bx-code-block font-medium-5"></i>
                                                </div>
                                                <div class="text-muted line-ellipsis line-height-2 mb-50">تعداد زمان های ست شده</div>
                                                <h3 class="line-height-1 mb-50 primary-font">45.6k</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @elseif(Auth::user()->hasRole('empolyer'))
                                <div class="col-sm-6 col-12 dashboard-users-success">
                                    <div class="card text-center">
                                        <div class="card-content">
                                            <div class="card-body py-1">
                                                <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto my-75">
                                                    <i class="bx bx-briefcase-alt font-medium-5"></i>
                                                </div>
                                                <div class="text-muted line-ellipsis line-height-2 mb-50">اگهی های من</div>
                                                <h3 class="line-height-1 mb-50 primary-font">1.2k</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-12 dashboard-users-danger">
                                    <div class="card text-center">
                                        <div class="card-content">
                                            <div class="card-body py-1">
                                                <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto my-75">
                                                    <i class="bx bx-user-plus font-medium-5"></i>
                                                </div>
                                                <div class="text-muted line-ellipsis line-height-2 mb-50">درخواست های اگهی</div>
                                                <h3 class="line-height-1 mb-50 primary-font">45.6k</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @elseif(Auth::user()->hasRole('user'))
                                <div class="col-sm-12 col-12 dashboard-users-success">
                                    <div class="card text-center">
                                        <div class="card-content">
                                            <div class="card-body py-1">
                                                <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto my-75">
                                                    <i class="bx bx-user-pin font-medium-5"></i>
                                                </div>
                                                <div class="text-muted line-ellipsis line-height-2 mb-50">مشاورهای من</div>
                                                <h3 class="line-height-1 mb-50 primary-font">1.2k</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-12 dashboard-users-success">
                                    <div class="card text-center">
                                        <div class="card-content">
                                            <div class="card-body py-1">
                                                <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto my-75">
                                                    <i class="bx bx-user-plus font-medium-5"></i>
                                                </div>
                                                <div class="text-muted line-ellipsis line-height-2 mb-50">درخواست رزومه</div>
                                                <h3 class="line-height-1 mb-50 primary-font">1.2k</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endif

                        </div>
                    </div>
                    <!-- Revenue Growth Chart Starts -->
                </div>
            </div>
        </div>

    </section>
@endsection
