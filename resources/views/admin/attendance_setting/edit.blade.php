@extends('backend.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Attendance Setting</div>
                <div class="card-body">
                    <a href="{{ route('admin.manage.attendance.setting') }}" title="Back"><button
                            class="btn btn-warning btn-sm"><i class="zmdi zmdi-arrow-left" aria-hidden="true"></i>
                            Back</button></a>
                    <br />
                    <br />
                    <form action="{{ route('admin.update.attendance.setting') }}" method="post">
                        @csrf
                        <input type="hidden" name="attendance_setting_id" value="{{ $attendance_setting->id }}">
                        <div class="row">

                            <div class="col-lg-6 mb-3">

                                <label>Select Employee</label>

                                <select name="employee_id" id="" class="form-control show-tick ms search-select"
                                    data-placeholder="Select Employee">
                                    <option value="" disabled selected></option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}"
                                            {{ isset($attendance_setting->employee_id) ? ($attendance_setting->employee_id == $employee->id ? 'selected' : '') : '' }}>
                                            {{ $employee->name }}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="col-lg-6 mb-3">
                                <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                                    <label for="date" class="control-label">{{ 'date' }}</label>
                                    <input class="form-control" name="date" type="date" id="date" value="{{ isset($attendance_setting->date) ? $attendance_setting->date : '' }}">
                                    {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="form-group {{ $errors->has('in_time') ? 'has-error' : '' }}">
                                    <label for="in_time" class="control-label">{{ 'In Time' }}</label>
                                    <input class="form-control" name="in_time" type="time" value="{{ isset($attendance_setting->out_time) ? $attendance_setting->in_time : '' }}">
                                    {!! $errors->first('in_time', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="form-group {{ $errors->has('out_time') ? 'has-error' : '' }}">
                                    <label for="out_time" class="control-label">{{ 'Out Time' }}</label>
                                    <input class="form-control" name="out_time" type="time" value="{{ isset($attendance_setting->out_time) ? $attendance_setting->out_time : '' }}">
                                    {!! $errors->first('out_time', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="form-group {{ $errors->has('in_time_status') ? 'has-error' : '' }}">
                                    <label for="in_time_status" class="control-label">{{ 'In Time Status' }}</label>
                                    <input class="form-control" disabled name="in_time_status" type="text"
                                        id="in_time_status" value="{{ isset($attendance_setting->in_time_status) ? $attendance_setting->in_time_status : '' }}">
                                    {!! $errors->first('in_time_status', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="form-group {{ $errors->has('out_time_status') ? 'has-error' : '' }}">
                                    <label for="out_time_status" class="control-label">{{ 'Out Time Status' }}</label>
                                    <input class="form-control" disabled name="out_time_status" type="text"
                                        id="out_time_status" value="{{ isset($attendance_setting->out_time_status) ? $attendance_setting->out_time_status : '' }}">
                                    {!! $errors->first('out_time_status', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="form-group {{ $errors->has('working_hours') ? 'has-error' : '' }}">
                                    <label for="working_hours" class="control-label">{{ 'Working Hours' }}</label>
                                    <input class="form-control" disabled name="working_hours" type="text" id="working_hours" value="{{ isset($attendance_setting->working_hours) ? $attendance_setting->working_hours : '' }}" >
                                    {!! $errors->first('working_hours', '<p class="help-block">:message</p>') !!}
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
