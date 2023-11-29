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
                    <h4 class="mb-sm-0 font-size-18">PROJECTS LIST</h4>
                    <div class="page-title-right ">
                      <div class="btn-group  shadow-sm dropstart">
                         <a href="{{URL('/AddProject')}}" class="btn btn-primary"> + New </a>
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
                                                    <th scope="col" style="width: 100px">Client</th>
                                                    <th scope="col">Projects</th>
                                                    <th scope="col">Due Date</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Team</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>

                                                    <td><img  src="{{URL('/')}}/assets/images/companies/img-1.png" alt="" class="avatar-sm" data-bs-toggle="tooltip" data-bs-placement="right" title="Client Name" >

                                                    </td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14"><a href="javascript: void(0);" class="text-dark">New admin Design</a></h5>
                                                        <p class="text-muted mb-0">It will be as simple as Occidental</p>
                                                    </td>
                                                    <td>15 Oct, 19</td>
                                                    <td><span class="badge bg-success">Completed</span></td>
                                                    <td>
                                                        <div class="avatar-group">
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                    <img src="{{URL('/')}}/assets/images/users/avatar-4.jpg" alt="" class="rounded-circle avatar-xs" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Employee Name">
                                                                </a>
                                                            </div>
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                    <img src="{{URL('/')}}/assets/images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-xs" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Employee Name">
                                                                </a>
                                                            </div>
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                    <div class="avatar-xs">
                                                                        <span class="avatar-title rounded-circle bg-success text-white font-size-16">
                                                                            A
                                                                        </span>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                    <img src="{{URL('/')}}/assets/images/users/avatar-2.jpg" alt="" class="rounded-circle avatar-xs" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Employee Name">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center col-actions">
                                                            <a href="{{URL('/ProjectView/1'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-eye-outline align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                            <a href="{{URL('/ProjectEdit/'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-pencil align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                            <a  target="_blank" href="{{URL('/ProjectViewPDF/'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-file-pdf-outline align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                            <a href="{{URL('/ProjectDelete/'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-trash-can-outline align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><img src="{{URL('/')}}/assets/images/companies/img-2.png" alt="" class="avatar-sm" data-bs-toggle="tooltip" data-bs-placement="right" title="Client Name"></td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14"><a href="javascript: void(0);" class="text-dark">Brand logo design</a></h5>
                                                        <p class="text-muted mb-0">To achieve it would be necessary</p>
                                                    </td>
                                                    <td>22 Oct, 19</td>
                                                    <td><span class="badge bg-warning">Pending</span></td>
                                                    <td>
                                                        <div class="avatar-group">
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                    <img src="{{URL('/')}}/assets/images/users/avatar-1.jpg" alt="" class="rounded-circle avatar-xs" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Employee Name">
                                                                </a>
                                                            </div>
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                    <img src="{{URL('/')}}/assets/images/users/avatar-3.jpg" alt="" class="rounded-circle avatar-xs" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Employee Name">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center col-actions">
                                                            <a href="{{URL('/ProjectView/1'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-eye-outline align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                            <a href="{{URL('/ProjectEdit/'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-pencil align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                            <a  target="_blank" href="{{URL('/ProjectViewPDF/'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-file-pdf-outline align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                            <a href="{{URL('/ProjectDelete/'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-trash-can-outline align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><img src="{{URL('/')}}/assets/images/companies/img-3.png" alt="" class="avatar-sm" data-bs-toggle="tooltip" data-bs-placement="right" title="Client Name"></td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14"><a href="javascript: void(0);" class="text-dark">New Landing Design</a></h5>
                                                        <p class="text-muted mb-0">For science, music, sport, etc</p>
                                                    </td>
                                                    <td>13 Oct, 19</td>
                                                    <td><span class="badge bg-danger">Delay</span></td>
                                                    <td>
                                                        <div class="avatar-group">
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                    <img src="{{URL('/')}}/assets/images/users/avatar-3.jpg" alt="" class="rounded-circle avatar-xs" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Employee Name">
                                                                </a>
                                                            </div>
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                    <img src="{{URL('/')}}/assets/images/users/avatar-8.jpg" alt="" class="rounded-circle avatar-xs" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Employee Name">
                                                                </a>
                                                            </div>
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                    <img src="{{URL('/')}}/assets/images/users/avatar-6.jpg" alt="" class="rounded-circle avatar-xs" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Employee Name">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center col-actions">
                                                            <a href="{{URL('/ProjectView/1'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-eye-outline align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                            <a href="{{URL('/ProjectEdit/'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-pencil align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                            <a  target="_blank" href="{{URL('/ProjectViewPDF/'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-file-pdf-outline align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                            <a href="{{URL('/ProjectDelete/'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-trash-can-outline align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td><img src="{{URL('/')}}/assets/images/companies/img-4.png" alt="" class="avatar-sm" data-bs-toggle="tooltip" data-bs-placement="right" title="Client Name"></td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14"><a href="javascript: void(0);" class="text-dark">Redesign - Landing page</a></h5>
                                                        <p class="text-muted mb-0">If several languages coalesce</p>
                                                    </td>
                                                    <td>14 Oct, 19</td>
                                                    <td><span class="badge bg-success">Completed</span></td>
                                                    <td>
                                                        <div class="avatar-group">
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                    <img src="{{URL('/')}}/assets/images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-xs" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Employee Name">
                                                                </a>
                                                            </div>
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                    <div class="avatar-xs">
                                                                        <span class="avatar-title rounded-circle bg-warning text-white font-size-16">
                                                                            R
                                                                        </span>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                    <img src="{{URL('/')}}/assets/images/users/avatar-2.jpg" alt="" class="rounded-circle avatar-xs" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Employee Name">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center col-actions">
                                                            <a href="{{URL('/ProjectView/1'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-eye-outline align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                            <a href="{{URL('/ProjectEdit/'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-pencil align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                            <a  target="_blank" href="{{URL('/ProjectViewPDF/'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-file-pdf-outline align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                            <a href="{{URL('/ProjectDelete/'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-trash-can-outline align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><img src="{{URL('/')}}/assets/images/companies/img-5.png" alt="" class="avatar-sm" data-bs-toggle="tooltip" data-bs-placement="right" title="Client Name"></td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14"><a href="javascript: void(0);" class="text-dark">Skote Dashboard UI</a></h5>
                                                        <p class="text-muted mb-0">Separate existence is a myth</p>
                                                    </td>
                                                    <td>22 Oct, 19</td>
                                                    <td><span class="badge bg-success">Completed</span></td>
                                                    <td>
                                                        <div class="avatar-group">
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                    <img src="{{URL('/')}}/assets/images/users/avatar-4.jpg" alt="" class="rounded-circle avatar-xs" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Employee Name">
                                                                </a>
                                                            </div>
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                    <img src="{{URL('/')}}/assets/images/users/avatar-1.jpg" alt="" class="rounded-circle avatar-xs" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Employee Name">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center col-actions">
                                                            <a href="{{URL('/ProjectView/1'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-eye-outline align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                            <a href="{{URL('/ProjectEdit/'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-pencil align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                            <a  target="_blank" href="{{URL('/ProjectViewPDF/'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-file-pdf-outline align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                            <a href="{{URL('/ProjectDelete/'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-trash-can-outline align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><img src="{{URL('/')}}/assets/images/companies/img-6.png" alt="" class="avatar-sm" data-bs-toggle="tooltip" data-bs-placement="right" title="Client Name"></td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14"><a href="javascript: void(0);" class="text-dark">Blog Template UI</a></h5>
                                                        <p class="text-muted mb-0">For science, music, sport, etc</p>
                                                    </td>
                                                    <td>24 Oct, 19</td>
                                                    <td><span class="badge bg-warning">Pending</span></td>
                                                    <td>
                                                        <div class="avatar-group">
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                    <div class="avatar-xs">
                                                                        <span class="avatar-title rounded-circle bg-danger text-white font-size-16">
                                                                            A
                                                                        </span>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                    <img src="{{URL('/')}}/assets/images/users/avatar-2.jpg" alt="" class="rounded-circle avatar-xs" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Employee Name">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center col-actions">
                                                            <a href="{{URL('/ProjectView/1'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-eye-outline align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                            <a href="{{URL('/ProjectEdit/'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-pencil align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                            <a  target="_blank" href="{{URL('/ProjectViewPDF/'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-file-pdf-outline align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                            <a href="{{URL('/ProjectDelete/'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-trash-can-outline align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td><img src="{{URL('/')}}/assets/images/companies/img-3.png" alt="" class="avatar-sm" data-bs-toggle="tooltip" data-bs-placement="right" title="Client Name"></td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14"><a href="javascript: void(0);" class="text-dark">Multipurpose Landing</a></h5>
                                                        <p class="text-muted mb-0">It will be as simple as Occidental</p>
                                                    </td>
                                                    <td>15 Oct, 19</td>
                                                    <td><span class="badge bg-danger">Delay</span></td>
                                                    <td>
                                                        <div class="avatar-group">
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                    <img src="{{URL('/')}}/assets/images/users/avatar-4.jpg" alt="" class="rounded-circle avatar-xs" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Employee Name">
                                                                </a>
                                                            </div>
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                    <img src="{{URL('/')}}/assets/images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-xs" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Employee Name">
                                                                </a>
                                                            </div>
                                                            <div class="avatar-group-item">
                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                    <img src="{{URL('/')}}/assets/images/users/avatar-2.jpg" alt="" class="rounded-circle avatar-xs" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Employee Name">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center col-actions">
                                                            <a href="{{URL('/ProjectView/1'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-eye-outline align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                            <a href="{{URL('/ProjectEdit/'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-pencil align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                            <a  target="_blank" href="{{URL('/ProjectViewPDF/'.@$row->ProjectID)}}">
                                                                <i class="font-size-18 mdi mdi-file-pdf-outline align-middle me-1 text-secondary"></i>
                                                            </a> 
                                                            <a href="{{URL('/ProjectDelete/'.@$row->ProjectID)}}">
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