@extends('backend.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Location</div>
                <div class="card-body">
                    <a href="{{ route('admin.manage.location') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                class="zmdi zmdi-arrow-left"></i> Back</button></a>
                    <br />
                    <br />
                    <form action="{{ route('admin.get_coordinates') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="name" class="control-label">{{ 'Name' }}</label>
                                    <input class="form-control" name="name" type="text" id="name">
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="form-group {{ $errors->has('url') ? 'has-error' : '' }}">
                                    <label for="url" class="control-label">{{ 'Google Map URL' }}</label>
                                    <input class="form-control" name="url" type="text" id="url">
                                    {!! $errors->first('url', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" value="Add">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
