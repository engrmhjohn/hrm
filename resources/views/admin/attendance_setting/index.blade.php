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
                    Attendance Setting Manage
                </div>
                <div class="card-body">
                    <a href="{{ route('admin.attendance.setting') }}" class="btn btn-success btn-sm" title="Add New">
                        <i class="zmdi zmdi-plus" aria-hidden="true"></i> Add New
                    </a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Employee Name</th>
                                    <th>Date</th>
                                    <th>Check In Time</th>
                                    <th>Check In Status</th>
                                    <th>Check Out Time</th>
                                    <th>Check Out Status</th>
                                    <th>Working Hours</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attendance_settings as $attendance)
                                    <tr>
                                        <td> {{ $loop->iteration }}</td>
                                        <td> {{ $attendance->employee->name }}</td>
                                        <td> {{ $attendance->date }} </td>
                                        <td> {{ $attendance->in_time }} </td>
                                        <td> {{ $attendance->in_time_status }}</td>
                                        <td> {{ $attendance->out_time }} </td>
                                        <td> {{ $attendance->out_time_status }} </td>
                                        <td> {{ number_format($attendance->working_hours, 2) }} Hrs</td>
                                        <td>
                                            <a href="{{ route('admin.edit.attendance.setting', $attendance->id) }}"
                                                title="Edit Attendance"><button class="btn btn-primary btn-sm"><i
                                                        class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    Edit</button></a>

                                            <form action="{{ route('admin.delete.attendance.setting') }}" method="post"
                                                id="delete" style="display:inline">
                                                @csrf
                                                <input type="hidden" value="{{ $attendance->id }}"
                                                    name="attendance_setting_id">
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
