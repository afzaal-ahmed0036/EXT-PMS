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
                                    <h4 class="mb-sm-0 font-size-18">Task # T-0001<br>
                                    While the Owl had.</h4>


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
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <th scope="col">Project</th>
                                                        <td scope="col"> Language translation and localization service</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Priority:</th>
                                                        <td>High</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Assigned To</th>
                                                        <td>Trinity Nienow</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Job Type</th>
                                                        <td>Full Time</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Description</th>
                                                        <td>I suppose?' 'Yes,' said Alice as it can't possibly make me smaller, I can find them.' As she said to herself, 'after such a curious dream, dear, certainly: but now run in to your places!' shouted.</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4"><span class=" start-100 translate-middle badge border border-light rounded-circle bg-success p-2"><span class="visually-hidden">unread messages</span></span>Doing</h4>

                                        <div class="table-responsive">
                                            <table class="table align-middle table-nowrap">
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 50px;">Start Date</td>
                                                        <td>24-02-2023</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Due Date</td>
                                                        <td>24-02-2023</td>
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