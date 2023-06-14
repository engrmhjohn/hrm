@extends('backend.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Shift</div>
                <div class="card-body">
                    <a href="{{ route('admin.manage.shifts') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="zmdi zmdi-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <br />
                    <br />
                    <form action="{{route('admin.update.shifts')}}" method="post">
                        @csrf
                        <input type="hidden" name="shift_id" value="{{$shift->id}}">
                        <input type="hidden" name="admin_id" value="{{Auth::user()->id}}">
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                    <label for="name" class="control-label">{{ 'Shift Name' }}</label>
                                    <input class="form-control" name="name" type="text" value="{{ isset($shift->name) ? $shift->name : ''}}">
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                    <label for="name" class="control-label">{{ 'Saturday In Time *' }}</label>
                                    <input class="form-control" name="saturday_in_time" type="time" value="{{ isset($shift->saturday_in_time) ? $shift->saturday_in_time : ''}}">
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                    <label for="name" class="control-label">{{ 'Saturday Out Time *' }}</label>
                                    <input class="form-control" name="saturday_out_time" type="time" value="{{ isset($shift->saturday_out_time) ? $shift->saturday_out_time : ''}}">
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                    <label for="name" class="control-label">{{ 'Sunday In Time *' }}</label>
                                    <input class="form-control" name="sunday_in_time" type="time" value="{{ isset($shift->sunday_in_time) ? $shift->sunday_in_time : ''}}">
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                    <label for="name" class="control-label">{{ 'Sunday Out Time *' }}</label>
                                    <input class="form-control" name="sunday_out_time" type="time" value="{{ isset($shift->sunday_out_time) ? $shift->sunday_out_time : ''}}">
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                    <label for="name" class="control-label">{{ 'Monday In Time *' }}</label>
                                    <input class="form-control" name="monday_in_time" type="time" value="{{ isset($shift->monday_in_time) ? $shift->monday_in_time : ''}}">
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                    <label for="name" class="control-label">{{ 'Monday Out Time *' }}</label>
                                    <input class="form-control" name="monday_out_time" type="time" value="{{ isset($shift->monday_out_time) ? $shift->monday_out_time : ''}}">
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                    <label for="name" class="control-label">{{ 'Tuesday In Time *' }}</label>
                                    <input class="form-control" name="tuesday_in_time" type="time" value="{{ isset($shift->tuesday_in_time) ? $shift->tuesday_in_time : ''}}">
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                    <label for="name" class="control-label">{{ 'Tuesday Out Time *' }}</label>
                                    <input class="form-control" name="tuesday_out_time" type="time" value="{{ isset($shift->tuesday_out_time) ? $shift->tuesday_out_time : ''}}">
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                    <label for="name" class="control-label">{{ 'Wednesday In Time *' }}</label>
                                    <input class="form-control" name="wednesday_in_time" type="time" value="{{ isset($shift->wednesday_in_time) ? $shift->wednesday_in_time : ''}}">
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                    <label for="name" class="control-label">{{ 'Wednesday Out Time *' }}</label>
                                    <input class="form-control" name="wednesday_out_time" type="time" value="{{ isset($shift->wednesday_out_time) ? $shift->wednesday_out_time : ''}}">
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                    <label for="name" class="control-label">{{ 'Thursday In Time *' }}</label>
                                    <input class="form-control" name="thursday_in_time" type="time" value="{{ isset($shift->thursday_in_time) ? $shift->thursday_in_time : ''}}">
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                    <label for="name" class="control-label">{{ 'Thursday Out Time *' }}</label>
                                    <input class="form-control" name="thursday_out_time" type="time" value="{{ isset($shift->thursday_out_time) ? $shift->thursday_out_time : ''}}">
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                    <label for="name" class="control-label">{{ 'Friday In Time *' }}</label>
                                    <input class="form-control" name="friday_in_time" type="time" value="{{ isset($shift->friday_in_time) ? $shift->friday_in_time : ''}}">
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                    <label for="name" class="control-label">{{ 'Friday Out Time *' }}</label>
                                    <input class="form-control" name="friday_out_time" type="time" value="{{ isset($shift->friday_out_time) ? $shift->friday_out_time : ''}}">
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
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
