@extends('frontend.master')
@section('title')
    Customer Login - Register
@endsection

@section('body_section')
<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Login</h1>
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
        <h5 class="text-center" style="color: green">{{ session('messages') }}</h5><br><br>

        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('customer.login') }}" class="card login-form" method="POST">
                    <p class="text-center text-danger">{{ Session('message') }}</p>
                    @csrf
                    <div class="card-body">
                        <div class="title">
                            <h3>Login Now</h3>
                        </div>

                        <div class="form-group input-group">
                            <label for="reg-fn">Email</label>
                            <input class="form-control" name="email" type="email" id="reg-email" required>
                        </div>

                        <div class="form-group input-group">
                            <label for="reg-fn">Password</label>
                            <input class="form-control" name="password" type="password" id="reg-pass" required>
                        </div>

                        <div class="d-flex flex-wrap justify-content-between bottom-content">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input width-auto" id="exampleCheck1">
                                <label class="form-check-label">Remember me</label>
                            </div>
                        </div>
                        <div class="button">
                            <button class="btn" type="submit">Login</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-6">
                <div class="register-form">
                    <div class="title">
                        <h3>Register</h3>
                    </div>
                    <form action="{{ route('customer.register') }}" class="row" method="post">
                        @csrf

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="reg-fn">Full Name</label>
                                <input class="form-control" name="name" type="text" id="reg-fn" required>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="reg-phone">Phone Number</label>
                                <input class="form-control" name="mobile" type="number" id="reg-phone" required>
                                <span class="text-danger">{{ $errors->has('mobile') ? $errors->first('mobile') : '' }}</span>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="reg-email">E-mail Address</label>
                                <input class="form-control" name="email" type="email" id="reg-email" required>
                                <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="reg-pass">Password</label>
                                <input class="form-control" name="password" type="password" id="reg-pass">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="reg-pass-confirm">Confirm Password</label>
                                <input class="form-control" type="password" id="reg-pass-confirm">
                            </div>
                        </div>

                        <div class="button">
                            <button class="btn" type="submit">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection