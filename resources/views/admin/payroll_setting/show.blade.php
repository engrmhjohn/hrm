@extends('backend.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Payroll Setting</div>
                <div class="card-body">
                    <a href="{{ route('admin.manage.payroll.setting') }}" title="Back"><button
                            class="btn btn-warning btn-sm"><i class="zmdi zmdi-arrow-left" aria-hidden="true"></i>
                            Back</button></a>
                    <br />
                    <br />
                    <form action="{{ route('admin.save.payroll.setting') }}" method="post">
                        @csrf
                        <input type="hidden" name="admin_id" value="{{Auth::user()->id}}">
                        <div class="row">
                            <div class="col-md-3">
                                Payroll Type
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <div class="radio inlineblock m-r-20">
                                        <input type="radio" name="payroll_type" id="single" class="with-gap"
                                            value="1">
                                        <label for="single">Single</label>
                                    </div>
                                    <div class="radio inlineblock">
                                        <input type="radio" name="payroll_type" id="department_wise" class="with-gap"
                                            value="0">
                                        <label for="department_wise">Department Wise</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3" id="single_payroll" style="display:none;">

                                <label>Select Employee</label>
                                <select name="employee_id" id="" class="form-control show-tick ms search-select"
                                    data-placeholder="Select Employee">
                                    <option value="" disabled selected></option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-lg-12 mb-3" id="department_wise_payroll" style="display:none;">
                                <label>Select Department</label>
                                <select name="department_id" id="" class="form-control show-tick ms search-select"
                                    data-placeholder="Select Department">
                                    <option value="" disabled selected></option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="form-group {{ $errors->has('late_in_cut') ? 'has-error' : '' }}">
                                    <label for="late_in_cut"
                                        class="control-label">{{ 'Late-In Cut -- % of Basic Salary' }}</label>
                                    <input class="form-control" name="late_in_cut" type="text" id="late_in_cut">
                                    {!! $errors->first('late_in_cut', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="form-group {{ $errors->has('early_out_cut') ? 'has-error' : '' }}">
                                    <label for="early_out_cut"
                                        class="control-label">{{ 'Early-Out Cut -- % of Basic Salary' }}</label>
                                    <input class="form-control" name="early_out_cut" type="text" id="early_out_cut">
                                    {!! $errors->first('early_out_cut', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="form-group {{ $errors->has('unpaid_leave_cut') ? 'has-error' : '' }}">
                                    <label for="unpaid_leave_cut"
                                        class="control-label">{{ 'Unpaid Leave Cut -- % of Basic Salary' }}</label>
                                    <input class="form-control" name="unpaid_leave_cut" type="text"
                                        id="unpaid_leave_cut">
                                    {!! $errors->first('unpaid_leave_cut', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="form-group {{ $errors->has('absent_cut') ? 'has-error' : '' }}">
                                    <label for="absent_cut"
                                        class="control-label">{{ 'Absent Cut -- % of Basic Salary' }}</label>
                                    <input class="form-control" name="absent_cut" type="text" id="absent_cut">
                                    {!! $errors->first('absent_cut', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="form-group {{ $errors->has('bonus') ? 'has-error' : '' }}">
                                    <label for="bonus"
                                        class="control-label">{{ 'Bonus Get -- % of Basic Salary' }}</label>
                                    <input class="form-control" name="bonus" type="text" id="bonus">
                                    {!! $errors->first('bonus', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="bonus_month"
                                class="control-label">{{ 'Select Bonus Month' }}</label>
                                <select class="form-control show-tick ms search-select" name="bonus_month" data-placeholder="Select Month">
                                    <option value="" disabled selected></option>
                                    <option value="1">January</option>
                                    <option value="2">February</option>
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                    <option value="7">July</option>
                                    <option value="8">Auguest</option>
                                    <option value="9">September</option>
                                    <option value="10">October</option>
                                    <option value="11">Noverber</option>
                                    <option value="12">December</option>
                                </select>
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
