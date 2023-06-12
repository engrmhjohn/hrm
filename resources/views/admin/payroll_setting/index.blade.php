@extends('backend.master')
@section('content')
    <div class="row">
        @if (Session::has('message'))
            <div class="col-lg-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Payroll Setting Manage
                </div>
                <div class="card-body">
                    <a href="{{ route('admin.payroll.setting') }}" class="btn btn-success btn-sm" title="Add New">
                        <i class="zmdi zmdi-plus" aria-hidden="true"></i> Add New
                    </a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Payroll Type</th>
                                    <th>Employee / Department Name</th>
                                    <th>Late-in Cut</th>
                                    <th>Early-out Cut</th>
                                    <th>Unpaid Leave</th>
                                    <th>Absent</th>
                                    <th>Bonus</th>
                                    <th>Bonus Month</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payroll_settings as $payroll)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $payroll->payroll_type == 1 ? 'Single' : 'Department Wise' }}</td>
                                        @if ($payroll->payroll_type == 1)
                                            <td> {{ $payroll->employee->name }} </td>
                                        @else
                                            <td> {{ $payroll->department->name }} </td>
                                        @endif
                                        <td> {{ $payroll->late_in_cut }} % </td>
                                        <td> {{ $payroll->early_out_cut }} % </td>
                                        <td> {{ $payroll->unpaid_leave_cut }} % </td>
                                        <td> {{ $payroll->absent_cut }} % </td>
                                        <td> {{ $payroll->bonus }} % </td>
                                        <td> {{ date('F', mktime(0, 0, 0, $payroll->bonus_month, 1)) }} </td>

                                        <td>
                                            <a href="{{ route('admin.edit.payroll.setting', $payroll->id) }}"
                                                title="Edit Department"><button class="btn btn-primary btn-sm"><i
                                                        class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    Edit</button></a>

                                            <form action="{{ route('admin.delete.payroll.setting') }}" method="post"
                                                id="delete" style="display:inline">
                                                @csrf
                                                <input type="hidden" value="{{ $payroll->id }}"
                                                    name="payroll_setting_id">
                                                <input class="btn btn-danger btn-sm" type="submit" value="Delete"
                                                    onclick="return confirm('Are you sure?')">
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
