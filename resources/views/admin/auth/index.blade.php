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
                    Manage Employee
                </div>
                <div class="card-body">
                    <a href="{{ route('admin.auth.createWorker') }}" class="btn btn-success btn-sm" title="Add New">
                        <i class="zmdi zmdi-plus" aria-hidden="true"></i> Add New
                    </a>


                    <br />
                    <br />
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
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
                                </tr>
                            </thead>
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
                                            <a href="{{ route('admin.auth.editWorker', $item->id) }}"
                                                title="Edit Employee"><button class="btn btn-primary btn-sm"><i
                                                        class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    Edit</button></a>

                                            <form action="{{ route('admin.auth.deleteWorker', $item->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a class="btn btn-sm btn-danger" type="submit"
                                                    onclick="return(confirm('Are you sure want to delete this item?'))">Delete</a>
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
