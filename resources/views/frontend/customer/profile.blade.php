@extends('frontend.master')
@section('title')
    Customer Profile
@endsection

@section('body_section')
<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Customer Dashbord</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="{{ route('home') }}"><i class="lni lni-home"></i> Home</a></li>
                    <li><a href="{{ route('product-shop') }}">Shop</a></li>
                    <li>login</li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="account-login section">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-body">
                    <div class="list-group">
                        <a href="{{ route('customer.dashbord') }}" class="list-group-item list-group-item-action">Dashaboard</a>
                        <a href="{{ route('customer.profile') }}" class="list-group-item list-group-action">Profile</a>
                        <a href="" class="list-group-item list-group-action">Acount</a>
                        <a href="{{ route('customer.order') }}" class="list-group-item list-group-action">Order</a>
                        <a href="" class="list-group-item list-group-action">Change Password</a>
                        <a href="{{ route('customer.logout') }}" class="list-group-item list-group-action">Logout</a>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                {{-- <div class="card-header"></div> --}}
                <div class="card card-body">
                    <h4>My Profile</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection