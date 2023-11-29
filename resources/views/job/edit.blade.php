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
                    <h4 class="mb-sm-0 font-size-18">Job Update</h4>
                  </div>
                </div>  
            </div>
            <div class="card shadow-sm">
                <div class="card-header bg-transparent border-bottom h5">
                      Update Job
                </div>
                <div class="card-body">
                    <form action="{{URL('/JobUpdate')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="JobID" value="{{$job->id}}">
                    <div class="row col-md-12">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="basicpill-firstname-input">Estimate<span class="text-danger">*</span></label>
                                    <select name="EstimateNo" id="EstimateNo" class="form-select select2" name="PartyID" required="">
                                        <option value="">Select</option>
                                        @foreach ($estimates as $key => $value)
                                            <option value="{{$value->EstimateNo}}"  {{($value->EstimateNo== $job->EstimateNo) ? 'selected=selected':'' }}>{{$value->EstimateNo}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row col-md-12">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="basicpill-firstname-input">Job Title<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" value="{{ @$job->name }}" placeholder="Job Title">
                                </div>
                            </div>
                            <div class="col-md-4 mt-1">  
                                  <div class="form-group">
                                       <label class="control-label" for="controller">Type of controller <span class="text-danger">*</span></label>
                                  </div>
                                  <div class="form-check form-check-inline pt-1">
                                      <input class="form-check-input" type="radio" name="controller_type" id="mr" value="MRL" required="" {{( 'MRL' == $job->controller_type) ? 'checked':'' }}>
                                      <label class="form-check-label" for="mr">MRL</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" required="" name="controller_type" id="mr" value="MR" {{( 'MR' == $job->controller_type) ? 'checked':'' }}>
                                      <label class="form-check-label" for="mr">MR</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" required="" name="controller_type" id="hydralic" value="HYDRAULIC" {{( 'HYDRAULIC' == $job->controller_type) ? 'checked':'' }}>
                                      <label class="form-check-label" for="hydralic">HYDRAULIC</label>
                                  </div>
                             </div>
                             <div class="col-md-4 mt-1">  
                                  <div class="form-group">
                                       <label class="control-label" for="controller">Number of Stops <span class="text-danger">*</span></label>
                                  </div>
                                  <div class="form-check form-check-inline pt-1">
                                      <input class="form-check-input" type="radio" name="no_of_steps" id="mr" value="2" required="" {{( '2' == $job->no_of_steps) ? 'checked':'' }}>
                                      <label class="form-check-label" for="mr">2</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" required="" name="no_of_steps" id="mr" value="3" {{( '3' == $job->no_of_steps) ? 'checked':'' }}>
                                      <label class="form-check-label" for="mr">3</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" required="" name="no_of_steps" id="hydralic" value="4" {{( '4' == $job->no_of_steps) ? 'checked':'' }}>
                                      <label class="form-check-label" for="hydralic">4</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" required="" name="no_of_steps" id="hydralic" value="5" {{( '5' == $job->no_of_steps) ? 'checked':'' }}>
                                      <label class="form-check-label" for="hydralic">5</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" required="" name="no_of_steps" id="hydralic" value="6" {{( '6' == $job->no_of_steps) ? 'checked':'' }}>
                                      <label class="form-check-label" for="hydralic">6</label>
                                  </div>

                             </div>
                        </div>

                        <div class="row col-md-12 mt-5">
                            <div class="col-md-4">  
                                  <div class="form-group">
                                       <label class="control-label" for="controller">Overspeed Governor Voltage<span class="text-danger">*</span></label>
                                  </div>
                                  <div class="form-check form-check-inline pt-1">
                                      <input class="form-check-input" type="radio" name="overspeed_governer_voltage" id="mr" value="48V AC" required="" {{( '48V AC' == $job->overspeed_governer_voltage) ? 'checked':'' }}>
                                      <label class="form-check-label" for="mr">48V AC</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" required="" name="overspeed_governer_voltage" id="mr" value="24V DC" {{( '24V DC' == $job->overspeed_governer_voltage) ? 'checked':'' }}>
                                      <label class="form-check-label" for="mr">24V DC</label>
                                  </div>
                             </div>
                             <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="basicpill-firstname-input">Brake Voltage<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="brake_voltage" value="{{ @$job->brake_voltage }}" placeholder="Brake Voltage" >
                                </div>
                             </div>
                             <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="basicpill-firstname-input">Moter<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="moter" value="{{ @$job->moter }}" placeholder="Moter">
                                </div>
                             </div>
                        </div>

                        <div class="row col-md-12 mt-5">
                            <div class="col-md-4">  
                                  <div class="form-group">
                                       <label class="control-label" for="controller">Encoder type<span class="text-danger">*</span></label>
                                  </div>
                                  <div class="form-check form-check-inline pt-1">
                                      <input class="form-check-input" type="radio" name="encoder_type" id="mr" value="ECN 1313" required="" {{( 'ECN 1313' == $job->encoder_type) ? 'checked':'' }}>
                                      <label class="form-check-label" for="mr">ECN 1313</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" required="" name="encoder_type" id="mr" value="ERN1387" {{( 'ERN1387' == $job->encoder_type) ? 'checked':'' }}>
                                      <label class="form-check-label" for="mr">ERN1387</label>
                                  </div>
                            </div>
                            <div class="col-md-4">  
                                  <div class="form-group">
                                       <label class="control-label" for="controller">Number of Entrance<span class="text-danger">*</span></label>
                                  </div>
                                  <div class="form-check form-check-inline pt-1">
                                      <input class="form-check-input" type="radio" name="no_of_entrance" id="mr" value="1" required="" {{( '1' == $job->no_of_entrance) ? 'checked':'' }}>
                                      <label class="form-check-label" for="mr">1</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" required="" name="no_of_entrance" id="mr" value="2" {{( '2' == $job->no_of_entrance) ? 'checked':'' }}>
                                      <label class="form-check-label" for="mr">2</label>
                                  </div>
                            </div>
                            <div class="col-md-4">  
                                  <div class="form-group">
                                       <label class="control-label" for="controller">Rescue<span class="text-danger">*</span></label>
                                  </div>
                                  <div class="form-check form-check-inline pt-1">
                                      <input class="form-check-input" type="radio" name="resue" id="mr" value="with" required="" {{( 'with' == $job->resue) ? 'checked':'' }}>
                                      <label class="form-check-label" for="mr">with</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" required="" name="resue" id="mr" value="without" {{( 'without' == $job->resue) ? 'checked':'' }}>
                                      <label class="form-check-label" for="mr">without</label>
                                  </div>
                            </div>
                        </div>

                        <div class="row col-md-12 mt-5">
                            <div class="col-md-4">  
                                  <div class="form-group">
                                       <label class="control-label" for="controller">Cabin Model<span class="text-danger">*</span></label>
                                  </div>
                                  <div class="form-check form-check-inline pt-1">
                                      <input class="form-check-input" type="radio" name="cabin_model" id="mr" value="hairline" required="" {{( 'hairline' == $job->cabin_model) ? 'checked':'' }}>
                                      <label class="form-check-label" for="mr">Hairline</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" required="" name="cabin_model" id="mr" value="hairline_mirror" {{( 'hairline_mirror' == $job->cabin_model) ? 'checked':'' }}>
                                      <label class="form-check-label" for="mr">Hairline & Mirror</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" required="" name="cabin_model" id="mr" value="other" {{( 'other' == $job->cabin_model) ? 'checked':'' }}>
                                      <label class="form-check-label" for="mr">Other</label>
                                  </div>
                            </div>
                            <div class="col-md-4">  
                                  <div class="form-group">
                                       <label class="control-label" for="controller">DOORS<span class="text-danger">*</span></label>
                                  </div>      
                                  <div class="form-check form-check-inline pt-1">
                                      <input class="form-check-input" type="radio" name="doors" id="mr" value="right" required="" {{( 'right' == $job->doors) ? 'checked':'' }}>
                                      <label class="form-check-label" for="mr">Right</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" required="" name="doors" id="mr" value="left" {{( 'left' == $job->doors) ? 'checked':'' }}>
                                      <label class="form-check-label" for="mr">Left</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" required="" name="doors" id="mr" value="centre" {{( 'centre' == $job->doors) ? 'checked':'' }}>
                                      <label class="form-check-label" for="mr">Centre</label>
                                  </div>

                            </div>
                            <div class="col-md-4">  
                                  <div class="form-group">
                                       <label class="control-label" for="controller">Flooring<span class="text-danger">*</span></label>
                                  </div>         
                                  <div class="form-check form-check-inline pt-1">
                                      <input class="form-check-input" type="radio" name="flooring" id="mr" value="pvc" required="" {{( 'pvc' == $job->flooring) ? 'checked':'' }}>
                                      <label class="form-check-label" for="mr">PVC</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" required="" name="flooring" id="mr" value="no" {{( 'no' == $job->flooring) ? 'checked':'' }}>
                                      <label class="form-check-label" for="mr">No</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" required="" name="flooring" id="mr" value="granite" {{( 'granite' == $job->flooring) ? 'checked':'' }}>
                                      <label class="form-check-label" for="mr">Granite</label>
                                  </div>
                            </div>
                        </div>

                        <div class="row col-md-12 mt-5">
                            <div class="col-md-4">  
                                  <div class="form-group">
                                       <label class="control-label" for="controller">Ropes<span class="text-danger">*</span></label>
                                  </div>                 
                                  <div class="form-check form-check-inline pt-1">
                                      <input class="form-check-input" type="radio" name="ropes" id="mr" value="6mm" required="" {{( '6mm' == $job->ropes) ? 'checked':'' }}>
                                      <label class="form-check-label" for="mr">6mm</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" required="" name="ropes" id="mr" value="6.5mm" {{( '6.5mm' == $job->ropes) ? 'checked':'' }}>
                                      <label class="form-check-label" for="mr">6.5mm</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" required="" name="ropes" id="mr" value="8mm" {{( '8mm' == $job->ropes) ? 'checked':'' }}>
                                      <label class="form-check-label" for="mr">8mm</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" required="" name="ropes" id="mr" value="10mm" {{( '10mm' == $job->ropes) ? 'checked':'' }}>
                                      <label class="form-check-label" for="mr">10mm</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" required="" name="ropes" id="mr" value="other" {{( 'other' == $job->ropes) ? 'checked':'' }}>
                                      <label class="form-check-label" for="mr">other</label>
                                  </div>
                                  
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="basicpill-firstname-input">Meters<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="meters" value="{{$job->meters}}" placeholder="Meters">
                                </div>
                             </div>
                             <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="basicpill-firstname-input">Bundle<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="bundle" value="{{$job->bundle}}" placeholder="Bundle">
                                </div>
                             </div>
                        </div>


                        <div class="row col-md-12 mt-5">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="basicpill-firstname-input">Delivery Date<span class="text-danger">*</span></label>
                                     <div class="input-group" id="datepicker21">
                                                <input type="text" name="delivery_date" autocomplete="off" class="form-control" placeholder="yyyy-mm-dd" data-date-format="yyyy-mm-dd" data-date-container="#datepicker21" data-provide="datepicker" data-date-autoclose="true" value="{{$job->delivery_date}}">
                                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mt-1">  
                                  <div class="form-group">
                                       <label class="control-label" for="controller">Door type<span class="text-danger">*</span></label>
                                  </div>
                                  <div class="form-check form-check-inline pt-1">
                                      <input class="form-check-input" type="radio" name="door_type" id="mr" value="Fermator" required="" {{( 'Fermator' == $job->door_type) ? 'checked':'' }}>
                                      <label class="form-check-label" for="mr">Fermator</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" required="" name="door_type" id="mr" value="Bonex" {{( 'Bonex' == $job->door_type) ? 'checked':'' }}>
                                      <label class="form-check-label" for="mr">Bonex</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" required="" name="door_type" id="mr" value="others" {{( 'others' == $job->door_type) ? 'checked':'' }}>
                                      <label class="form-check-label" for="mr">others</label>
                                  </div>
                            </div>
                            <div class="col-md-4 mt-1">  
                                  <div class="mb-3">
                                    <label for="basicpill-firstname-input">Upload File<span class="text-danger">*</span></label>
                                    @if($job->file != '')
                                    <?php
                                    $ext = pathinfo($job->file, PATHINFO_EXTENSION);
                                    ?>
                                        @if($ext == 'jpeg' || $ext == 'png' || $ext == 'jpg')
                                        <img src="{{ URL('/documents/jobs/' . $job->file) }}" style="width:100px;height: 100px;margin-bottom: 10px;">
                                        @else
                                        <b>{{ @$job->file }}</b>
                                        @endif
                                    <input type="hidden" name="old_file" value="{{@$job->file}}">
                                    @endif
                                    <input type="file" class="form-control" name="file" value="">
                                </div>
                            </div>
                        </div>

                        <div class="row col-md-12 mt-5">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="col-sm-3">
                                        <label class="col-form-label" for="password">Assign Job </label>
                                    </div>
                                    <div class="col-sm-9">
                                        <select name="user_id" id="users" class="form-select select2" required="" disabled>
                                            <option value="">Select User</option>
                                            @foreach ($users as $key => $value)
                                                <option value="{{$value->UserID}}" {{($value->UserID== $user_jobs->user_id) ? 'selected=selected':'' }}>{{$value->FullName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row col-md-12 mt-5">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="basicpill-firstname-input">Additional Details<span class="text-danger">*</span></label>
                                    <textarea name="additional_details" class="form-control" rows="15">{{@$job->additional_details}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6 mt-1">  
                                  <div class="form-group">
                                       <label class="control-label" for="controller">Other materials<span class="text-danger">*</span></label>
                                  </div>
                                  <div class="custom-control custom-checkbox">
                                      <input name="other_materials[]" type="checkbox" class="custom-control-input" id=""  value="Intercom" 
                                        @if(in_array('Intercom', @$other_materials))
                                        checked 
                                        @endif >
                                      <label class="custom-control-label" for="customCheck33079">Intercom </label>
                                      <label>
                                  </div>
                                  <div class="custom-control custom-checkbox">
                                      <input name="other_materials[]" type="checkbox" class="custom-control-input" id=""  value="Load sensor" @if(in_array('Load sensor', $other_materials))
                                        checked 
                                        @endif>
                                      <label class="custom-control-label" for="customCheck33079">Load sensor </label>
                                      <label>
                                  </div>
                                  <div class="custom-control custom-checkbox">
                                      <input name="other_materials[]" type="checkbox" class="custom-control-input" id=""  value="NO sdfs" @if(in_array('NO sdfs', $other_materials))
                                        checked 
                                        @endif>
                                      <label class="custom-control-label" for="customCheck33079">3 NO (sdfs up,sdfs dn,mgm) </label>
                                      <label>
                                  </div>
                                  <div class="custom-control custom-checkbox">
                                      <input name="other_materials[]" type="checkbox" class="custom-control-input" id=""  value="2 bistable" 
                                      @if(in_array('2 bistable', $other_materials))
                                        checked 
                                        @endif>
                                      <label class="custom-control-label" for="customCheck33079">2 bistable (eos up,dn) </label>
                                      <label>
                                  </div>
                                  <div class="custom-control custom-checkbox">
                                      <input name="other_materials[]" type="checkbox" class="custom-control-input" id=""  value="2 limit"

                                      @if(in_array('2 limit', $other_materials))
                                        checked 
                                        @endif

                                        >
                                      <label class="custom-control-label" for="customCheck33079">2 limit switch (eos up,dn) </label>
                                      <label>
                                  </div>
                                  <div class="custom-control custom-checkbox">
                                      <input name="other_materials[]" type="checkbox" class="custom-control-input" id=""  value="final limit"

                                      @if(in_array('final limit', $other_materials))
                                        checked 
                                        @endif
                                        >
                                      <label class="custom-control-label" for="customCheck33079">2 limit switch (final limit) </label>
                                      <label>
                                  </div>
                                  <div class="custom-control custom-checkbox">
                                      <input name="other_materials[]" type="checkbox" class="custom-control-input" id=""  value="4 NO"

                                      @if(in_array('4 NO', $other_materials))
                                        checked 
                                        @endif
                                        >
                                      <label class="custom-control-label" for="customCheck33079">4 NO (sdfs up,sdfs dn,RLV,DZ) </label>
                                      <label>
                                  </div>
                                  <div class="custom-control custom-checkbox">
                                      <input name="other_materials[]" type="checkbox" class="custom-control-input" id=""  value="1 NC"

                                      @if(in_array('1 NC', $other_materials))
                                        checked 
                                        @endif

                                        >
                                      <label class="custom-control-label" for="customCheck33079">1 NC (EM) </label>
                                      <label>
                                  </div>
                                  <div class="custom-control custom-checkbox">
                                      <input name="other_materials[]" type="checkbox" class="custom-control-input" id=""  value="2 Magnet"

                                      @if(in_array('2 Magnet', $other_materials))
                                        checked 
                                        @endif

                                        >
                                      <label class="custom-control-label" for="customCheck33079">2 Magnet 120cm </label>
                                      <label>
                                  </div>
                                  <div class="custom-control custom-checkbox">
                                      <input name="other_materials[]" type="checkbox" class="custom-control-input" id=""  value="4 round"

                                      @if(in_array('4 round', $other_materials))
                                        checked 
                                        @endif

                                        >
                                      <label class="custom-control-label" for="customCheck33079">4 round magnet </label>
                                      <label>
                                  </div>
                                  <div class="custom-control custom-checkbox">
                                      <input name="other_materials[]" type="checkbox" class="custom-control-input" id=""  value="COP"
                                      @if(in_array('COP', $other_materials))
                                        checked 
                                        @endif
                                        >
                                      <label class="custom-control-label" for="customCheck33079">COP </label>
                                      <label>
                                  </div>
                                  <div class="custom-control custom-checkbox">
                                      <input name="other_materials[]" type="checkbox" class="custom-control-input" id=""  value="LOP"
                                      @if(in_array('LOP', $other_materials))
                                        checked 
                                        @endif
                                        >
                                      <label class="custom-control-label" for="customCheck33079">LOP </label>
                                      <label>
                                  </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-lg-8 col-12">
                                <div class="mt-2"><button type="submit" class="btn btn-success w-md float-right" >Save</button>
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