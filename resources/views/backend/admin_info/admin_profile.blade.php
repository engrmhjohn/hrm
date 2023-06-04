@extends('backend.master')
@section('content')
<div class="row">
    <div class="col-md-6 col-lg-6 col-xl-4 box-col-6">
        <div class="card custom-card">
            <div class="card-header"><img class="img-fluid" src="{{ asset('backendAsset') }}/img/profilebox/1.jpg" alt="" data-original-title="" title=""></div>
            <div class="card-profile"><img class="rounded-circle" src="{{ asset('backendAsset') }}/img/profilebox/7.jpg" alt="" data-original-title="" title=""></div>
            <ul class="card-social">
                <li><a href="#" data-original-title="" title=""><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#" data-original-title="" title=""><i class="fab fa-google-plus-g"></i></a></li>
                <li><a href="#" data-original-title="" title=""><i class="fab fa-twitter"></i></a></li>
                <li><a href="#" data-original-title="" title=""><i class="fab fa-instagram"></i></a></li>
                <li><a href="#" data-original-title="" title=""><i class="fas fa-rss"></i></a></li>
            </ul>
            <div class="text-center profile-details">
                <h4>{{Auth::user()->name}}</h4>
                <h6>Designation</h6>
                <a class="btn btn-secondary mb-2" href="{{route('admin.admin.admin_form')}}">Complete Profile</a>
            </div>
            <div class="card-footer row">
                <div class="col-12">
                    <h6>Email</h6>
                    <h3 class="">{{Auth::user()->email}}</h3>
                </div>
                <div class="col-12">
                    <h6>Created At</h6>
                    <h3><span class="">{{Auth::user()->created_at->format('d-m-y')}}</span></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-6 col-xl-8 box-col-6">
        Company Info will show here
    </div>
</div>
@endsection
