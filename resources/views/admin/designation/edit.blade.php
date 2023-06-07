@extends('backend.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Designation</div>
                <div class="card-body">
                    <a href="{{ route('admin.manage.designation') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                class="zmdi zmdi-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <br />
                    <br />
                    <form action="{{ route('admin.update.designation') }}" method="post">
                        @csrf
                        <input type="hidden" name="designation_id" value="{{ $designation->id }}">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name" class="control-label">{{ 'Name' }}</label>
                            <input class="form-control" name="name" type="text" id="name"
                                value="{{ isset($designation->name) ? $designation->name : '' }}">
                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-md-3 mt-3">
                            Status
                        </div>
                        <div class="col-md-9 mt-3">
                            <div class="form-group">
                                <div class="radio inlineblock m-r-20">
                                    <input type="radio" name="status" id="male" class="with-gap"
                                        {{ isset($designation->status) && $designation->status == 1 ? 'checked' : '' }}
                                        checked value="option1">
                                    <label for="male">Publish</label>
                                </div>
                                <div class="radio inlineblock">
                                    <input type="radio" name="status"
                                        {{ isset($designation->status) && $designation->status == 0 ? 'checked' : '' }}
                                        id="Female" class="with-gap" value="option2">
                                    <label for="Female">Unpublish</label>
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
