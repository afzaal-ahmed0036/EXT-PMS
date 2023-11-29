<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">

                <li>
                    <a href="{{ URL('/Dashboard') }}" class="waves-effect">
                        <i class="mdi mdi-speedometer-slow mb-0"></i>

                        <span key="t-dashboards">Dashboard</span>
                    </a>

                </li>
                @if (session::get('UserType') == 'Admin')
                    <li><a href="{{ URL('/Parties') }}" class="waves-effect">
                            <i class="bx bxs-user-plus"></i>
                            <span key="t-calendar">Customers</span>
                        </a>
                    </li>

                    <li><a href="{{ URL('/Estimate') }}" class="waves-effect">
                            <i class="bx bxs-user-plus"></i>
                            <span key="t-calendar">Estimate</span>
                        </a>
                    </li>
                @endif
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-briefcase"></i>
                        <span key="t-ecommerce">Jobs</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">

                        <li>
                            <a href="{{ URL('/JobList') }}" class="waves-effect">
                                <i class="bx bx-briefcase-alt-2"></i>
                                <span
                                    key="t-dashboards">{{ session::get('UserType') == 'Admin' ? 'Job List' : 'My Jobs' }}</span>
                            </a>

                        </li>



                    </ul>
                </li>

                @if (session::get('UserType') == 'Admin')
                    <li>
                        <a href="{{ URL('/Lables') }}" class="waves-effect">
                            <i class="bx bxs-user-plus"></i>
                            <span key="t-calendar">Lables</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ URL('/User') }}" class="waves-effect">
                            <i class="bx bxs-user-plus"></i>
                            <span key="t-calendar">User</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ URL('/Company') }}" class="waves-effect">
                            <i class="bx bxs-user-plus"></i>
                            <span key="t-calendar">Company</span>
                        </a>
                    </li>


                    <li>
                        <a href="{{ URL('/Backup') }}" class="waves-effect">
                            <i class="mdi mdi-database-export"></i>
                            <span key="t-calendar">
                                DB Backup</span>
                        </a>
                    </li>
                @endif


                <li>
                    <a href="{{ URL('/Logout') }}" class="waves-effect">
                        <i class="bx bx-power-off"></i>
                        <span key="t-calendar">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
