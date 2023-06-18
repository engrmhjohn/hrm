@extends('backend.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Employee</div>
                <div class="card-body">
                    <a href="{{ route('admin.auth.workerList') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                class="zmdi zmdi-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <br />
                    <br />
                    <form action="{{ route('admin.auth.updateWorker') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="worker_id" value="{{ $employee->id }}">
                        <input type="hidden" name="admin_id" value="{{ Auth::user()->id }}">
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
                                <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                                    <label for="phone" class="control-label">{{ 'Contact Number' }}</label>
                                    <input class="form-control" name="phone" type="text" id="phone"
                                        value="{{ isset($employee->phone) ? $employee->phone : '' }}">
                                    {!! $errors->first('contact_number', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                Gender
                            </div>

                            <div class="col-md-9 mt-3">
                                <div class="form-group">
                                    <div class="radio inlineblock m-r-20">
                                        <input type="radio" name="gender" id="male" class="with-gap"
                                            {{ isset($employee->gender) && $employee->gender == 1 ? 'checked' : '' }}
                                            checked value="1">
                                        <label for="male">Male</label>
                                    </div>
                                    <div class="radio inlineblock">
                                        <input type="radio" name="gender"
                                            {{ isset($employee->gender) && $employee->gender == 0 ? 'checked' : '' }}
                                            id="Female" class="with-gap" value="0">
                                        <label for="Female">Female</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <label>Office Location</label>
                                <select name="location_id" id="" class="form-control show-tick ms search-select">
                                    <option value="" disabled selected>Select a Location</option>
                                    @foreach ($locations as $location)
                                        <option value="{{ $location->id }}"
                                            {{ isset($employee->location_id) ? ($employee->location_id == $location->id ? 'selected' : '') : '' }}>
                                            {{ $location->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label>Department</label>
                                <select name="department_id" id="" class="form-control show-tick ms search-select">
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
                                <select name="designation_id" id=""
                                    class="form-control show-tick ms search-select">
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
                                <select name="shift_id" id="" class="form-control show-tick ms search-select">
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
                                <select name="pay_slip_id" id="" class="form-control show-tick ms search-select">
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
                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="header">
                                        <h2>Employee Current Image</h2>
                                        <img src="{{ asset($employee->image) }}" alt=""
                                            style="height: 200px; width: 200px;" class="mb-3">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="body">
                                        <input type="file" name="image" class="dropify"
                                            value="{{ isset($employee->image) ? $employee->image : '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 mt-3">
                            Status
                        </div>

                        <div class="col-md-9 mt-3">
                            <div class="form-group">
                                <div class="radio inlineblock m-r-20">
                                    <input type="radio" name="status" id="publish" class="with-gap"
                                        {{ isset($employee->status) && $employee->status == 1 ? 'checked' : '' }} checked
                                        value="1">
                                    <label for="publish">Publish</label>
                                </div>
                                <div class="radio inlineblock">
                                    <input type="radio" name="status"
                                        {{ isset($employee->status) && $employee->status == 0 ? 'checked' : '' }}
                                        id="unublish" class="with-gap" value="0">
                                    <label for="unublish">Unpublish</label>
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
