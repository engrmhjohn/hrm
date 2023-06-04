@extends('backend.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Employee</div>
                <div class="card-body">
                    <a href="{{ route('admin.manage.employee') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <br />
                    <br />
                    <form action="{{ route('admin.update.employee') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="name" class="control-label">{{ 'Name' }}</label>
                                    <input class="form-control" name="name" type="text" id="name"
                                        value="{{ isset($employee->name) ? $employee->name : '' }}">
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <label for="email" class="control-label">{{ 'Email' }}</label>
                                    <input class="form-control" name="email" type="text" id="email"
                                        value="{{ isset($employee->email) ? $employee->email : '' }}">
                                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="form-group {{ $errors->has('contact_number') ? 'has-error' : '' }}">
                                    <label for="contact_number" class="control-label">{{ 'Contact Number' }}</label>
                                    <input class="form-control" name="contact_number" type="text" id="contact_number"
                                        value="{{ isset($employee->contact_number) ? $employee->contact_number : '' }}">
                                    {!! $errors->first('contact_number', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                Gender
                            </div>
                            <div class="col-md-9 mb-3">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label" for="inlineRadio1">Male</label>
                                    <input class="form-check-input" type="radio" name="gender"
                                        {{ isset($employee->status) && $employee->status == 1 ? 'checked' : '' }}
                                        id="inlineRadio1" value="1">
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label" for="inlineRadio2">Female</label>
                                    <input class="form-check-input" type="radio" name="gender"
                                        {{ isset($employee->status) && $employee->status == 0 ? 'checked' : '' }}
                                        id="inlineRadio2" value="0">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <label>Department</label>
                                <select name="department_id" id="" class="form-control">
                                    <option value="" disabled selected>Select a Department</option>
                                    @foreach ($departments as $department)
                                        <option value=" {{ $department->id }}"
                                            {{ isset($employee->department_id) ? ($employee->department_id == $department->id ? 'selected' : '') : '' }}>
                                            {{ $department->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label>Designation</label>
                                <select name="designation_id" id="" class="form-control">
                                    <option value="" disabled selected>Select a Designation</option>
                                    @foreach ($designations as $designation)
                                        <option value=" {{ $designation->id }}"
                                            {{ isset($employee->designation_id) ? ($employee->designation_id == $designation->id ? 'selected' : '') : '' }}>
                                            {{ $designation->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label>Working Shift</label>
                                <select name="shift_id" id="" class="form-control">
                                    <option value="" disabled selected>Select a Shift</option>
                                    @foreach ($shifts as $shift)
                                    <option value=" {{ $shift->id }}"
                                        {{ isset($employee->shift_id) ? ($employee->shift_id == $shift->id ? 'selected' : '') : '' }}>
                                        {{ $shift->name }} </option>
                                @endforeach
                                </select>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label>Pay Slip</label>
                                <select name="pay_slip_id" id="" class="form-control">
                                    <option value="" disabled selected>Select a Pay Slip</option>

                                    @foreach ($pay_slips as $pay_slip)
                                    <option value=" {{ $pay_slip->id }}"
                                        {{ isset($employee->pay_slip_id) ? ($employee->pay_slip_id == $pay_slip->id ? 'selected' : '') : '' }}>
                                        {{ $pay_slip->name }} </option>
                                @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="form-group {{ $errors->has('salary') ? 'has-error' : '' }}">
                                    <label for="salary" class="control-label">{{ 'Salary' }}</label>
                                    <input class="form-control" name="salary" type="text" id="salary"
                                        value="{{ isset($employee->salary) ? $employee->salary : '' }}">
                                    {!! $errors->first('salary', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="form-group {{ $errors->has('food_allowance') ? 'has-error' : '' }}">
                                    <label for="food_allowance" class="control-label">{{ 'Food Allowance' }}</label>
                                    <input class="form-control" name="food_allowance" type="text" id="food_allowance"
                                        value="{{ isset($employee->food_allowance) ? $employee->food_allowance : '' }}">
                                    {!! $errors->first('food_allowance', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="form-group {{ $errors->has('other') ? 'has-error' : '' }}">
                                    <label for="other" class="control-label">{{ 'Other' }}</label>
                                    <input class="form-control" name="other" type="text" id="other"
                                        value="{{ isset($employee->other) ? $employee->other : '' }}">
                                    {!! $errors->first('other', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                                    <img src="{{ asset($employee->image) }}" alt=""
                                        style="height: 200px; width: 200px;" class="mb-3">
                                    <input class="form-control" name="image" type="file" id="image"
                                        value="{{ isset($employee->image) ? $employee->image : '' }}">
                                    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 mt-3">
                            Status
                        </div>
                        <div class="col-md-9 mt-3">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="inlineRadio1">Publish</label>
                                <input class="form-check-input" type="radio" name="status"
                                    {{ isset($employee->status) && $employee->status == 1 ? 'checked' : '' }}
                                    id="inlineRadio1" value="1">
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="inlineRadio2">Unpublish</label>
                                <input class="form-check-input" type="radio" name="status"
                                    {{ isset($employee->status) && $employee->status == 0 ? 'checked' : '' }}
                                    id="inlineRadio2" value="0">
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
