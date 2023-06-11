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
                    <form action="{{ route('admin.update.location', $location->id) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <div class="form-group {{ $errors->has('url') ? 'has-error' : '' }}">
                                    <label for="url" class="control-label">{{ 'Google Map URL' }}</label>
                                    <input class="form-control" name="url" type="text" required id="url" value="{{ $location->url }}">
                                    {!! $errors->first('url', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" value="Update URL">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
