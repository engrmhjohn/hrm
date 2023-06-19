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
                        <input type="hidden" name="admin_id" value="{{ $profile->id }}">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name" class="control-label">{{ 'Name' }}</label>
                            <input class="form-control" name="name" type="text" id="name"
                                value="{{ $profile->name }}">
                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email" class="control-label">{{ 'Email' }}</label>
                            <input class="form-control" name="email" type="text" id="email"
                                value="{{ $profile->email }}">
                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                            <label for="phone" class="control-label">{{ 'Phone' }}</label>
                            <input class="form-control" name="phone" type="text" id="phone"
                                value="{{ $profile->phone }}">
                            {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
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
