@extends('template.tmp')

@section('title', $pagetitle)


@section('content')

    <style id="compiled-css" type="text/css">
        .highcharts-figure,
        .highcharts-data-table table {
            min-width: 360px;
            max-width: 800px;
            margin: 1em auto;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #ebebeb;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }

        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
            padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }

        /* EOS */
    </style>



    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                            <div class="page-title-right ">
                                <strong class="text-danger">{{ session::get('Email') }}</strong>

                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->



                @if (session('error'))
                    <div class="alert alert-{{ Session::get('class') }} p-3" id="success-alert">

                        {{ Session::get('error') }}
                    </div>
                @endif

                @if (count($errors) > 0)

                    <div>
                        <div class="alert alert-danger pt-3 pl-0   border-3 bg-danger text-white">
                            <p class="font-weight-bold"> There were some problems with your input.</p>
                            <ul>

                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                @endif




                <div class="row">

                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="card">
                                    <div class="card-body border-secondary border-top border-3 rounded-top">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="avatar-xs me-3">
                                                <span
                                                    class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                                    <i class="mdi mdi-passport"></i>
                                                </span>
                                            </div>
                                            <h5 class="font-size-14 mb-0">Total Jobs</h5>
                                        </div>
                                        <div class="text-muted mt-4">
                                            <h4 class="text-center"><a href="{{ route('jobs.list') }}">{{ $totalJobs }}
                                                </a> </h4>
                                            <div class="d-flex">
                                                <span class="ms-2 text-truncate mt-3"> </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>

                            <div class="col-sm-3">
                                <div class="card">
                                    <div class="card-body border-secondary border-top border-3 rounded-top">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="avatar-xs me-3">
                                                <span
                                                    class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                                    <i class="mdi mdi-passport"></i>
                                                </span>
                                            </div>
                                            <h5 class="font-size-14 mb-0">In Progress Jobs</h5>
                                        </div>
                                        <div class="text-muted mt-4">
                                            <h4 class="text-center"><a
                                                    href="{{ route('jobs.list', ['status' => 'In-Progress']) }}">{{ $inProgressJobs }}
                                                </a> </h4>
                                            <div class="d-flex">
                                                <span class="ms-2 text-truncate mt-3"> </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="card">
                                    <div class="card-body border-secondary border-top border-3 rounded-top">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="avatar-xs me-3">
                                                <span
                                                    class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                                    <i class="mdi mdi-calendar-cursor font-size-30 "></i>
                                                </span>
                                            </div>
                                            <h5 class="font-size-14 mb-0">Pending Jobs </h5>
                                        </div>
                                        <div class="text-muted mt-4">
                                            <h4 class="text-center"><a
                                                    href="{{ route('jobs.list', ['status' => 'Pending']) }}">{{ $pendingJobs }}


                                                </a> </h4>

                                            <div class="d-flex">
                                                <span class="ms-2 text-truncate mt-3"> </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="card">
                                    <div class="card-body border-secondary border-top border-3 rounded-top">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="avatar-xs me-3">
                                                <span
                                                    class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                                    <i class="mdi mdi-calendar-cursor font-size-30 "></i>
                                                </span>
                                            </div>
                                            <h5 class="font-size-14 mb-0">Completed Jobs </h5>
                                        </div>
                                        <div class="text-muted mt-4">
                                            <h4 class="text-center"><a
                                                    href="{{ route('jobs.list', ['status' => 'Completed']) }}">{{ $completedJobs }}


                                                </a> </h4>

                                            <div class="d-flex">
                                                <span class="ms-2 text-truncate mt-3"> </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <!-- end row -->
                    </div>
                </div>

                <div class="row">

                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="card">
                                    <div class="card-body border-secondary border-top border-3 rounded-top">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="avatar-xs me-3">
                                                <span
                                                    class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                                    <i class="mdi mdi-passport"></i>
                                                </span>
                                            </div>
                                            <h5 class="font-size-14 mb-0">Reviewed Jobs</h5>
                                        </div>
                                        <div class="text-muted mt-4">
                                            <h4 class="text-center"><a
                                                    href="{{ route('jobs.list', ['status' => 'Reviewed']) }}">{{ $reviewedJobs }}
                                                </a> </h4>
                                            <div class="d-flex">
                                                <span class="ms-2 text-truncate mt-3"> </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>

                        </div>


                    @endsection
