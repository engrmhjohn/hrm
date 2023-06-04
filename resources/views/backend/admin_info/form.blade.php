@extends('backend.master')
@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Company's Username" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-text">
                <span class="" id="basic-addon2">@example.com</span>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Company's Email" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-text">
                <span class="" id="basic-addon2">@mail.com</span>
            </div>
        </div>
    </div>
</div>
@endsection
