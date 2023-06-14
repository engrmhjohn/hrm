@extends('frontEnd.master')
@section('title')
    HRM || Package Buy
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Billing address</h4>
            <form method="post" action="{{ url('/pay') }}" class="needs-validation" novalidate>
                @csrf
                <input type="hidden" value="{{ $package->id }}" name="package_id" id="package_id" required />
                <input type="hidden" value="{{ Auth::user()->id }}" name="customer_id" id="customer_id" required />
                <input type="hidden" value="{{ $package->price }}" name="amount" id="total_amount" required />
                <div class="row">
                    <div class="col-md-6 order-md-1">
                        <h4 class="mb-3">Customer Information</h4>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="firstName">Name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    value="{{ Auth::user()->name }}" required>
                                <div class="invalid-feedback">
                                    Valid customer name is required.
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email">Email <span class="text-muted"></span></label>
                            <input type="email" name="email" class="form-control" id="cus_email"
                                value="{{ Auth::user()->email }}" required>
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 order-md-2 mb-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span>Buying Information</span>
                        </h4>
                        <label for="firstName">Package Details</label>
                        <ul class="list-group mb-3">
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">Package Name</h6>
                                </div>
                                <div>
                                    <h6 class="my-0">{{ $package->name }}</h6>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">Package Price</h6>
                                </div>
                                <div>
                                    <h6 class="my-0">{{ $package->price }}</h6>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total Amount</span>
                                <strong>{{ $package->price }} BDT</strong>
                            </li>
                        </ul>
                        <button class="btn btn-primary btn-lg btn-block" id="sslczPayBtn"
                            token="if you have any token validation" packagedata=""
                            order="If you already have the transaction generated for current order"
                            endpoint="{{ url('/pay-via-ajax') }}"> Pay Now
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
