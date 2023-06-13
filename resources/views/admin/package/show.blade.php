@extends('backend.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Package</div>
                <div class="card-body">
                    <a href="{{ route('admin.manage.package') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                class="zmdi zmdi-arrow-left"></i> Back</button></a>
                    <br />
                    <br />
                    <form action="{{ route('admin.save.package') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="name" class="control-label">{{ 'Name' }}</label>
                                    <input class="form-control" name="name" type="text" id="name">
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                                    <label for="price" class="control-label">{{ 'Price' }}</label>
                                    <input class="form-control" name="price" type="text" id="price">
                                    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="card">
                                    <div class="header">
                                        <h2>Image</h2>
                                    </div>
                                    <div class="body">
                                        <input type="file" name="image" class="dropify">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                <label for="description" class="control-label">{{ 'Description' }}</label>
                                <textarea class="summernote" name="description" type="text" id="description"></textarea>
                                {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-md-3 mt-3">
                            Status
                        </div>
                        <div class="col-md-9 mt-3">
                            <div class="form-group">
                                <div class="radio inlineblock m-r-20">
                                    <input type="radio" name="status" id="male" class="with-gap" checked
                                        value="1">
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
