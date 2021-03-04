<nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="/dashboard">
            <h2 class="align-middle mr-3"><img src="{{ asset('assets/img/sadara.png') }}" width="100" height="35">  FMS</h2></a>
            
        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>
            @if(auth()->user()->role == 'super_admin' || auth()->user()->role == 'admin' || auth()->user()->role == 'supervisor' || auth()->user()->role == 'scheduler')
            <li class="sidebar-item">
                <a href="#pages" data-toggle="collapse" class="sidebar-link">
                    <i class="align-middle" data-feather="layers"></i> <span class="align-middle">Management</span>
                </a>
                <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-parent="#sidebar">
                        <li class="sidebar-item"><a class="sidebar-link" href="/work-categories">Job Category</a></li>
                        <li class="sidebar-item"><a class="sidebar-link" href="/schedules">Schedules</a></li>
                        <li class="sidebar-item"><a class="sidebar-link" href="#">Reports</a></li>
            @if(auth()->user()->role == 'super_admin' || auth()->user()->role == 'admin')
                        <li class="sidebar-item"><a class="sidebar-link" href="/users">Users</a></li>
            @endif
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a href="#facilities" data-toggle="collapse" class="sidebar-link">
                        <i class="align-middle" data-feather="home"></i> <span class="align-middle">Facilities</span>
                    </a>
                    <ul id="facilities" class="sidebar-dropdown list-unstyled collapse" data-parent="#sidebar">
                        <li class="sidebar-item"><a class="sidebar-link" href="/occupancies">Occupancies List</a></li>
                        <li class="sidebar-item"><a class="sidebar-link" href="/facilities">Facilities List</a></li>
                        <li class="sidebar-item"><a class="sidebar-link" href="/occupants">Occupants List</a></li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#appointments" data-toggle="collapse" class="sidebar-link">
                        <i class="align-middle" data-feather="calendar"></i> <span class="align-middle">Appointments</span>
                    </a>
                    <ul id="appointments" class="sidebar-dropdown list-unstyled collapse" data-parent="#sidebar">
                        <li class="sidebar-item"><a class="sidebar-link" href="/open-appointments">Open</a></li>
                        <li class="sidebar-item"><a class="sidebar-link" href="/closed-appointments">Closed</a></li>
                        <li class="sidebar-item"><a class="sidebar-link" href="/appointments">All</a></li>
                        <li class="sidebar-item"><a class="sidebar-link" href="#">Reports</a></li>
                    </ul>
                </li>
            @endif          

                    @if(auth()->user()->role == 'super_admin')
                    <li class="sidebar-item">
                        <a href="#imports" data-toggle="collapse" class="sidebar-link">
                            <i class="align-middle" data-feather="upload"></i> <span class="align-middle">Uploads</span>
                        </a>
                        <ul id="imports" class="sidebar-dropdown list-unstyled collapse" data-parent="#sidebar">
                            <li class="sidebar-item"><a class="sidebar-link" href="/occupants-import">Import Occupants</a></li>
                            <li class="sidebar-item"><a class="sidebar-link" href="/buildings-import">Import Buildings</a></li>
                            <li class="sidebar-item"><a class="sidebar-link" href="/occupancies-import">Import Occupancies</a></li>
                            <li class="sidebar-item"><a class="sidebar-link" href="/schedules-import">Import Schedules</a></li>
                            <li class="sidebar-item"><a class="sidebar-link" href="/users-import">Import Users</a></li>
                        </ul>
                    </li>
                    @endif  
            @if(auth()->user()->role == 'tenant')
            <li class="sidebar-item active">
                <a class="sidebar-link" href="/client-appointments">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar align-middle mr-2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                    Appointments</span>
                </a>
            </li>
            <li class="sidebar-item active">
                <a class="sidebar-link" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-help-circle align-middle mr-2"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                    Help</span>
                </a>
            </li>
            @endif

            @if(auth()->user()->role == 'representative')
            <li class="sidebar-item">
                <a href="#rep" data-toggle="collapse" class="sidebar-link">
                    <i class="align-middle" data-feather="layers"></i> <span class="align-middle">Management</span>
                </a>
                <ul id="rep" class="sidebar-dropdown list-unstyled collapse" data-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="/appointments">Appointments</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="#">Reports</a></li>
                </ul>
            </li>
            @endif 

            <li class="sidebar-item active">
                <a class="sidebar-link" href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out align-middle mr-2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                    Logout</span>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </a>
            </li>
    </div>
</nav>