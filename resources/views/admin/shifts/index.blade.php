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
                    Designation
                </div>
                <div class="card-body">
                    <a href="{{ route('admin.shifts') }}" class="btn btn-success btn-sm" title="Add New">
                        <i class="zmdi zmdi-plus" aria-hidden="true"></i> Add New
                    </a>
                    <form method="GET" action="" accept-charset="UTF-8" class="form-inline"
                    role="search" style="width: 25%;float: right;">
                    <div class="search form-inline">
                        <div class="input-group mb-0">
                            <input type="text" class="form-control" placeholder="Search...">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"><i class="zmdi zmdi-search"></i></span>
                            </div>
                        </div>
                    </div>
                </form>

                    <br />
                    <br />
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Saturday</th>
                                    <th>Sunday</th>
                                    <th>Monday</th>
                                    <th>Tuesday</th>
                                    <th>Wednesday</th>
                                    <th>Thursday</th>
                                    <th>Friday</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($shifts as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->saturday_in_time }} To {{ $item->saturday_out_time }}</td>
                                        <td>{{ $item->sunday_in_time }} To {{ $item->sunday_out_time }}</td>
                                        <td>{{ $item->monday_in_time }} To {{ $item->monday_out_time }}</td>
                                        <td>{{ $item->tuesday_in_time }} To {{ $item->tuesday_out_time }}</td>
                                        <td>{{ $item->wednesday_in_time }} To {{ $item->wednesday_out_time }}</td>
                                        <td>{{ $item->thursday_in_time }} To {{ $item->thursday_out_time }}</td>
                                        <td>{{ $item->friday_in_time }} To {{ $item->friday_out_time }}</td>
                                        <td>
                                            <a href="{{ route('admin.edit.shifts', $item->id) }}"
                                                title="Edit Department"><button class="btn btn-primary btn-sm"><i
                                                        class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    Edit</button></a>

                                            <form action="{{ route('admin.delete.shifts') }}" method="post" id="delete"
                                                style="display:inline">
                                                @csrf
                                                <input type="hidden" value="{{ $item->id }}" name="shift_id">
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
