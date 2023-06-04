@extends('backend.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Department</div>
                <div class="card-body">
                    <a href="{{ route('admin.manage.department') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <br />
                    <br />
                    <form action="{{route('admin.save.department')}}" method="post">
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                            <label for="name" class="control-label">{{ 'Name' }}</label>
                            <input class="form-control" name="name" type="text" id="name">
                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-3 mt-3">
                            Status
                        </div>
                        <div class="col-md-9 mt-3">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="inlineRadio1">Publish</label>
                                <input class="form-check-input" type="radio" checked name="status" id="inlineRadio1" value="1">
                              </div>
                              <div class="form-check form-check-inline">
                                  <label class="form-check-label" for="inlineRadio2">Unpublish</label>
                                <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0">
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
