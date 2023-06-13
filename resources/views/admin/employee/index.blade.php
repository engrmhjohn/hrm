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
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <a href="{{ route('admin.employee') }}" class="btn btn-success btn-sm" title="Add New">
                        <i class="zmdi zmdi-plus" aria-hidden="true"></i> Add New
                    </a>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Location</th>
                                    <th>Department</th>
                                    <th>Designation</th>
                                    <th>Pay Slip</th>
                                    <th>Shift</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Location</th>
                                    <th>Department</th>
                                    <th>Designation</th>
                                    <th>Pay Slip</th>
                                    <th>Shift</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($employees as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td><img src="{{ asset($item->image) }}" alt="" style="width: 200px;"></td>
                                        <td>{{ $item->location->name ?? '' }}</td>
                                        <td>{{ $item->department->name }}</td>
                                        <td>{{ $item->designation->name }}</td>
                                        <td>{{ $item->paySlip->name }}</td>
                                        <td>{{ $item->shift->name }}</td>
                                        <td>
                                            @if ($item->status == 1)
                                                <a class="fw-bold">Running</a>
                                            @else
                                                <a class="fw-bold">Ex Employee</a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.edit.employee', $item->id) }}"
                                                title="Edit Employee"><button class="btn btn-primary btn-sm"><i
                                                        class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    Edit</button></a>

                                            <form action="{{ route('admin.delete.employee') }}" method="post"
                                                id="delete" style="display:inline">
                                                @csrf
                                                <input type="hidden" value="{{ $item->id }}" name="employee_id">
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
