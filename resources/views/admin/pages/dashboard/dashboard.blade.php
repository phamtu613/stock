@extends('admin.layouts.master')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Thống kê trang web </h4>
            </div>
        </div>

        <div class="col-12">
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
    </div>
    <!-- end page title -->


    <div class="row">

        <div class="col-xl-3 col-md-6">
            <div class="card widget-box-two bg-purple">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body wigdet-two-content">
                            <p class="m-0 text-uppercase text-white" title="Statistics">Đăng ký mở tài khoản</p>
                            <h2 class="text-white"><span data-plugin="counterup">{{ $regOpenAccount }}</span>
                                {{-- <i class="mdi mdi-arrow-up text-white font-22"></i></h2>
                            <p class="text-white m-0"><b>10%</b> From previous period</p> --}}
                        </div>
                        <div class="avatar-lg rounded-circle bg-soft-light ml-2 align-self-center">
                            <i class="mdi mdi-chart-line font-22 avatar-title text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->

        <div class="col-xl-3 col-md-6">
            <div class="card widget-box-two bg-info">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body wigdet-two-content">
                            <p class="m-0 text-white text-uppercase" title="User Today">Khách hàng đăng ký tư vấn</p>
                            <h2 class="text-white"><span data-plugin="counterup">{{ $regConsulting }}</span>
                                {{-- <i class="mdi mdi-arrow-up text-white font-22"></i>$</h2>
                            <p class="text-white m-0"><b>5.6%</b> From previous period</p> --}}
                        </div>
                        <div class="avatar-lg rounded-circle bg-soft-light ml-2 align-self-center">
                            <i class="mdi mdi-access-point-network  font-22 avatar-title text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->

        <div class="col-xl-3 col-md-6">
            <div class="card widget-box-two bg-pink">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body wigdet-two-content">
                            <p class="m-0 text-uppercase text-white" title="Request Per Minute">Đăng ký khóa học
                            </p>
                            <h2 class="text-white"><span data-plugin="counterup">{{ $regConsulting }}</span>
                                {{-- <i class="mdi mdi-arrow-up text-white font-22"></i></h2>
                            <p class="text-white m-0"><b>7.02%</b> From previous period</p> --}}
                        </div>
                        <div class="avatar-lg rounded-circle bg-soft-light ml-2 align-self-center">
                            <i class="mdi mdi-timetable font-22 avatar-title text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->

        <div class="col-xl-3 col-md-6">
            <div class="card widget-box-two bg-success">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body wigdet-two-content">
                            <p class="m-0 text-white text-uppercase" title="New Downloads">Tổng User website
                            </p>
                            <h2 class="text-white"><span data-plugin="counterup">{{ $user }}</span>
                                {{-- <i class="mdi mdi-arrow-up text-white font-22"></i></h2>
                            <p class="text-white m-0"><b>9.9%</b> From previous period</p> --}}
                        </div>
                        <div class="avatar-lg rounded-circle bg-soft-light ml-2 align-self-center">
                            <i class="mdi mdi-cloud-download font-22 avatar-title text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->

    </div>
    <!-- end row -->

    <div class="row d-none">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Last 30 days statistics</h4>

                    <div dir="ltr">
                        <div id="donut-chart"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Total Revenue share</h4>
                    <div dir="ltr">
                        <div id="combine-chart"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Total Revenue share</h4>
                    <div dir="ltr">
                        <div id="roated-chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->


    <div class="row d-none">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Recent Projects</h4>

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Project Name</th>
                                    <th>Start Date</th>
                                    <th>Due Date</th>
                                    <th>Status</th>
                                    <th>Assign</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Codefox Admin v1</td>
                                    <td>01/01/2019</td>
                                    <td>26/04/2019</td>
                                    <td><span class="badge badge-info">Released</span></td>
                                    <td>Coderthemes</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Codefox Frontend v1</td>
                                    <td>01/01/2019</td>
                                    <td>26/04/2019</td>
                                    <td><span class="badge badge-success">Released</span></td>
                                    <td>Coderthemes</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Codefox Admin v1.1</td>
                                    <td>01/05/2019</td>
                                    <td>10/05/2019</td>
                                    <td><span class="badge badge-pink">Pending</span></td>
                                    <td>Coderthemes</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Codefox Frontend v1.1</td>
                                    <td>01/01/2019</td>
                                    <td>31/05/2019</td>
                                    <td><span class="badge badge-purple">Work in Progress</span></td>
                                    <td>Coderthemes</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Codefox Admin v1.3</td>
                                    <td>01/01/2019</td>
                                    <td>31/05/2019</td>
                                    <td><span class="badge badge-warning">Coming soon</span></td>
                                    <td>Coderthemes</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Codefox Admin v1</td>
                                    <td>01/01/2019</td>
                                    <td>26/04/2019</td>
                                    <td><span class="badge badge-info">Released</span></td>
                                    <td>Coderthemes</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>Codefox Frontend v1</td>
                                    <td>01/01/2019</td>
                                    <td>26/04/2019</td>
                                    <td><span class="badge badge-success">Released</span></td>
                                    <td>Coderthemes</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="row">
                <div class="col-md-6">
                    <div class="card widget-box-three">
                        <div class="card-body">
                            <div class="media">
                                <div class="bg-icon avatar-lg text-center bg-light rounded-circle">
                                    <i class="fe-database h2 text-muted m-0 avatar-title"></i>
                                </div>
                                <div class="media-body text-right ml-2">
                                    <p class="text-uppercase">Statistics</p>
                                    <h2 class="mb-0"><span data-plugin="counterup">2,562</span></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card widget-box-three">
                        <div class="card-body">
                            <div class="media">
                                <div class="bg-icon avatar-lg text-center bg-light rounded-circle">
                                    <i class="fe-briefcase h2 text-muted m-0 avatar-title"></i>
                                </div>
                                <div class="media-body text-right ml-2">
                                    <p class="text-uppercase">User Today</p>
                                    <h2 class="mb-0"><span data-plugin="counterup">8,542</span></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card widget-box-three">
                        <div class="card-body">
                            <div class="media">
                                <div class="bg-icon avatar-lg text-center bg-light rounded-circle">
                                    <i class="fe-download h2 text-muted m-0 avatar-title"></i>
                                </div>
                                <div class="media-body text-right ml-2">
                                    <p class="text-uppercase">Request Per Minute</p>
                                    <h2 class="mb-0"><span data-plugin="counterup">6,254</span></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card widget-box-three">
                        <div class="card-body">
                            <div class="media">
                                <div class="bg-icon avatar-lg text-center bg-light rounded-circle">
                                    <i class="fe-bar-chart-2 h2 text-muted m-0 avatar-title"></i>
                                </div>
                                <div class="media-body text-right ml-2">
                                    <p class="text-uppercase">New Downloads</p>
                                    <h2 class="mb-0"><span data-plugin="counterup">7,524</span></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card widget-user">
                        <div class="card-body">
                            <img src="{{ asset('admin\images\users\avatar-3.jpg') }}"
                                class="img-fluid d-block rounded-circle avatar-md" alt="user">
                            <div class="wid-u-info">
                                <h5 class="mt-3 mb-1">Chadengle</h5>
                                <p class="text-muted mb-0">coderthemes@gmail.com</p>
                                <div class="user-position">
                                    <span class="text-warning">Admin</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-6">
                    <div class="card widget-user">
                        <div class="card-body">
                            <img src="{{ asset('admin\images\users\avatar-2.jpg') }}"
                                class="img-fluid d-block rounded-circle avatar-md" alt="user">
                            <div class="wid-u-info">
                                <h5 class="mt-3 mb-1">Michael Zenaty</h5>
                                <p class="text-muted mb-0">coderthemes@gmail.com</p>
                                <div class="user-position">
                                    <span class="text-info">User</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end col -->

    </div>
    <!-- end row -->


@endsection
