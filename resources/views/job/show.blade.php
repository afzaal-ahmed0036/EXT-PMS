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
                <div class="col-lg-8">
                    <div class="card card-hover">
                        <div class="card-header">
                            <h4 class="mb-0 text-dark">Job Overview</h4>
                        </div>
                        <div class="card-body">
                            <div class="row mt-4">
                                <div class="col-12 col-sm-6 col-md-4">
                                    <p class="fw-bold">Job Title</p>
                                    <p> <span class="card-text">{{$job->name ?? 'N/A'}}</span></p>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <p class="fw-bold">Controller Type</p>
                                    <p> <span class="card-text">{{$job->controller_type ?? 'N/A'}}</span></p>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <p class="fw-bold">No of Steps</p>
                                    <p> <span class="card-text">{{$job->no_of_steps ?? 'N/A'}}</span></p>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-12 col-sm-6 col-md-4">
                                    <p class="fw-bold">Overseed Governer Voltage</p>
                                    <p> <span class="card-text">{{$job->overspeed_governer_voltage ?? 'N/A'}}</span></p>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <p class="fw-bold">Brake Voltage</p>
                                    <p> <span class="card-text">{{$job->brake_voltage ?? 'N/A'}}</span></p>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <p class="fw-bold">Moter</p>
                                    <p> <span class="card-text">{{$job->moter ?? 'N/A'}}</span></p>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12 col-sm-6 col-md-4">
                                    <p class="fw-bold">Encode Type</p>
                                    <p> <span class="card-text">{{$job->encoder_type ?? 'N/A'}}</span></p>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <p class="fw-bold">No of entrance</p>
                                    <p> <span class="card-text">{{$job->no_of_entrance ?? 'N/A'}}</span></p>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <p class="fw-bold">Rescue</p>
                                    <p> <span class="card-text">{{$job->resue ?? 'N/A'}}</span></p>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12 col-sm-6 col-md-4">
                                    <p class="fw-bold">Delivery Date</p>
                                    <p> <span class="card-text">{{$job->delivery_date ?? 'N/A'}}</span></p>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <p class="fw-bold">Door Type</p>
                                    <p> <span class="card-text">{{$job->door_type ?? 'N/A'}}</span></p>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <p class="fw-bold">Other Materials</p>
                                        @if($job->other_materials)
                                        <p>
                                        <span class="card-text">{{ implode(', ', $job->other_materials) }}</span>
                                        </p>
                                        @endif
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12 col-sm-8 col-md-6">
                                    <p class="fw-bold">Additional Details</p>
                                    <p> <span class="card-text">{{$job->additional_details ?? 'N/A'}}</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-4">
                                <div class="card card-hover">
                                    <div class="card-header">
                                        <h4 class="mb-0 text-dark">Job Detials</h4>
                                    </div>

                                    <div class="card-body">

                                            <table class="table align-middle table-nowrap">
                                                <tbody>
                                                    <tr>
                                                        <td>EstimateNo</td>
                                                        <td>{{$job->EstimateNo ?? 'N/A'}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Assign To</td>
                                                        <td>{{ implode(', ', $job->users->pluck('FullName')->toArray()) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 50px;">Start Date</td>
                                                        <td>{{$job->created_at ?? 'N/A'}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Status</td>
                                                        <td>{{$job->JobStatus ?? 'N/A'}}</td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                    </div>
                                </div>
                            </div>
            </div>
           
            @if(session::get('UserType') == 'User')
                <div class="row">
                    <div class="col-12">
                        <div class="card card-hover">
                            <div class="card-header">
                                <h4 class="mb-0 text-dark">Update Status</h4>
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{route('job.updateStatus')}}">
                                    {{csrf_field()}}
                                    <input type="hidden" name="job_id" value="{{$job->id}}">
                                    <div class="row mt-4">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="col-form-label">Status<span class="text-danger">*</span></label><br>
                                                <select name="job_status" id="status" class="form-select select2" required="" style="width:90%">
                                                    <option value="Pending" {{@$job->JobStatus == 'Pending' ? 'selected': ''}}>Pending</option>
                                                    <option value="In-Progress" {{@$job->JobStatus == 'In-Progress' ? 'selected': ''}}>In Progress</option>
                                                    <option value="Reviewed" {{@$job->JobStatus == 'Reviewed' ? 'selected': ''}}>Reviewed</option>
                                                    <option value="Completed" {{@$job->JobStatus == 'Completed' ? 'selected': ''}}>Completed</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-lg-8 col-12">
                                            <div class="mt-2"><button type="submit" class="btn btn-success w-md float-right" >Update Status</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {

    function delete_confirm2(url,id) {        


        url = '{{URL::TO('/')}}/'+url+'/'+ id;
        
    
       
        jQuery('#staticBackdrop').modal('show', {backdrop: 'static'});
        document.getElementById('delete_link').setAttribute('href' , url);
         
    }
});
</script>
@endsection