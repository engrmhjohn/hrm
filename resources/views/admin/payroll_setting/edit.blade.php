@extends('backend.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Payroll Setting</div>
                <div class="card-body">
                    <a href="{{ route('admin.manage.payroll.setting') }}" title="Back"><button
                            class="btn btn-warning btn-sm"><i class="zmdi zmdi-arrow-left" aria-hidden="true"></i>
                            Back</button></a>
                    <br />
                    <br />
                    <form action="{{ route('admin.update.payroll.setting') }}" method="post">
                        @csrf
                        <input type="hidden" name="payroll_setting_id" {{ $payroll_setting->id }}>
                        <input type="hidden" name="admin_id" value="{{Auth::user()->id}}">
                        <div class="row">
                            <div class="col-md-3">
                                Payroll Type
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <div class="radio inlineblock m-r-20">
                                        <input type="radio" name="payroll_type" id="single" class="with-gap"
                                            {{ isset($payroll_setting->payroll_type) && $payroll_setting->payroll_type == 1 ? 'checked' : '' }}
                                            value="1">
                                        <label for="single">Single</label>
                                    </div>
                                    <div class="radio inlineblock">
                                        <input type="radio" name="payroll_type" id="department_wise" class="with-gap"
                                            {{ isset($payroll_setting->payroll_type) && $payroll_setting->payroll_type == 0 ? 'checked' : '' }}
                                            value="0">
                                        <label for="department_wise">Department Wise</label>
                                    </div>
                                </div>
                            </div>
                            @if ($payroll_setting->payroll_type == '1')
                                <div class="col-lg-12 mb-3" id="single_payroll">

                                    <label>Select Employee</label>
                                    <select name="employee_id" id=""
                                        class="form-control show-tick ms search-select" data-placeholder="Select Employee">
                                        <option value="" disabled selected></option>
                                        @foreach ($employees as $employee)
                                            <option value="{{ $employee->id }}"
                                                {{ isset($payroll_setting->employee_id) ? ($payroll_setting->employee_id == $employee->id ? 'selected' : '') : '' }}>
                                                {{ $employee->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            @else
                                <div class="col-lg-12 mb-3" id="department_wise_payroll">
                                    <label>Select Department</label>
                                    <select name="department_id" id=""
                                        class="form-control show-tick ms search-select">
                                        <option value="" disabled selected>Select a Department</option>
                                        @foreach ($departments as $department)
                                            <option value=" {{ $department->id }}"
                                                {{ isset($payroll_setting->department_id) ? ($payroll_setting->department_id == $department->id ? 'selected' : '') : '' }}>
                                                {{ $department->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            <div class="col-lg-6 mb-3">
                                <div class="form-group {{ $errors->has('late_in_cut') ? 'has-error' : '' }}">
                                    <label for="late_in_cut"
                                        class="control-label">{{ 'Late-- Cut -- % of Basic Salary' }}</label>
                                    <input class="form-control" name="late_in_cut" type="text" id="late_in_cut"
                                        value="{{ isset($payroll_setting->late_in_cut) ? $payroll_setting->late_in_cut : '' }}">
                                    {!! $errors->first('late_in_cut', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="form-group {{ $errors->has('early_out_cut') ? 'has-error' : '' }}">
                                    <label for="early_out_cut"
                                        class="control-label">{{ 'Early-Out Cut -- % of Basic Salary' }}</label>
                                    <input class="form-control" name="early_out_cut" type="text" id="early_out_cut"
                                        value="{{ isset($payroll_setting->early_out_cut) ? $payroll_setting->early_out_cut : '' }}">
                                    {!! $errors->first('early_out_cut', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="form-group {{ $errors->has('unpaid_leave_cut') ? 'has-error' : '' }}">
                                    <label for="unpaid_leave_cut"
                                        class="control-label">{{ 'Unpaid Leave Cut -- % of Basic Salary' }}</label>
                                    <input class="form-control" name="unpaid_leave_cut" type="text" id="unpaid_leave_cut"
                                        value="{{ isset($payroll_setting->unpaid_leave_cut) ? $payroll_setting->unpaid_leave_cut : '' }}">
                                    {!! $errors->first('unpaid_leave_cut', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="form-group {{ $errors->has('absent_cut') ? 'has-error' : '' }}">
                                    <label for="absent_cut"
                                        class="control-label">{{ 'Absent Cut -- % of Basic Salary' }}</label>
                                    <input class="form-control" name="absent_cut" type="text" id="absent_cut"
                                        value="{{ isset($payroll_setting->absent_cut) ? $payroll_setting->absent_cut : '' }}">
                                    {!! $errors->first('absent_cut', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="form-group {{ $errors->has('bonus') ? 'has-error' : '' }}">
                                    <label for="bonus"
                                        class="control-label">{{ 'Bonus Get -- % of Basic Salary' }}</label>
                                    <input class="form-control" name="bonus" type="text" id="bonus"
                                        value="{{ isset($payroll_setting->bonus) ? $payroll_setting->bonus : '' }}">
                                    {!! $errors->first('bonus', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="bonus_month"
                                class="control-label">{{ 'Select Bonus Month' }}</label>
                                <select class="form-control show-tick ms search-select" name="bonus_month"
                                    data-placeholder="Select Month">
                                    <option value="" disabled></option>
                                    <option value="1" {{ $payroll_setting->bonus_month == 1 ? 'selected' : '' }}>
                                        January</option>
                                    <option value="2" {{ $payroll_setting->bonus_month == 2 ? 'selected' : '' }}>
                                        February</option>
                                    <option value="3" {{ $payroll_setting->bonus_month == 3 ? 'selected' : '' }}>March
                                    </option>
                                    <option value="4" {{ $payroll_setting->bonus_month == 4 ? 'selected' : '' }}>
                                        April</option>
                                    <option value="5" {{ $payroll_setting->bonus_month == 5 ? 'selected' : '' }}>May
                                    </option>
                                    <option value="6" {{ $payroll_setting->bonus_month == 6 ? 'selected' : '' }}>June
                                    </option>
                                    <option value="7" {{ $payroll_setting->bonus_month == 7 ? 'selected' : '' }}>July
                                    </option>
                                    <option value="8" {{ $payroll_setting->bonus_month == 8 ? 'selected' : '' }}>
                                        August</option>
                                    <option value="9" {{ $payroll_setting->bonus_month == 9 ? 'selected' : '' }}>
                                        September</option>
                                    <option value="10" {{ $payroll_setting->bonus_month == 10 ? 'selected' : '' }}>
                                        October</option>
                                    <option value="11" {{ $payroll_setting->bonus_month == 11 ? 'selected' : '' }}>
                                        November</option>
                                    <option value="12" {{ $payroll_setting->bonus_month == 12 ? 'selected' : '' }}>
                                        December</option>
                                </select>

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
