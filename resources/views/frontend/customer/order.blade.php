@extends('frontend.master')
@section('title')
    Customer Order
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
                    <h5 class="text-center">My All Orders</h5><br><br>

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>SL NO</th>
                                <th>Order No</th>
                                <th>Order Date</th>
                                <th>Order Total</th>
                                <th>Delevary Address</th>
                                <th>Order Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($orders as $key => $order)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->order_date }}</td>
                                    <td>&#2547; {{ $order->order_total }}</td>
                                    <td>{{ $order->delevary_address }}</td>
                                    <td>{{ $order->order_status }}</td>
                                    <td>
                                        <a href="" class="btn btn-success">Details</a>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection