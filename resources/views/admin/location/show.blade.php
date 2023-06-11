@extends('backend.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Location</div>
                <div class="card-body">
                    <a href="{{ route('admin.location') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                class="zmdi zmdi-arrow-left"></i> Back</button></a>
                    <br />
                    <br />
                    <form action="{{ route('admin.save.location') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <div class="form-group {{ $errors->has('url') ? 'has-error' : '' }}">
                                    <label for="url" class="control-label">{{ 'URL' }}</label>
                                    <input class="form-control" name="url" type="text" id="url">
                                    {!! $errors->first('url', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="form-group {{ $errors->has('latitude') ? 'has-error' : '' }}">
                                    <label for="latitude" class="control-label">{{ 'Latitude' }}</label>
                                    <input class="form-control" name="latitude" type="text" id="latitude">
                                    {!! $errors->first('latitude', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="form-group {{ $errors->has('longitude') ? 'has-error' : '' }}">
                                    <label for="longitude" class="control-label">{{ 'Longitude' }}</label>
                                    <input class="form-control" name="longitude" type="text" id="longitude">
                                    {!! $errors->first('longitude', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input class="btn btn-primary" id="btn" value="Extract">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mt-3">
                            Status
                        </div>
                        <div class="col-md-9 mt-3">
                            <div class="form-group">
                                <div class="radio inlineblock m-r-20">
                                    <input type="radio" name="status" id="male" class="with-gap" checked
                                        value="option1">
                                    <label for="male">Publish</label>
                                </div>
                                <div class="radio inlineblock">
                                    <input type="radio" name="status" id="Female" class="with-gap" value="option2">
                                    <label for="Female">Unpublish</label>
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
