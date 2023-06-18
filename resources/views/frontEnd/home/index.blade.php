@extends('frontEnd.master')
@section('title')
    Human Resource Management
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a class="btn btn-outline-success mt-2" href="{{ url('/home') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                    @else
                        <a class="btn btn-outline-success mt-2" href="{{ route('login') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">User
                            Login</a>
                        <a class="btn btn-outline-success mt-2" href="{{ route('admin.login-view') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Admin
                            Login</a>

                        @if (Route::has('register'))
                            <a class="btn btn-outline-success mt-2" href="{{ route('register') }}"
                                class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">User
                                Register</a>
                            <a class="btn btn-outline-success mt-2" href="{{ route('admin.register-view') }}"
                                class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Admin
                                Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
        @foreach ($packages as $item)
        <div class="col-lg-3 mt-3 mb-3">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Plan Type: {{$item->name}}</h4>
                </div>
                <div class="card-body">
                    <img class="img-fluid mx-auto" src="{{asset($item->image)}}" alt="" style="max-height: 200px; width: 100%;">
                    <h5>Price: {{$item->price}} BDT</h5>
                    <h5>No of User: {{$item->user}}</h5>
                    <h5>Validity: {{$item->validity}} Months</h5>
                </div>
                <div class="card-footer text-center">
                    <a class="btn btn-warning form-control" href="{{route('package.buy.now', $item->id)}}">Buy Now</a>
                </div>
            </div>

        </div>
        @endforeach
    </div>
@endsection
