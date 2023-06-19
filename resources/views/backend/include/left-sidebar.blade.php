<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="{{ url('/admin/dashboard') }}"><img src="{{ asset('adminAssets') }}/images/logo.svg" width="25"
                alt="Aero"><span class="m-l-10">HRM</span></a>
    </div>
    @php
        use Carbon\Carbon;

        $userId = auth()->user()->id;
        $valid_user = App\Models\OrderInfo::where('customer_id', $userId)
            ->where('status', 'Paid')
            ->with('package')
            ->whereHas('package', function ($query) {
                $query->where('validity', '>', 0);
            })
            ->orderBy('created_at', 'desc')
            ->first();

        $privilege_user = false;
        if ($valid_user) {
            $expiryDate = Carbon::parse($valid_user->created_at)->addMonths($valid_user->package->validity);
            $privilege_user = $expiryDate->greaterThanOrEqualTo(Carbon::now());
        }
    @endphp

    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <a class="image" href="{{ url('/admin/dashboard') }}"><img
                            src="{{ asset('adminAssets') }}/images/profile_av.jpg" alt="User"></a>
                    <div class="detail">
                        <h4>{{ Auth::user()->name }}</h4>
                        @php
                            $role = Auth::user()->role;
                        @endphp
                        {{ $role == '1' ? 'Super Admin' : 'Admin' }}
                    </div>
                </div>
            </li>
            <li class="active open"><a href="{{ url('/admin/dashboard') }}"><i
                        class="zmdi zmdi-home"></i><span>Dashboard</span></a>
            </li>
            @if (Auth::user()->role == 1)
                <li><a href="javascript:void(0);" class="menu-toggle"><i
                            class="zmdi zmdi-apps"></i><span>Package</span></a>
                    <ul class="ml-menu">
                        <li><a href="{{ route('admin.manage.package') }}">Package List</a></li>
                        <li><a href="{{ route('admin.package') }}">Add New Package</a></li>
                        <li><a href="{{ route('admin.sold.package') }}">Sold Packages</a></li>
                    </ul>
                </li>
            @endif
            @if ($privilege_user)
                <li><a href="javascript:void(0);" class="menu-toggle"><i
                            class="zmdi zmdi-account"></i><span>Worker</span></a>
                    <ul class="ml-menu">
                        <li><a href="{{ route('admin.auth.workerList') }}">Worker List</a></li>
                        <li><a href="{{ route('admin.auth.createWorker') }}">Add New Worker</a></li>
                    </ul>
                </li>
                <li><a href="javascript:void(0);" class="menu-toggle"><i
                            class="zmdi zmdi-apps"></i><span>Department</span></a>
                    <ul class="ml-menu">
                        <li><a href="{{ route('admin.manage.department') }}">Department List</a></li>
                        <li><a href="{{ route('admin.department') }}">Add New Department</a></li>
                    </ul>
                </li>

                <li><a href="javascript:void(0);" class="menu-toggle"><i
                            class="zmdi zmdi-apps"></i><span>Designation</span></a>
                    <ul class="ml-menu">
                        <li><a href="{{ route('admin.manage.designation') }}">Designation List</a></li>
                        <li><a href="{{ route('admin.designation') }}">Add New Designation</a></li>
                    </ul>
                </li>

                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Work
                            Shifts</span></a>
                    <ul class="ml-menu">
                        <li><a href="{{ route('admin.manage.shifts') }}">Shifts List</a></li>
                        <li><a href="{{ route('admin.shifts') }}">Add New Shifts</a></li>
                    </ul>
                </li>

                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-assignment"></i><span>Pay
                            Slip</span></a>
                    <ul class="ml-menu">
                        <li><a href="{{ route('admin.manage.pay_slip') }}">Pay Slip List</a></li>
                        <li><a href="{{ route('admin.pay_slip') }}">Add New Pay Slip</a></li>
                    </ul>
                </li>

                <li><a href="javascript:void(0);" class="menu-toggle"><i
                            class="zmdi zmdi-account"></i><span>Employee</span></a>
                    <ul class="ml-menu">
                        <li><a href="{{ route('admin.manage.employee') }}">Employee List</a></li>
                        <li><a href="{{ route('admin.employee') }}">Add New Employee</a></li>
                    </ul>
                </li>

                <li><a href="javascript:void(0);" class="menu-toggle"><i
                            class="zmdi zmdi-apps"></i><span>Holiday</span></a>
                    <ul class="ml-menu">
                        <li><a href="{{ route('admin.calendar') }}">Calendar</a></li>
                    </ul>
                </li>

                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-map"></i>
                        <span>Location</span></a>
                    <ul class="ml-menu">
                        <li><a href="{{ route('admin.manage.location') }}">Location List</a></li>
                        <li><a href="{{ route('admin.url') }}">Add New Location</a></li>
                    </ul>
                </li>

                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-settings"></i></i>
                        <span>Payroll
                            Setting</span></a>
                    <ul class="ml-menu">
                        <li><a href="{{ route('admin.manage.payroll.setting') }}">Employee Payroll Setting</a></li>
                        <li><a href="{{ route('admin.payroll.setting') }}">Add Employee Payroll Setting</a></li>
                    </ul>
                </li>

                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-settings"></i></i>
                        <span>Attendance Setting</span></a>
                    <ul class="ml-menu">
                        <li><a href="{{ route('admin.manage.attendance.setting') }}">Employee Attendance Setting</a>
                        </li>
                        <li><a href="{{ route('admin.attendance.setting') }}">Add Employee Attendance Setting</a></li>
                    </ul>
                </li>
            @else
                <a class="btn btn-outline-success text-white" href="{{ url('/') }}">Buy/Extend Plan to Access
                    More</a>
            @endif
        </ul>
    </div>
</aside>
