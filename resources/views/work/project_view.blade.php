<style type="text/css">
<!--
.style1 {font-weight: bold}
-->
</style>
@extends('template.tmp')

@section('title', $pagetitle)


@section('content')



<div class="main-content">

  <div class="page-content">
    <div class="container-fluid">
      <!-- start page title -->
                 <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Project Overview</h4>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
      @if (session('error'))

      <div class="alert alert-{{ Session::get('class') }} p-1" id="success-alert">

        {{ Session::get('error') }}
      </div>

      @endif

      @if (count($errors) > 0)

      <div>
        <div class="alert alert-danger p-1   border-3">
          <p class="font-weight-bold"> There were some problems with your input.</p>
          <ul>

            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>

            @endforeach
          </ul>
        </div>
      </div>

      @endif



      
      <div class="card-body">


                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-4">
                                                <img src="{{URL('/')}}/assets/images/companies/img-1.png" alt="" class="avatar-sm">
                                            </div>

                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="text-truncate font-size-15">Skote Dashboard UI</h5>
                                                <p class="text-muted">Separate existence is a myth. For science, music, sport, etc.</p>
                                            </div>
                                        </div>

                                        <h5 class="font-size-15 mt-4">Project Details :</h5>

                                        <p class="text-muted">To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is. The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc,</p>

                                        <div class="text-muted mt-4">
                                            <p><i class="mdi mdi-chevron-right text-primary me-1"></i> To achieve this, it would be necessary</p>
                                            <p><i class="mdi mdi-chevron-right text-primary me-1"></i> Separate existence is a myth.</p>
                                            <p><i class="mdi mdi-chevron-right text-primary me-1"></i> If several languages coalesce</p>
                                        </div>
                                        
                                        <div class="row task-dates">
                                            <div class="col-sm-4 col-6">
                                                <div class="mt-4">
                                                    <h5 class="font-size-14"><i class="bx bx-calendar me-1 text-primary"></i> Start Date</h5>
                                                    <p class="text-muted mb-0">08 Sept, 2019</p>
                                                </div>
                                            </div>
    
                                            <div class="col-sm-4 col-6">
                                                <div class="mt-4">
                                                    <h5 class="font-size-14"><i class="bx bx-calendar-check me-1 text-primary"></i> Due Date</h5>
                                                    <p class="text-muted mb-0">12 Oct, 2019</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Team Members</h4>

                                        <div class="table-responsive">
                                            <table class="table align-middle table-nowrap">
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 50px;"><img src="{{URL('/')}}/assets/images/users/avatar-2.jpg" class="rounded-circle avatar-xs" alt=""></td>
                                                        <td><h5 class="font-size-14 m-0"><a href="javascript: void(0);" class="text-dark">Daniel Canales</a></h5></td>
                                                        <td>
                                                            <div>
                                                                <a href="javascript: void(0);" class="badge bg-primary bg-soft text-primary font-size-11">Frontend</a>
                                                                <a href="javascript: void(0);" class="badge bg-primary bg-soft text-primary font-size-11">UI</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><img src="{{URL('/')}}/assets/images/users/avatar-1.jpg" class="rounded-circle avatar-xs" alt=""></td>
                                                        <td><h5 class="font-size-14 m-0"><a href="javascript: void(0);" class="text-dark">Jennifer Walker</a></h5></td>
                                                        <td>
                                                            <div>
                                                                <a href="javascript: void(0);" class="badge bg-primary bg-soft text-primary font-size-11">UI / UX</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="avatar-xs">
                                                                <span class="avatar-title rounded-circle bg-primary text-white font-size-16">
                                                                    C
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td><h5 class="font-size-14 m-0"><a href="javascript: void(0);" class="text-dark">Carl Mackay</a></h5></td>
                                                        <td>
                                                            <div>
                                                                <a href="javascript: void(0);" class="badge bg-primary bg-soft text-primary font-size-11">Backend</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><img src="{{URL('/')}}/assets/images/users/avatar-4.jpg" class="rounded-circle avatar-xs" alt=""></td>
                                                        <td><h5 class="font-size-14 m-0"><a href="javascript: void(0);" class="text-dark">Janice Cole</a></h5></td>
                                                        <td>
                                                            <div>
                                                                <a href="javascript: void(0);" class="badge bg-primary bg-soft text-primary font-size-11">Frontend</a>
                                                                <a href="javascript: void(0);" class="badge bg-primary bg-soft text-primary font-size-11">UI</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="avatar-xs">
                                                                <span class="avatar-title rounded-circle bg-primary text-white font-size-16">
                                                                    T
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td><h5 class="font-size-14 m-0"><a href="javascript: void(0);" class="text-dark">Tony Brafford</a></h5></td>
                                                        <td>
                                                            <div>
                                                                <a href="javascript: void(0);" class="badge bg-primary bg-soft text-primary font-size-11">Backend</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Overview</h4>

                                        <div id="overview-chart" class="apex-charts" dir="ltr"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Attached Files</h4>
                                        <div class="table-responsive">
                                            <table class="table table-nowrap align-middle table-hover mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 45px;">
                                                            <div class="avatar-sm">
                                                                <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-24">
                                                                    <i class="bx bxs-file-doc"></i>
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-size-14 mb-1"><a href="javascript: void(0);" class="text-dark">Skote Landing.Zip</a></h5>
                                                            <small>Size : 3.25 MB</small>
                                                        </td>
                                                        <td>
                                                            <div class="text-center">
                                                                <a href="javascript: void(0);" class="text-dark"><i class="bx bx-download h3 m-0"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="avatar-sm">
                                                                <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-24">
                                                                    <i class="bx bxs-file-doc"></i>
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-size-14 mb-1"><a href="javascript: void(0);" class="text-dark">Skote Admin.Zip</a></h5>
                                                            <small>Size : 3.15 MB</small>
                                                        </td>
                                                        <td>
                                                            <div class="text-center">
                                                                <a href="javascript: void(0);" class="text-dark"><i class="bx bx-download h3 m-0"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="avatar-sm">
                                                                <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-24">
                                                                    <i class="bx bxs-file-doc"></i>
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-size-14 mb-1"><a href="javascript: void(0);" class="text-dark">Skote Logo.Zip</a></h5>
                                                            <small>Size : 2.02 MB</small>
                                                        </td>
                                                        <td>
                                                            <div class="text-center">
                                                                <a href="javascript: void(0);" class="text-dark"><i class="bx bx-download h3 m-0"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="avatar-sm">
                                                                <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-24">
                                                                    <i class="bx bxs-file-doc"></i>
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <h5 class="font-size-14"><a href="javascript: void(0);" class="text-dark">Veltrix admin.Zip</a></h5>
                                                            <small>Size : 2.25 MB</small>
                                                        </td>
                                                        <td>
                                                            <div class="text-center">
                                                                <a href="javascript: void(0);" class="text-dark"><i class="bx bx-download h3 m-0"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                        </div>
                        <!-- end row -->

      </div>
  </div>
  </div>

</div>
</div>
</div>
<!-- END: Content-->
 <!-- apexcharts -->
<script src="{{URL('/')}}/assets/libs/apexcharts/apexcharts.min.js"></script>
<script src="{{URL('/')}}/assets/js/pages/project-overview.init.js"></script>
@endsection