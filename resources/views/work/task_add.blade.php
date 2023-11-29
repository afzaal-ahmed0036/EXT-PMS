@extends('template.tmp')
@section('title', $pagetitle)
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            @if (session('error'))
            <div class="alert alert-{{ Session::get('class') }} p-1" id="success-alert">        
                {{ Session::get('error') }}  
            </div>
            @endif
            @if (count($errors) > 0)
            <div>
                <div class="alert alert-danger p-2 border-1">
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
                <div class="col-12">
                  <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Create New Task</h4>
                  </div>
                </div>  
            </div>
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{URL('/SaveProject')}}" method="post">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label" for="password">Project</label>
                                </div>
                                <div class="col-sm-9">
                                    <select name="EstimateNo" id="EstimateNo" class="form-select select2" name="PartyID" required="">
                                        <option value="">Select</option>
                                        <option>Bug Tracker</option>
                                        <option>Camera Motion Sensor System</option>
                                        <option>Email Marketing And Newsletter Service</option>
                                        <option>Language Translation And Localization Service</option>
                                        <optiom>Payment Billing System</optiom>
                                        <option>Restaurant Management</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-3">
                                        <label class="col-form-label" for="email-id">Start Date</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group" id="datepicker21">
                                            <input type="text" name="Date" autocomplete="off" class="form-control" placeholder="yyyy-mm-dd" data-date-format="yyyy-mm-dd" data-date-container="#datepicker21" data-provide="datepicker" data-date-autoclose="true" value="{{date('Y-m-d')}}">
                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label" for="password">Assigned To  </label>
                                </div>
                                <div class="col-sm-9">
                                    <select name="EstimateNo" id="EstimateNo" class="form-select select2" name="PartyID"  required="">
                                        <option value="">Select</option>
                                        <?php foreach ($employee as $key => $value) : ?>
                                            <option value="{{$value->EmployeeID}}">{{$value->FirstName}}&nbsp;{{$value->MiddleName}}&nbsp;{{$value->LastName}}</option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-3">
                                        <label class="col-form-label" for="password">Title </label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input id="TaskTitle" name="TaskTitle" type="text" class="form-control" placeholder="Enter Task Title...">

                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1 row">
                                    <div class="col-sm-3">
                                        <label class="col-form-label" for="email-id">Due Date</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group" id="datepicker21">
                                            <input type="text" name="Date" autocomplete="off" class="form-control" placeholder="yyyy-mm-dd" data-date-format="yyyy-mm-dd" data-date-container="#datepicker21" data-provide="datepicker" data-date-autoclose="true" value="{{date('Y-m-d')}}">
                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                        </div>
                                        <input class="case" type="checkbox" name="without_deadline" id="without_deadline" autocomplete="off">
                                        <label class="col-form-label"> Without Due Date</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <hr class="invoice-spacing">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-1 row">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="password">Description</label>
                                </div>
                                <div class="col-sm-10">
                                     <textarea class="form-control" id="projectdesc" rows="3" placeholder="Enter Project Description..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">

                            <div class="col-lg-8 col-12  ">
                                <iframe src="{{URL('/Attachment')}}" width="100%" height="40%" border="0" scrolling="yes" style="overflow: hidden;height: 150px;"></iframe>

                                <div class="mt-2"><button type="submit" class="btn btn-success w-md float-right" onclick="if (confirm('Are you sure you want to save thie page?')) return true; else return false;">Save</button>
                                    <a href="{{URL('/DeliveryChallan')}}" class="btn btn-secondary w-md float-right">Cancel</a>

                                </div>







                            </div>


                        </div>
                    </form>     
                </div>
            </div>      
        </div>
    </div>
</div>
<!-- END: Content-->
<script type="text/javascript"></script>
@endsection