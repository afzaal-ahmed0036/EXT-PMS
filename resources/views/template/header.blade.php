<header id="page-topbar">
<div class="navbar-header">
<div class="d-flex">
<!-- LOGO -->
<div class="navbar-brand-box">
<a href="{{URL('/dashboard')}}" class="logo logo-dark">
<span class="logo-sm">
<img src="{{URL('/')}}/assets/images/square.svg" alt="" height="30">
</span>
<span class="logo-lg">
<img src="{{URL('/')}}/assets/images/square.svg" alt="" height="10"> Falak
</span>
</a>
<a href="{{URL('/Dashboard')}}" class="logo logo-light">
<span class="logo-sm">
<img src="{{URL('/')}}/assets/images/square.svg" alt="" height="30">
</span>
<span class="logo-lg ">
<h5 class="mt-4 text-white"> Extensive Books</h5>
</span>
</a>
</div>
<button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
<i class="fa fa-fw fa-bars"></i>
</button>
<!-- App Search-->
<form class="app-search  d-none d-xl-block">
<div class="position-relative">
<div class="d-flex gap-2 flex-wrap">
    <!--   <div class="btn-group ">
        <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Reports <i class="mdi mdi-chevron-down"></i></button>
        <div class="dropdown-menu">
            <a class="dropdown-item  " href="{{URL('/Journal')}}">Journal</a>
            <a class="dropdown-item" href="{{URL('/CashbookReport')}}">Cash Book</a>
            <div class="dropdown-divider"></div>
            
            
        </div>
    </div><  /btn-group -->
    
</div>
</div>
</form>

</div>
<div class="d-flex">
<div class="dropdown d-inline-block d-lg-none ms-2">
    <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="mdi mdi-magnify"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
        aria-labelledby="page-header-search-dropdown">
        
        <form class="p-3">
            <div class="form-group m-0">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!--
<div class="dropdown d-none d-lg-inline-block ms-1">
    <button type="button" class="btn header-item noti-icon waves-effect"
    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="bx bx-customize"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
        <div class="px-lg-2">
            <div class="row g-0">
                <div class="col">
                    <a class="dropdown-icon-item" href="#">
                        <img src="assets/images/brands/github.png" alt="Github">
                        <span>GitHub</span>
                    </a>
                </div>
                <div class="col">
                    <a class="dropdown-icon-item" href="#">
                        <img src="assets/images/brands/bitbucket.png" alt="bitbucket">
                        <span>Bitbucket</span>
                    </a>
                </div>
                <div class="col">
                    <a class="dropdown-icon-item" href="#">
                        <img src="assets/images/brands/dribbble.png" alt="dribbble">
                        <span>Dribbble</span>
                    </a>
                </div>
            </div>
            <div class="row g-0">
                <div class="col">
                    <a class="dropdown-icon-item" href="#">
                        <img src="assets/images/brands/dropbox.png" alt="dropbox">
                        <span>Dropbox</span>
                    </a>
                </div>
                <div class="col">
                    <a class="dropdown-icon-item" href="#">
                        <img src="assets/images/brands/mail_chimp.png" alt="mail_chimp">
                        <span>Mail Chimp</span>
                    </a>
                </div>
                <div class="col">
                    <a class="dropdown-icon-item" href="#">
                        <img src="assets/images/brands/slack.png" alt="slack">
                        <span>Slack</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div> -->
@php
    $user = App\Models\User::where('UserID',Session::get('UserID'))->first();
    $notifications = $user->notifications;
    $unreadNotifications = $user->notifications->where('read',0);
@endphp

<div class="dropdown d-inline-block">
    <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="bx bx-bell bx-tada"></i>
    <span class="badge bg-danger rounded-pill">{{count($unreadNotifications)}}</span>
    </button>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
        aria-labelledby="page-header-notifications-dropdown">
        <div data-simplebar style="max-height: 230px;">
            @if(count($notifications) > 0)
            @foreach($notifications as $notification)
                <a href="{{route('job.show',['id' => $notification->job_id])}}" class="text-reset notification-item">
                    <div class="media" style="background-color:{{$notification->read == 0 ? '#dddada' : ''}}">
                        <!-- <div class="avatar-xs me-3">
                            <span class="avatar-title bg-primary rounded-circle font-size-16">
                                <i class="bx bx-cart"></i>
                            </span>
                        </div> -->
                        <div class="media-body ">
                            <h6 class="mt-0 mb-1" key="t-your-order">{{$notification->type}}</h6>
                            <div class="font-size-12 text-muted">
                                <p class="mb-1" key="t-grammer">Job: {{$notification->job->name ?? 'Job Title'}}</p>
                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-min-ago">{{$notification->created_at->diffForHumans()}}</span></p>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
            @else
            <div class="p-3">
            <div class="row align-items-center">
                <div class="col">
                    <h6 class="m-0" key="t-notifications">No Notifications </h6>
                </div>
                <div class="col-auto"></div>
            </div>
            </div>
            @endif
            <!-- <a href="#" class="text-reset notification-item">
                <div class="media">
                    <img src="{{URL('/')}}/assets/images/users/avatar-3.jpg"
                    class="me-3 rounded-circle avatar-xs" alt="user-pic">
                    <div class="media-body">
                        <h6 class="mt-0 mb-1">James Lemire</h6>
                        <div class="font-size-12 text-muted">
                            <p class="mb-1" key="t-simplified">It will seem like simplified English.</p>
                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-hours-ago">1 hours ago</span></p>
                        </div>
                    </div>
                </div>
            </a>
            <a href="#" class="text-reset notification-item">
                <div class="media">
                    <div class="avatar-xs me-3">
                        <span class="avatar-title bg-success rounded-circle font-size-16">
                            <i class="bx bx-badge-check"></i>
                        </span>
                    </div>
                    <div class="media-body">
                        <h6 class="mt-0 mb-1" key="t-shipped">Your item is shipped</h6>
                        <div class="font-size-12 text-muted">
                            <p class="mb-1" key="t-grammer">If several languages coalesce the grammar</p>
                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-min-ago">3 min ago</span></p>
                        </div>
                    </div>
                </div>
            </a>
            <a href="#" class="text-reset notification-item">
                <div class="media">
                    <img src="{{URL('/')}}/assets/images/users/avatar-4.jpg"
                    class="me-3 rounded-circle avatar-xs" alt="user-pic">
                    <div class="media-body">
                        <h6 class="mt-0 mb-1">Salena Layfield</h6>
                        <div class="font-size-12 text-muted">
                            <p class="mb-1" key="t-occidental">As a skeptical Cambridge friend of mine occidental.</p>
                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-hours-ago">1 hours ago</span></p>
                        </div>
                    </div>
                </div>
            </a> -->
        </div>
        <!-- <div class="p-2 border-top d-grid">
            <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                <i class="mdi mdi-arrow-right-circle me-1"></i> <span key="t-view-more">View More..</span>
            </a>
        </div> -->
    </div>
</div>

<div class="dropdown d-inline-block">
    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <img class="rounded-circle header-profile-user" src="{{URL('/')}}/assets/images/users/avatar-1.jpg"
    alt="Header Avatar">
    <span class="d-none d-xl-inline-block ms-1 " key="t-henry">Setting</span>
    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-end">
        <!-- item-->
        <a class="dropdown-item" href="{{URL('/UserProfile')}}">
            <i class="bx bx-user font-size-16 align-middle me-1"></i>
            <span key="t-profile">Profile</span></a>
            
            
            <a class="dropdown-item d-block" href="{{URL('/ChangePassword')}}"><i class="bx bx-wrench font-size-16 align-middle me-1"></i> <span key="t-settings">Change Password</span></a>
            
            
            <div class="dropdown-divider"></div>
            <a class="dropdown-item text-danger" href="{{URL('/Logout')}}"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span></a>
        </div>
    </div>
    
</div>
</div>
</header>