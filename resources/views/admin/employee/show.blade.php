@extends('backend.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Employee</div>
                <div class="card-body">
                    <a href="{{ route('admin.manage.employee') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                class="zmdi zmdi-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <br />
                    <br />
                    <form action="{{ route('admin.save.employee') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="name" class="control-label">{{ 'Name' }}</label>
                                    <input class="form-control" name="name" type="text" id="name">
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <label for="email" class="control-label">{{ 'Email' }}</label>
                                    <input class="form-control" name="email" type="text" id="email">
                                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="form-group {{ $errors->has('contact_number') ? 'has-error' : '' }}">
                                    <label for="contact_number" class="control-label">{{ 'Contact Number' }}</label>
                                    <input class="form-control" name="contact_number" type="text" id="contact_number">
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
                                        <input type="radio" name="gender" id="male" class="with-gap" checked value="option1">
                                        <label for="male">Male</label>
                                    </div>
                                    <div class="radio inlineblock">
                                        <input type="radio" name="gender" id="Female" class="with-gap" value="option2">
                                        <label for="Female">Female</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <label>Department</label>
                                <select name="department_id" id="" class="form-control">
                                    <option value="" disabled selected>Select a Department</option>
                                    @foreach($departments as $department)
                                    <option value="{{$department->id}}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-12 mb-3">
                                 <label>Designation</label>
                                <select name="designation_id" id="" class="form-control">
                                    <option value="" disabled selected>Select a Designation</option>
                                    @foreach($designations as $designation)
                                    <option value="{{$designation->id}}">{{ $designation->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-12 mb-3">
                                 <label>Working Shift</label>
                                <select name="shift_id" id="" class="form-control">
                                    <option value="" disabled selected>Select a Shift</option>
                                    @foreach($shifts as $shift)
                                    <option value="{{$shift->id}}">{{ $shift->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-12 mb-3">
                                 <label>Pay Slip</label>
                                <select name="pay_slip_id" id="" class="form-control">
                                    <option value="" disabled selected>Select a Pay Slip</option>
                                    @foreach($pay_slips as $pay_slip)
                                    <option value="{{$pay_slip->id}}">{{ $pay_slip->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="form-group {{ $errors->has('salary') ? 'has-error' : '' }}">
                                    <label for="salary" class="control-label">{{ 'Salary' }}</label>
                                    <input class="form-control" name="salary" type="text" id="salary">
                                    {!! $errors->first('salary', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="form-group {{ $errors->has('food_allowance') ? 'has-error' : '' }}">
                                    <label for="food_allowance" class="control-label">{{ 'Food Allowance' }}</label>
                                    <input class="form-control" name="food_allowance" type="text" id="food_allowance">
                                    {!! $errors->first('food_allowance', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="form-group {{ $errors->has('other') ? 'has-error' : '' }}">
                                    <label for="other" class="control-label">{{ 'Other' }}</label>
                                    <input class="form-control" name="other" type="text" id="other">
                                    {!! $errors->first('other', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
                                <label for="image" class="control-label">{{ 'Image' }}</label>
                                <input class="form-control" name="image" type="file" id="image">
                                {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>

                        <div class="col-md-3 mt-3">
                            Status
                        </div>
                        <div class="col-md-9 mt-3">
                            <div class="form-group">
                                <div class="radio inlineblock m-r-20">
                                    <input type="radio" name="status" id="male" class="with-gap" checked value="option1">
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
