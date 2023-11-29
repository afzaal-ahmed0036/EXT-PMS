@extends('template.tmp')
@section('title', $pagetitle)
@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
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
                    <div class="card shadow-sm">
                        <form action="{{URL('/CustomerUpdate')}}" method="post">
                            <div class="card-body">
                            {{csrf_field()}}
                            <input type="hidden" name="PartyID" value="{{$customer[0]->PartyID}}">
                            <div>
                                <div>
                                    <h4 class="card-title">Update Party / Customer</h4>
                                    <p class="card-title-desc"></p>
                                    <?php 
    $PartyType = old('PartyType') ? old('PartyType') : $customer[0]->PartyType;
    $Salutation = old('Salutation') ? old('Salutation') : $customer[0]->Salutation;
    $FirstName = old('FirstName') ? old('FirstName') : $customer[0]->FirstName;
    $LastName = old('LastName') ? old('LastName') : $customer[0]->LastName;
    $CompanyName = old('CompanyName') ? old('CompanyName') : $customer[0]->CompanyName;
    $Email = old('Email') ? old('Email') : $customer[0]->Email;
    $WorkPhone = old('WorkPhone') ? old('WorkPhone') : $customer[0]->WorkPhone;
    $Mobile = old('Mobile') ? old('Mobile') : $customer[0]->Mobile;
    $SkypeID = old('SkypeID') ? old('SkypeID') : $customer[0]->SkypeID;
    $Designation = old('Designation') ? old('Designation') : $customer[0]->Designation;
    $Department = old('Department') ? old('Department') : $customer[0]->Department; 
    $Website = old('Website') ? old('Website') : $customer[0]->Website;
    $TaxTreatment = old('TaxTreatment') ? old('TaxTreatment') : $customer[0]->TaxTreatment; 
    $TRN = old('TRN') ? old('TRN') : $customer[0]->TRN;
    $PlaceOfSupply = old('PlaceOfSupply') ? old('PlaceOfSupply') : $customer[0]->PlaceOfSupply;
    $Currency = old('Currency') ? old('Currency') : $customer[0]->Currency; 
    $OpeningBalance = old('OpeningBalance') ? old('OpeningBalance') : $customer[0]->OpeningBalance;
    $Facebook = old('Facebook') ? old('Facebook') : $customer[0]->Facebook; 
    $Twitter = old('Twitter') ? old('Twitter') : $customer[0]->Twitter;
    $BillingAttention = old('BillingAttention') ? old('BillingAttention') : $customer[0]->BillingAttention;
    $BillingCountry = old('BillingCountry') ? old('BillingCountry') : $customer[0]->BillingCountry;
    $BillingAddressLine1 = old('BillingAddressLine1') ? old('BillingAddressLine1') : $customer[0]->BillingAddressLine1;
    $BillingAddressLine2 = old('BillingAddressLine2') ? old('BillingAddressLine2') : $customer[0]->BillingAddressLine2;
    $BillingCity = old('BillingCity') ? old('BillingCity') : $customer[0]->BillingCity;
    $BillingState = old('BillingState') ? old('BillingState') : $customer[0]->BillingState;
    $BillingZipCode = old('BillingZipCode') ? old('BillingZipCode') : $customer[0]->BillingZipCode;
    $BillingPhone = old('BillingPhone') ? old('BillingPhone') : $customer[0]->BillingPhone;
    $BillingFax = old('BillingFax') ? old('BillingFax') : $customer[0]->BillingFax;
    $ShippingAttention = old('ShippingAttention') ? old('ShippingAttention') : $customer[0]->ShippingAttention;
    $ShippingCountry = old('ShippingCountry') ? old('ShippingCountry') : $customer[0]->ShippingCountry;
    $ShippingAddressLine1 = old('ShippingAddressLine1') ? old('ShippingAddressLine1') : $customer[0]->ShippingAddressLine1;
    $ShippingAddressLine2 = old('ShippingAddressLine2') ? old('ShippingAddressLine2') : $customer[0]->ShippingAddressLine2;
    $ShippingCity = old('ShippingCity') ? old('ShippingCity') : $customer[0]->ShippingCity;
    $ShippingState = old('ShippingState') ? old('ShippingState') : $customer[0]->ShippingState;
    $ShippingZipCode = old('ShippingZipCode') ? old('ShippingZipCode') : $customer[0]->ShippingZipCode;
    $ShippingPhone = old('ShippingPhone') ? old('ShippingPhone') : $customer[0]->ShippingPhone;
    $ShippingFax = old('ShippingFax') ? old('ShippingFax') : $customer[0]->ShippingFax;
    $Remarks = old('Remarks') ? old('Remarks') : $customer[0]->Remarks;
                                    ?> 


                             <div class="mb-2 row">
                                        <label for="example-url-input" class="col-md-2 col-form-label fw-bold">Cutomer Type</label>
                                        <div class="col-md-2 mt-2 ">
                                            <input class="form-check-input" type="radio" name="PartyType"
                                                id="formRadios1" {{($PartyType== 'Business') ? 'checked':'' }} value="Business">
                                                <label class="form-check-label" for="formRadios2">
                                                            Business</label>
                                        </div>
                                        <div class="col-md-2 mt-2 form-check">
                                            <input class="form-check-input" type="radio" name="PartyType"
                                                id="formRadios2" {{($PartyType== 'Individual') ? 'checked':'' }} value="Individual" >
                                                <label class="form-check-label" for="formRadios2">
                                                            Individual</label>
                                        </div>
                                    </div>                      
                                    <div class="mb-2 row">
                                        <label for="example-url-input" class="col-md-2 col-form-label fw-bold">Primary Contact</label>
                                        <div class="col-md-1">
                                            <select name="Salutation" class="form-select" >
                                                <option value="">Salutation</option>
                                                <option value="Mr." {{($Salutation== 'Mr.') ? 'selected=selected':'' }}>Mr.</option>
                                                <option value="Miss" {{($Salutation== 'Miss') ? 'selected=selected':'' }}>Miss</option>
                                            </select> 
                                        </div>
                                        <div class="col-md-2">
                                             <input class="form-control" type="text"  name="FirstName" value="{{$FirstName}}" placeholder="First Name"  >
                                        </div>
                                        <div class="col-md-2">
                                             <input class="form-control" type="text"  name="LastName" value="{{$LastName}}" placeholder="Last Name" >
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label for="example-url-input" class="col-md-2 col-form-label fw-bold">Company Name</label>
                                        <div class="col-md-4">
                                            <input class="form-control" type="text"  value="{{$CompanyName}}" name="CompanyName" >
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label for="example-url-input" class="col-md-2 col-form-label fw-bold">Customer Email</label>
                                        <div class="col-md-4">
                                            <input class="form-control" type="text"  value="{{$Email}}" name="Email" >
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label for="example-url-input" class="col-md-2 col-form-label fw-bold">Customer Phone</label>
                                        <div class="col-md-2">
                                            <input class="form-control" type="text"  name="WorkPhone" value="{{$WorkPhone}}" >
                                        </div>
                                        <div class="col-md-2">
                                            <input class="form-control" type="text"  name="Mobile" value="{{$Mobile}}" >
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label for="example-url-input" class="col-md-2 col-form-label fw-bold">Skype Name/Number</label>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i style="min-height:20px;padding-top: 3px;" class="fa fa-skype"></i></span>
                                                    </div>
                                                   <input class="form-control" type="text" name="SkypeID" value="{{$SkypeID}}"  >
                                                </div>

                                            <!--  -->
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label for="example-url-input" class="col-md-2 col-form-label fw-bold">Designation</label>
                                        <div class="col-md-4">
                                            <input class="form-control" type="text"  name="Designation" value="{{$Designation}}"  >
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label for="example-url-input" class="col-md-2 col-form-label fw-bold">Department</label>
                                        <div class="col-md-4">
                                            <input class="form-control" type="text"  name="Department" value="{{$Department}}"  >
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label for="example-url-input" class="col-md-2 col-form-label fw-bold">Website</label>
                                        <div class="col-md-4">
                                            <input class="form-control" type="text"  name="Website" value="{{$Website}}"  >
                                        </div>  
                                    </div>
                                       
                                  
                                
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#other-details" role="tab">
                                        Other Details
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#address" role="tab">
                                        Address
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#remarks" role="tab">
                                        Remarks
                                    </a>
                                </li>
                                
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content p-3">
                                <div class="tab-pane active" id="other-details" role="tabpanel">
                                    <div class="row">
                                        <div>
                                            <div class="mb-1 row">
                                                <label for="example-tel-input" class="col-md-2 col-form-label fw-bold text-danger">Tax Treatment *</label>
                                                <div class="col-md-4">
                                                    <select name="TaxTreatment" class="form-select" required >
                                                        @foreach($tax_treatments as $value)
                                                            <option value="{{$value->TaxTreatmentName}}" {{($TaxTreatment== $value->TaxTreatmentName) ? 'selected=selected': '' }}>{{$value->TaxTreatmentName}}</option>
                                                        @endforeach
                                                    </select> 
                                                </div>
                                            </div> 

                                            <div class="mb-2 row">
                                                <label for="example-url-input" class="col-md-2 col-form-label fw-bold text-danger">Tax Registration <br>Number (TRN)*</label>
                                                <div class="col-md-4">
                                                    <input class="form-control mt-2" type="text"  name="TRN" value="{{$TRN}}" placeholder="Number" required>
                                                </div>
                                            </div>

                                            <div class="mb-1 row">
                                                <label for="example-tel-input" class="col-md-2 col-form-label fw-bold text-danger">Place Of Supply*</label>
                                                <div class="col-md-4">
                                                    <input class="form-control mt-3" type="text"  name="PlaceOfSupply" value="{{$PlaceOfSupply}}" required>
                                                </div>
                                            </div> 

                                            <div class="mb-1 row">
                                                <label for="example-tel-input" class="col-md-2 col-form-label fw-bold">Currency</label>
                                                <div class="col-md-4">
                                                    <select name="Currency" class="form-select" >
                                                        <option value="AED- UAE Dirham" {{($Currency== 'AED- UAE Dirham') ? 'selected=selected':'' }}>AED- UAE Dirham</option>
                                                    </select> 
                                                </div>
                                            </div> 

                                            <div class="mb-2 row">
                                                <label for="example-url-input" class="col-md-2 col-form-label fw-bold">Opening Balance</label>
                                                <div class="col-md-4">
                                                    <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">AED</span>
                                                            </div>
                                                           <input class="form-control" type="text" name="OpeningBalance" value="{{$OpeningBalance}}"  >
                                                        </div>
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label for="example-url-input" class="col-md-2 col-form-label fw-bold">Facebook</label>
                                                <div class="col-md-4">
                                                    <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i style="min-height:20px;padding-top: 3px;" class="fa fa-facebook"></i></span>
                                                            </div>
                                                           <input class="form-control" type="text" name="Facebook" value="{{$Facebook}}"  >
                                                           
                                                    </div>
                                                    <span class="text-muted">http://facebook.com/</span>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="example-url-input" class="col-md-2 col-form-label fw-bold">Twitter</label>
                                                <div class="col-md-4">
                                                    <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i style="min-height:20px;padding-top: 3px;" class="fa fa-twitter"></i></span>
                                                            </div>
                                                           <input class="form-control" type="text" name="Twitter" value="{{$Twitter}}"  >
                                                           
                                                    </div>
                                                    <span class="text-muted">http://twitter.com/</span>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="address" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="card-title">BILLING ADDRESS</h4>
                                            <div class="mb-2 row">
                                                    <label for="example-url-input" class="col-md-4 col-form-label fw-bold">Attention</label>
                                                    <div class="col-md-8">
                                                        <input class="form-control" type="text"  name="BillingAttention" value="{{$BillingAttention}}"  >
                                                    </div>
                                            </div>
                                            <div class="mb-2 row">
                                                    <label for="example-url-input" class="col-md-4 col-form-label fw-bold">Country / Region</label>
                                                    <div class="col-md-8">
                                                        <select name="BillingCountry" class="form-select" >
                                                            @foreach($country as $value)
                                                            <option value="{{$value->CountryName}}"
                                                             {{($BillingCountry == $value->CountryName) ? 'selected=selected': '' }}>{{$value->CountryName}}</option>
                                                            @endforeach
                                                    </select>
                                                    </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="example-url-input" class="col-md-4 col-form-label fw-bold">Address</label>
                                                <div class="col-md-8">
                                                     <textarea name="BillingAddressLine1" class="form-control" rows="3"  placeholder="Street1">{{ $BillingAddressLine1 }}</textarea><br>
                                                     <textarea name="BillingAddressLine2" class="form-control" rows="3" placeholder="Street2">{{ $BillingAddressLine2 }}</textarea>
                                                     
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="example-url-input" class="col-md-4 col-form-label fw-bold">City</label>
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text"  name="BillingCity" value="{{$BillingCity}}"  >
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="example-url-input" class="col-md-4 col-form-label fw-bold">Sate</label>
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text"  name="BillingState" value="{{$BillingState}}" >
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                    <label for="example-url-input" class="col-md-4 col-form-label fw-bold">Zip Code</label>
                                                    <div class="col-md-8">
                                                        <input class="form-control" type="text"  name="BillingZipCode" value="{{$BillingZipCode}}"  >
                                                    </div>
                                                </div>
                                            <div class="mb-2 row">
                                                <label for="example-url-input" class="col-md-4 col-form-label fw-bold">Phone</label>
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text"  name="BillingPhone" value="{{$BillingPhone}}"  >
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="example-url-input" class="col-md-4 col-form-label fw-bold">Fax</label>
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text"  name="BillingFax" value="{{$BillingFax}}"  >
                                                </div>
                                            </div>                                           
                                        </div>

                                        <div class="col-md-6">
                                            <h4 class="card-title">SHIPPING ADDRESS</h4>
                                            <div class="mb-2 row">
                                                    <label for="example-url-input" class="col-md-4 col-form-label fw-bold">Attention</label>
                                                    <div class="col-md-8">
                                                        <input class="form-control" type="text"  name="ShippingAttention" value="{{$ShippingAttention}}"  >
                                                    </div>
                                            </div>
                                            <div class="mb-2 row">
                                                    <label for="example-url-input" class="col-md-4 col-form-label fw-bold">Country / Region</label>
                                                    <div class="col-md-8">
                                                        <select name="ShippingCountry" class="form-select" >
                                                            @foreach($country as $value)
                                                            <option value="{{$value->CountryName}}" {{($ShippingCountry== $value->CountryName) ? 'selected=selected': '' }}>{{$value->CountryName}}</option>
                                                            @endforeach
                                                    </select>
                                                    </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="example-url-input" class="col-md-4 col-form-label fw-bold">Address</label>
                                                <div class="col-md-8">
                                                     <textarea name="ShippingAddressLine1" class="form-control" rows="3"  placeholder="Street1">{{ $ShippingAddressLine1 }}</textarea><br>
                                                     <textarea name="ShippingAddressLine2" class="form-control" rows="3" placeholder="Street2">{{ $ShippingAddressLine2 }}</textarea>
                                                     
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="example-url-input" class="col-md-4 col-form-label fw-bold">City</label>
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text"  name="ShippingCity" value="{{$ShippingCity}}"  >
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="example-url-input" class="col-md-4 col-form-label fw-bold">Sate</label>
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text"  name="ShippingState" value="{{$ShippingState}}"  >
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                    <label for="example-url-input" class="col-md-4 col-form-label fw-bold">Zip Code</label>
                                                    <div class="col-md-8">
                                                        <input class="form-control" type="text"  name="ShippingZipCode" value="{{$ShippingZipCode}}"  >
                                                    </div>
                                                </div>
                                            <div class="mb-2 row">
                                                <label for="example-url-input" class="col-md-4 col-form-label fw-bold">Phone</label>
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text"  name="ShippingPhone" value="{{$ShippingPhone}}"  >
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="example-url-input" class="col-md-4 col-form-label fw-bold">Fax</label>
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text"  name="ShippingFax" value="{{$ShippingFax}}"  >
                                                </div>
                                            </div>    
                                        </div>

                                    </div>     
                                </div>
                                <div class="tab-pane" id="remarks" role="tabpanel">
                                    <div>
                                        <div class="table-responsive mt-4">

                                        <label class="form-label">Remarks <span class="card-title-desc">(For Internal Use)</span></label>
                                        <div>
                                            <textarea name="Remarks" class="form-control" rows="3">Remarks</textarea>
                                        </div>
                                    
                                            
                                        </div>
                                    </div>
                                </div>
                                

                            </div>


                            </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary me-1 waves-effect aves-float waves-light">Update</button>
                                <a href="{{URL('/Customers')}}" class="btn btn-outline-secondary waves-effect">Cancel</a>
                            </div>
                            </div>
                        </form>
                    </div>
                <!-- card end here -->
                </div>
            </div>
        </div>
    </div>
</div>