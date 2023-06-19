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
                                    <th>Admin Name</th>
                                    <th>Admin Email</th>
                                    <th>Admin Phone</th>
                                    <th>Admin Designation</th>
                                    <th>Admin Image</th>
                                    <th>Company Name</th>
                                    <th>Company Phone</th>
                                    <th>Company Address</th>
                                    <th>Company Type</th>
                                    <th>Company Employee</th>
                                    <th>Company Logo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td>{{ Auth::user()->name }}</td>
                                        <td>{{ Auth::user()->email }}</td>
                                        <td>{{ Auth::user()->phone }}</td>
                                        <td>{{ Auth::user()->designation }}</td>
                                        <td><img src="{{ asset(Auth::user()->admin_image) }}" alt="" style="width: 60px;"></td>
                                        <td>{{ Auth::user()->company_name }}</td>
                                        <td>{{ Auth::user()->company_phone }}</td>
                                        <td>{{ Auth::user()->company_address }}</td>
                                        <td>{{ Auth::user()->company_type }}</td>
                                        <td>{{ Auth::user()->company_employee }}</td>
                                        <td>{{ Auth::user()->logo }}</td>
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
