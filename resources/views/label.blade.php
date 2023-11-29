@extends('template.tmp')

@section('title', 'Labels')
 

@section('content')

 <div class="main-content">

 <div class="page-content">
<div class="container-fluid">

 <!-- start page title -->
<div class="row">
<div class="col-12">
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
 <h4 class="mb-sm-0 font-size-18">Manage Labels</h4>

 <div class="page-title-right">
</div>
</div>
</div>
<div>
 <!-- end page title -->

 @if (session('error'))

 <div class="alert alert-{{ Session::get('class') }} p-3" id="success-alert">
                    
                   {{ Session::get('error') }}  
                </div>

@endif

 @if (count($errors) > 0)
                                 
                            <div >
                <div class="alert alert-danger pt-3 pl-0   border-3">
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
    <form action="{{URL('/LabelSave')}}" method="post">
        {{csrf_field()}}
<div class="card">
<div class="card-body">

<h4 class="card-title">Add New Label</h4>
<p class="card-title-desc"></p>

 
<div class="mb-3 row">
<label for="example-email-input" class="col-md-2 col-form-label">Order Number</label>
<div class="col-md-10">
<input class="form-control" type="text"  value="{{old('OrderNumber')}}"  name="OrderNumber" id="example-email-input">
</div>
</div>
<div class="mb-3 row">
<label for="example-url-input" class="col-md-2 col-form-label">Client Name</label>
<div class="col-md-10">
<input class="form-control" type="text"  value="{{old('ClientName')}}" name="ClientName" required>
</div>

</div>
<div class="mb-3 row">
<label for="example-url-input" class="col-md-2 col-form-label">Content</label>
<div class="col-md-10">
<input class="form-control" type="text"  name="Content" value="{{old('Content')}}" >
</div>
</div>

<div class="mb-3 row">
<label for="example-url-input" class="col-md-2 col-form-label">Customer Order Date</label>
<div class="col-md-10">
<div class="input-group" id="datepicker21">
<input type="text" name="CustomerOrderDate" autocomplete="off" class="form-control" placeholder="yyyy-mm-dd" data-date-format="yyyy-mm-dd" data-date-container="#datepicker21" data-provide="datepicker" data-date-autoclose="true" value="{{date('Y-m-d')}}">
<span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
</div>

<!-- <input class="form-control" type="text"  name="CustomerOrderDate" value="{{old('CustomerOrderDate')}}" required> -->
</div>
</div>

<div class="mb-3 row">
<label for="example-url-input" class="col-md-2 col-form-label">Unit Number</label>
<div class="col-md-10">
<input class="form-control" type="text"  name="UnitNumber" value="{{old('UnitNumber')}}" required>
</div>
</div>

<div class="mb-3 row">
<label for="example-url-input" class="col-md-2 col-form-label">Description</label>
<div class="col-md-10">
<input class="form-control" type="text"  name="Description" value="{{old('Description')}}" required>
</div>
</div>

<div class="mb-3 row">
<label for="example-url-input" class="col-md-2 col-form-label">Label Deails</label>
<div class="col-md-10">
    <textarea name="LabelDeails" required cols="100" rows="10"></textarea>
</div>
</div>



<input type="submit" class="btn btn-primary w-md">        

                                    </div>
                                </div>

                            </form>
                            </div> 
                        </div>
                    
  <div class="row">
      <div class="col-lg-12">
          
          <div class="card">
              
          <div class="card-body">
            <h4 class="card-title pb-3">Manage Labels</h4>
            <div class="page-title-right">
<!-- <div class="text-sm-end">
                <button type="button" id="generate-lable" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"> Generate Label</button>
            </div> -->
</div>

           
                                        
       <div class="table-responsive">
        <table class="table table-sm m-0" id="datatable">
            <thead>
               <tr>
                <!--<th> <input type="checkbox" value="" id="check-all"> </th>-->
                <th>Order Number</th>
                <th>Client</th>
                <th>Content</th>
                <th>Customer Order Date</th>
                <th>Unit Number</th>
                <th>Descritpion</th>
                <th>Action</th>
                <th>Generate Label</th>
              </tr>
             </thead>
            <tbody>
            <?php $no=1; ?> 
            @foreach($labels as $label)
           <tr>
                <!-- <td><input type="checkbox" value="" name="" class="label-checkbox" data-label-id="{{$label->OrderNumber}}"></td> -->
                <td scope="row">{{$label->OrderNumber}}</td>
                <td>{{$label->ClientName}}</td>
                <td>{{$label->Content}}</td>
                <td>{{$label->CustomerOrderDate}}</td>
                <td>{{$label->UnitNumber}}</td>               
                <td>{{$label->Description}}</td>
                <td>
                    <a href="javascript:void(0)" onclick="delete_confirm2('DeleteLabel',{{$label->LabelID}})">
                        <i class="font-size-18 mdi mdi-trash-can-outline align-middle me-1 text-secondary"></i>
                    </a>
                </td>
                <td><button type="button"  data-label-id="{{$label->OrderNumber}}" class="generate-lable btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"> Generate Label</button></td>                 
            </tr>
            @endforeach
             
            </tbody>
        </table>
        
        </div>
        
    </div>
</div>
</div>
</div>                     
</div> <!-- container-fluid -->
</div>
<!-- my own model -->
 <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
           <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Confirmation</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
         <div class="modal-body">
         <p class="text-center">Are you sure to delete this information ?</p>
         <p class="text-center">
            
            
 
                <a href="#" class="btn btn-danger " id="delete_link">Delete</a>
                <button type="button" class="btn btn-info" data-bs-dismiss="modal">Cancel</button>
                    
         </p>
         </div>
              
         </div>
    </div>
 </div>
<!-- END: Content-->

    
</div>
<script type="text/javascript">
        $(".generate-lable").on("click", function(event) {

        // var checkedCount = $('.label-checkbox:checked').length;
        
        // if (checkedCount > 0) {

            var codes = [];

            /*$('.label-checkbox:checked').each(function() {
                var id = $(this).data('label-id');
                codes.push(id);
            });*/

            var id = $(this).data('label-id');
            codes.push(id);

            $.ajax({
            type: 'GET',
            url: 'Lables/sticer_search',
            data: {
                codes:codes
            },
            success: function(data) {

                window.open(data.url);
                
            }
        });

        /*} else {

            alert('Select any Label to generate pdf');

        }*/
        

    });
$(document).ready(function() {

    function delete_confirm2(url,id) {        


        url = '{{URL::TO('/')}}/'+url+'/'+ id;
        
    
       
        jQuery('#staticBackdrop').modal('show', {backdrop: 'static'});
        document.getElementById('delete_link').setAttribute('href' , url);
         
    }
});
</script>
  @endsection