@extends('backend.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Attendance Setting</div>
                <div class="card-body">
                    <a href="{{ route('admin.manage.attendance.setting') }}" title="Back"><button
                            class="btn btn-warning btn-sm"><i class="zmdi zmdi-arrow-left" aria-hidden="true"></i>
                            Back</button></a>
                    <br />
                    <br />
                    <form action="{{ route('admin.save.attendance.setting') }}" method="post">
                        @csrf
                        <div class="row">

                            <div class="col-lg-6 mb-3">

                                <label>Select Employee</label>
                                <select name="employee_id" id="" class="form-control show-tick ms search-select"
                                    data-placeholder="Select Employee">
                                    <option value="" disabled selected></option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="col-lg-6 mb-3">
                                <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                                    <label for="date"
                                        class="control-label">{{ 'date' }}</label>
                                    <input class="form-control" name="date" type="date" id="date">
                                    {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('in_time') ? 'has-error' : ''}}">
                                    <label for="in_time" class="control-label">{{ 'In Time' }}</label>
                                    <input class="form-control" name="in_time" type="time">
                                    {!! $errors->first('in_time', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('out_time') ? 'has-error' : ''}}">
                                    <label for="out_time" class="control-label">{{ 'Out Time' }}</label>
                                    <input class="form-control" name="out_time" type="time">
                                    {!! $errors->first('out_time', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                    <input class="form-control" name="in_time_status" type="hidden" id="in_time_status">
                                    {!! $errors->first('in_time_status', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                    <input class="form-control" name="out_time_status" type="hidden" id="out_time_status">
                                    {!! $errors->first('out_time_status', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-12">
                                    <input class="form-control" name="working_hours" type="hidden"
                                        id="working_hours">
                                    {!! $errors->first('working_hours', '<p class="help-block">:message</p>') !!}
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
