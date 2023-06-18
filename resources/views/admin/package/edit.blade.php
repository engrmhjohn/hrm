@extends('backend.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Package</div>
                <div class="card-body">
                    <a href="{{ route('admin.manage.package') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                class="zmdi zmdi-arrow-left"></i></i> Back</button></a>
                    <br />
                    <br />
                    <form action="{{ route('admin.update.package') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="package_id" value="{{ $package->id }}">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="name" class="control-label">{{ 'Name' }}</label>
                                    <input class="form-control" name="name" type="text" id="name"
                                        value="{{ isset($package->name) ? $package->name : '' }}">
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                                    <label for="price" class="control-label">{{ 'Price' }}</label>
                                    <input class="form-control" name="price" type="text" id="price"
                                        value="{{ isset($package->price) ? $package->price : '' }}">
                                    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('user') ? 'has-error' : '' }}">
                                    <label for="user" class="control-label">{{ 'User' }}</label>
                                    <input class="form-control" name="user" type="text" id="user"
                                        value="{{ isset($package->user) ? $package->user : '' }}">
                                    {!! $errors->first('user', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('validity') ? 'has-error' : '' }}">
                                    <label for="validity" class="control-label">{{ 'Validity' }}</label>
                                    <input class="form-control" name="validity" type="text" id="validity"
                                        value="{{ isset($package->validity) ? $package->validity : '' }}">
                                    {!! $errors->first('validity', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="col-md-3 mt-3">
                                Status
                            </div>
                            <div class="col-md-9 mt-3">
                                <div class="form-group">
                                    <div class="radio inlineblock m-r-20">
                                        <input type="radio" name="status" id="publish" class="with-gap"
                                            {{  $package->status == 1 ? 'checked' : '' }} value="1">
                                        <label for="publish">Publish</label>
                                    </div>
                                    <div class="radio inlineblock">
                                        <input type="radio" name="status"
                                            {{ $package->status == 0 ? 'checked' : '' }} id="unublish" class="with-gap" value="0">
                                        <label for="unublish">Unpublish</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="header">
                                        <h2>package Current Image</h2>
                                        <img src="{{ asset($package->image) }}" alt=""
                                            style="height: 200px; width: 200px;" class="mb-3">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="body">
                                        <input type="file" name="image" class="dropify"
                                            value="{{ isset($package->image) ? $package->image : '' }}">
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
