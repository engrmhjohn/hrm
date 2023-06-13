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
                    Pay Slip
                </div>
                <div class="card-body">
                    <a href="{{ route('admin.pay_slip') }}" class="btn btn-success btn-sm" title="Add New">
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
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pay_slips as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            @if ($item->status == 1)
                                                <a class="fw-bold">Published</a>
                                            @else
                                                <a class="fw-bold">Unpublished</a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.edit.pay_slip', $item->id) }}"
                                                title="Edit Pay Slip"><button class="btn btn-primary btn-sm"><i
                                                        class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    Edit</button></a>

                                            <form action="{{ route('admin.delete.pay_slip') }}" method="post"
                                                id="delete" style="display:inline">
                                                @csrf
                                                <input type="hidden" value="{{ $item->id }}" name="pay_slip_id">
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
