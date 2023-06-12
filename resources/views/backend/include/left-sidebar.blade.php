<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="{{ url('/admin/dashboard') }}"><img src="{{ asset('adminAssets') }}/images/logo.svg" width="25"
                alt="Aero"><span class="m-l-10">HRM</span></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <a class="image" href="profile.html"><img src="{{ asset('adminAssets') }}/images/profile_av.jpg"
                            alt="User"></a>
                    <div class="detail">
                        <h4>{{ Auth::user()->name }}</h4>
                        <small>Super Admin</small>
                    </div>
                </div>
            </li>
            <li class="active open"><a href="{{ url('/admin/dashboard') }}"><i
                        class="zmdi zmdi-home"></i><span>Dashboard</span></a>
            </li>

            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Department</span></a>
                <ul class="ml-menu">
                    <li><a href="{{ route('admin.manage.department') }}">Department List</a></li>
                    <li><a href="{{ route('admin.department') }}">Add New Department</a></li>
                </ul>
            </li>

            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Designation</span></a>
                <ul class="ml-menu">
                    <li><a href="{{ route('admin.manage.designation') }}">Designation List</a></li>
                    <li><a href="{{ route('admin.designation') }}">Add New Designation</a></li>
                </ul>
            </li>

            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Work Shifts</span></a>
                <ul class="ml-menu">
                    <li><a href="{{ route('admin.manage.shifts') }}">Shifts List</a></li>
                    <li><a href="{{ route('admin.shifts') }}">Add New Shifts</a></li>
                </ul>
            </li>

            <li><a href="javascript:void(0);" class="menu-toggle"><i
                class="zmdi zmdi-assignment"></i><span>Pay Slip</span></a>
                <ul class="ml-menu">
                    <li><a href="{{ route('admin.manage.pay_slip') }}">Pay Slip List</a></li>
                    <li><a href="{{ route('admin.pay_slip') }}">Add New Pay Slip</a></li>
                </ul>
            </li>

            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account"></i><span>Employee</span></a>
                <ul class="ml-menu">
                    <li><a href="{{ route('admin.manage.employee') }}">Employee List</a></li>
                    <li><a href="{{ route('admin.employee') }}">Add New Employee</a></li>
                </ul>
            </li>

            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Holiday</span></a>
                <ul class="ml-menu">
                    <li><a href="{{ route('admin.calendar') }}">Calendar</a></li>
                </ul>
            </li>

            <li><a href="javascript:void(0);" class="menu-toggle"><i
                class="zmdi zmdi-map"></i> <span>Location</span></a>
                <ul class="ml-menu">
                    <li><a href="{{ route('admin.manage.location') }}">Location List</a></li>
                    <li><a href="{{ route('admin.url') }}">Add New Location</a></li>
                </ul>
            </li>

            <li><a href="javascript:void(0);" class="menu-toggle"><i
                class="zmdi zmdi-assignment"></i></i> <span>Payroll Setting</span></a>
                <ul class="ml-menu">
                    <li><a href="{{ route('admin.manage.payroll.setting') }}">Employee Payroll Setting</a></li>
                    <li><a href="{{ route('admin.payroll.setting') }}">Add Employee Payroll Setting</a></li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
