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
                    <h4 class="mb-sm-0 font-size-18">TASKS LIST</h4>
                    <div class="page-title-right ">
                      <div class="btn-group  shadow-sm dropstart">
                         <a href="{{URL('/AddTask')}}" class="btn btn-primary"> + New </a>
                      </div>
                    </div>
                  </div>
                </div>  
            </div>         
            <div class="row">
                            <div class="col-lg-12">
                                <div class="">
                                    <div class="table-responsive">
                                        <table class="table project-list-table table-nowrap align-middle table-borderless">
                                            <thead>
                                                <tr>
                                                    <th scope="col" style="width: 100px">Code</th>
                                                    <th scope="col">Task</th>
                                                    <th scope="col">Project</th>
                                                    <th scope="col">Due Date</th>
                                                    <th scope="col">Assigned To</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>

                                                    <td>T-0001</td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14"><a href="javascript: void(0);" class="text-dark">New admin Design</a></h5>
                                                    </td>
                                                    <td>Camera motion sensor system</td>
                                                    <td>15 Oct, 19</td>
                                                    <td>
                                                        <div class="avatar-group">
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                    <img src="{{URL('/')}}/assets/images/users/avatar-4.jpg" alt="" class="rounded-circle avatar-xs" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Employee Name">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Doing <i class="mdi mdi-chevron-down"></i></button>
                                                            <div class="dropdown-menu" style="">
                                                                <a class="dropdown-item" href="#">Completed</a>
                                                                <a class="dropdown-item" href="#">To Do</a>
                                                                <a class="dropdown-item" href="#">Incomplete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center col-actions">
                                                            <a href="{{URL('/TaskView/1'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-eye-outline align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                            <a href="{{URL('/TaskEdit/'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-pencil align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                            <a  target="_blank" href="{{URL('/TaskViewPDF/'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-file-pdf-outline align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                            <a href="{{URL('/TaskDelete/'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-trash-can-outline align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>T-0002</td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14"><a href="javascript: void(0);" class="text-dark">Brand logo design</a></h5>
                                                    </td>
                                                    <td>Payment Billing System</td>
                                                    <td>22 Oct, 19</td>
                                                    <td>
                                                        <div class="avatar-group">
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                    <img src="{{URL('/')}}/assets/images/users/avatar-1.jpg" alt="" class="rounded-circle avatar-xs" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Employee Name">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><div class="btn-group">
                                                            <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Completed <i class="mdi mdi-chevron-down"></i></button>
                                                            <div class="dropdown-menu" style="">
                                                                <a class="dropdown-item" href="#">Doing</a>
                                                                <a class="dropdown-item" href="#">To Do</a>
                                                                <a class="dropdown-item" href="#">Incomplete</a>
                                                            </div>
                                                        </div></td>
                                                    <td>
                                                        <div class="d-flex align-items-center col-actions">
                                                            <a href="{{URL('/TaskView/1'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-eye-outline align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                            <a href="{{URL('/TaskEdit/'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-pencil align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                            <a  target="_blank" href="{{URL('/TaskViewPDF/'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-file-pdf-outline align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                            <a href="{{URL('/TaskDelete/'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-trash-can-outline align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>T-0003</td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14"><a href="javascript: void(0);" class="text-dark">New Landing Design</a></h5>
                                                    </td>
                                                    <td>Bug tracker</td>
                                                    <td>13 Oct, 19</td>
                                                    <td>
                                                        <div class="avatar-group">
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                    <img src="{{URL('/')}}/assets/images/users/avatar-3.jpg" alt="" class="rounded-circle avatar-xs" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Employee Name">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                     <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">To Do <i class="mdi mdi-chevron-down"></i></button>
                                                            <div class="dropdown-menu" style="">
                                                                <a class="dropdown-item" href="#">Doing</a>
                                                                <a class="dropdown-item" href="#">Completed</a>
                                                                <a class="dropdown-item" href="#">Incomplete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center col-actions">
                                                            <a href="{{URL('/TaskView/1'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-eye-outline align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                            <a href="{{URL('/TaskEdit/'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-pencil align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                            <a  target="_blank" href="{{URL('/TaskViewPDF/'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-file-pdf-outline align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                            <a href="{{URL('/TaskDelete/'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-trash-can-outline align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>T-0004</td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14"><a href="javascript: void(0);" class="text-dark">Redesign - Landing page</a></h5>
                                                    </td>
                                                    <td>Email marketing and newsletter service</td>
                                                    <td>14 Oct, 19</td>
                                                    <td>
                                                        <div class="avatar-group">
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                    <img src="{{URL('/')}}/assets/images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-xs" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Employee Name">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td> 
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">To Do <i class="mdi mdi-chevron-down"></i></button>
                                                            <div class="dropdown-menu" style="">
                                                                <a class="dropdown-item" href="#">Doing</a>
                                                                <a class="dropdown-item" href="#">Completed</a>
                                                                <a class="dropdown-item" href="#">Incomplete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center col-actions">
                                                            <a href="{{URL('/TaskView/1'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-eye-outline align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                            <a href="{{URL('/TaskEdit/'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-pencil align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                            <a  target="_blank" href="{{URL('/TaskViewPDF/'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-file-pdf-outline align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                            <a href="{{URL('/TaskDelete/'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-trash-can-outline align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>T-0005</td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14"><a href="javascript: void(0);" class="text-dark">Skote Dashboard UI</a></h5>
                                                    </td>
                                                    <td>Restaurant Management</td>
                                                    <td>22 Oct, 19</td>
                                                    <td>
                                                        <div class="avatar-group">
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                    <img src="{{URL('/')}}/assets/images/users/avatar-1.jpg" alt="" class="rounded-circle avatar-xs" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Employee Name">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td> 
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Incomplete <i class="mdi mdi-chevron-down"></i></button>
                                                            <div class="dropdown-menu" style="">
                                                                <a class="dropdown-item" href="#">Doing</a>
                                                                <a class="dropdown-item" href="#">Completed</a>
                                                                <a class="dropdown-item" href="#">To Do</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center col-actions">
                                                            <a href="{{URL('/TaskView/1'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-eye-outline align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                            <a href="{{URL('/TaskEdit/'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-pencil align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                            <a  target="_blank" href="{{URL('/TaskViewPDF/'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-file-pdf-outline align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                            <a href="{{URL('/TaskDelete/'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-trash-can-outline align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                   <td>T-0006</td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14"><a href="javascript: void(0);" class="text-dark">Blog Template UI</a></h5>
                                                    </td>
                                                    <td>Automated payroll system with GPS tracking and image capture</td>
                                                    <td>24 Oct, 19</td>
                                                    <td>
                                                        <div class="avatar-group">
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                    <img src="{{URL('/')}}/assets/images/users/avatar-2.jpg" alt="" class="rounded-circle avatar-xs" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Employee Name">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><div class="btn-group">
                                                            <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">To Do <i class="mdi mdi-chevron-down"></i></button>
                                                            <div class="dropdown-menu" style="">
                                                                <a class="dropdown-item" href="#">Doing</a>
                                                                <a class="dropdown-item" href="#">Completed</a>
                                                                <a class="dropdown-item" href="#">Incomplete</a>
                                                            </div>
                                                        </div></td>
                                                    <td>
                                                        <div class="d-flex align-items-center col-actions">
                                                            <a href="{{URL('/TaskView/1'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-eye-outline align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                            <a href="{{URL('/TaskEdit/'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-pencil align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                            <a  target="_blank" href="{{URL('/TaskViewPDF/'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-file-pdf-outline align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                            <a href="{{URL('/TaskDelete/'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-trash-can-outline align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>T-0007</td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14"><a href="javascript: void(0);" class="text-dark">Multipurpose Landing</a></h5>
                                                    </td>
                                                    <td>Payment Billing System</td>
                                                    <td>15 Oct, 19</td>
                                                    <td>
                                                        <div class="avatar-group">
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                    <img src="{{URL('/')}}/assets/images/users/avatar-4.jpg" alt="" class="rounded-circle avatar-xs" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Employee Name">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td> <div class="btn-group">
                                                            <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Incomplete <i class="mdi mdi-chevron-down"></i></button>
                                                            <div class="dropdown-menu" style="">
                                                                <a class="dropdown-item" href="#">Doing</a>
                                                                <a class="dropdown-item" href="#">Completed</a>
                                                                <a class="dropdown-item" href="#">To Do</a>
                                                            </div>
                                                        </div></td>
                                                    <td>
                                                        <div class="d-flex align-items-center col-actions">
                                                            <a href="{{URL('/TaskView/1'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-eye-outline align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                            <a href="{{URL('/TaskEdit/'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-pencil align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                            <a  target="_blank" href="{{URL('/TaskViewPDF/'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-file-pdf-outline align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                            <a href="{{URL('/TaskDelete/'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-trash-can-outline align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
        </div>
    </div>
</div>
<!-- END: Content-->
<script type="text/javascript">
$(document).ready(function() {
});
</script>
@endsection