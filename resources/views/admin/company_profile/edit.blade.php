@extends('backend.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Information</div>
                <div class="card-body">
                    <a href="{{ url('/admin/dashboard') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                class="zmdi zmdi-arrow-left"></i></i> Back</button></a>
                    <br />
                    <br />
                    <form action="{{ route('admin.update.profile') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="admin_id" value="{{ $profile->id }}">
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="name" class="control-label">{{ 'Name' }}</label>
                                    <input class="form-control" name="name" type="text" id="name"
                                        value="{{ $profile->name }}">
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <label for="email" class="control-label">{{ 'Email' }}</label>
                                    <input class="form-control" name="email" type="text" id="email"
                                        value="{{ $profile->email }}">
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                                    <label for="phone" class="control-label">{{ 'Phone' }}</label>
                                    <input class="form-control" name="phone" type="text" id="phone"
                                        value="{{ $profile->phone }}">
                                    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('designation') ? 'has-error' : '' }}">
                                    <label for="phodesignationne" class="control-label">{{ 'Designation' }}</label>
                                    <input class="form-control" name="designation" type="text" id="designation"
                                        value="{{ $profile->designation }}">
                                    {!! $errors->first('designation', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="card">
                                    <div class="header">
                                        <h2>Employee Current Image</h2>
                                        <img src="{{ asset($profile->admin_image) }}" alt=""
                                            style="height: 200px; width: 200px;" class="mb-3">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="card">
                                    <div class="body">
                                        <label for="admin_image" class="control-label">{{ 'Upload/Drop Image' }}</label>
                                        <input type="file" name="admin_image" class="dropify"
                                            value="{{ isset($profile->admin_image) ? $profile->admin_image : '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group {{ $errors->has('company_name') ? 'has-error' : '' }}">
                                    <label for="company_name" class="control-label">{{ 'Company Name' }}</label>
                                    <input class="form-control" name="company_name" type="text" id="company_name"
                                        value="{{ $profile->company_name }}">
                                    {!! $errors->first('company_name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('company_phone') ? 'has-error' : '' }}">
                                    <label for="company_phone" class="control-label">{{ 'Company Phone' }}</label>
                                    <input class="form-control" name="company_phone" type="text" id="company_phone"
                                        value="{{ $profile->company_phone }}">
                                    {!! $errors->first('company_phone', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('company_address') ? 'has-error' : '' }}">
                                    <label for="company_address" class="control-label">{{ 'Company Address' }}</label>
                                    <input class="form-control" name="company_address" type="text" id="company_address"
                                        value="{{ $profile->company_address }}">
                                    {!! $errors->first('company_address', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('company_type') ? 'has-error' : '' }}">
                                    <label for="company_type" class="control-label">{{ 'Company Type' }}</label>
                                    <input class="form-control" name="company_type" type="text" id="company_type"
                                        value="{{ $profile->company_type }}">
                                    {!! $errors->first('company_type', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('company_employee') ? 'has-error' : '' }}">
                                    <label for="company_employee" class="control-label">{{ 'Company No of Employee' }}</label>
                                    <input class="form-control" name="company_employee" type="text" id="company_employee"
                                        value="{{ $profile->company_employee }}">
                                    {!! $errors->first('company_employee', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="card">
                                    <div class="header">
                                        <h2>Company Current Logo</h2>
                                        <img src="{{ asset($profile->logo) }}" alt=""
                                            style="height: 200px; width: 200px;" class="mb-3">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="card">
                                    <div class="body">
                                        <label for="logo" class="control-label">{{ 'Upload/Drop Logo' }}</label>
                                        <input type="file" name="logo" class="dropify"
                                            value="{{ isset($profile->logo) ? $profile->logo : '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" value="Update">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
