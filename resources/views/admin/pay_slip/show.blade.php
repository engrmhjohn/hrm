@extends('backend.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Pay Slip</div>
                <div class="card-body">
                    <a href="{{ route('admin.manage.pay_slip') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="zmdi zmdi-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <br />
                    <br />
                    <form action="{{route('admin.save.pay_slip')}}" method="post">
                        @csrf
                        <input type="hidden" name="admin_id" value="{{Auth::user()->id}}">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                            <label for="name" class="control-label">{{ 'Pay Slip' }}</label>
                            <input class="form-control" name="name" type="text" id="name">
                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-3 mt-3">
                            Status
                        </div>
                        <div class="col-md-9 mt-3">
                            <div class="form-group">
                                <div class="radio inlineblock m-r-20">
                                    <input type="radio" name="status" id="male" class="with-gap" checked value="1">
                                    <label for="male">Publish</label>
                                </div>
                                <div class="radio inlineblock">
                                    <input type="radio" name="status" id="Female" class="with-gap" value="0">
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
