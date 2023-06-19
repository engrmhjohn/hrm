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
                    Manage Profile
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td>{{ Auth::user()->name }}</td>
                                        <td>{{ Auth::user()->email }}</td>
                                        <td>
                                            <a href="{{ route('admin.edit.profile', Auth::user()->id) }}"
                                                title="Edit Department"><button class="btn btn-primary btn-sm"><i
                                                        class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    Edit</button></a>
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
