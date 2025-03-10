@extends('frontend.master')
@section('title')
    Check Out
@endsection

@section('body_section')
<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">checkout</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="{{ route('home') }}"><i class="lni lni-home"></i> Home</a></li>
                    <li><a href="{{ route('product-shop') }}">Shop</a></li>
                    <li>checkout</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<section class="checkout-wrapper section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="checkout-steps-form-style-1">
                    {{-- <ul class="nav nav-pills">
                        <li><a href="" class="nav-link active" data-bs-target="#cash" data-bs-toggle="pill">Cash On Delivary</a></li>
                        <li><a href="" class="nav-link" data-bs-target="#online" data-bs-toggle="pill">Online</a></li>
                    </ul> --}}

                    {{-- <div class="tab-content">

                        <div class="tab-pane fade show active id="cash">
                           <form action="{{ route('new-cash-order') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="single-form form-default">
                                            <label>Name</label>
                                            <div class="form-input form">
                                                @if(isset($customer->id))
                                                    <input type="text" name="name" value="{{ $customer->name }}" readonly placeholder="Email Address">
                                                @else
                                                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Email Address">
                                                    <span class="text-denger" style="color: red">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="single-form form-default">
                                            <label>Email Address</label>
                                            <div class="form-input form">
                                                @if(isset($customer->id))
                                                    <input type="email" name="email" value="{{ $customer->email }}" readonly placeholder="Email Address">
                                                @else
                                                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Email Address">
                                                    <span class="text-denger" style="color: red">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="single-form form-default">
                                                <label>Phone Number</label>
                                            <div class="form-input form">
                                                @if(isset($customer->id))
                                                    <input type="number" name="phone"  value="{{ $customer->mobile }}" readonly placeholder="Phone Number">
                                                @else
                                                    <input type="number" name="phone" value="{{ old('phone') }}" placeholder="Phone Number">
                                                    <span class="text-denger" style="color: red">{{ $errors->has('phone') ? $errors->first('phone') : '' }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="single-form form-default">
                                            <label>Delavery Address</label>
                                            <div class="form-input form">
                                                <textarea type="text" name="delevary_address" value="Delavery Address" id="" cols="" rows="6"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="single-form form-default">
                                            <label>Payment Type</label>
                                            <div class="payment_type">
                                                <label for=""><input type="radio" name="payment_type" id="payment_type" value="1" > Cash On Delevary</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="single-checkbox checkbox-syyle-3">
                                            <input type="checkbox" id="checkbox-3" checked>
                                            <label for="checkbox-3"><span></span></label>
                                            <p>I accept all trems & condition</p>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="single-form button">
                                            <button type="submit" class="btn">Confirm Order</button>
                                        </div>
                                    </div>
                                </div>
                           </form>
                        </div>

                        <div class="tab-pane fade show id="online">
                            <h2 class="text-denger">Online</h2>
                        </div>
                        
                    </div> --}}

                    <ul class="nav nav-pills">
                        <li><a class="nav-link active" data-bs-target="#cash" data-bs-toggle="pill" style="cursor: pointer">Cash On Delivary</a></li>
                        <li><a class="nav-link" data-bs-target="#online" data-bs-toggle="pill" style="cursor: pointer">Online Payment</a></li>
                    </ul>
                    <hr>

                    <div class="tab-content">

                        <div class="tab-pane active" id="cash" role="tabpanel">
                            <form action="{{ route('new-cash-order') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="single-form form-default">
                                            <label>Name</label>
                                            <div class="form-input form">
                                                @if(isset($customer->id))
                                                    <input type="text" name="name" value="{{ $customer->name }}" readonly placeholder="Email Address">
                                                @else
                                                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Email Address">
                                                    <span class="text-denger" style="color: red">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="single-form form-default">
                                            <label>Email Address</label>
                                            <div class="form-input form">
                                                @if(isset($customer->id))
                                                    <input type="email" name="email" value="{{ $customer->email }}" readonly placeholder="Email Address">
                                                @else
                                                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Email Address">
                                                    <span class="text-denger" style="color: red">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="single-form form-default">
                                                <label>Phone Number</label>
                                            <div class="form-input form">
                                                @if(isset($customer->id))
                                                    <input type="number" name="phone"  value="{{ $customer->mobile }}" readonly placeholder="Phone Number">
                                                @else
                                                    <input type="number" name="phone" value="{{ old('phone') }}" placeholder="Phone Number">
                                                    <span class="text-denger" style="color: red">{{ $errors->has('phone') ? $errors->first('phone') : '' }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="single-form form-default">
                                            <label>Delavery Address</label>
                                            <div class="form-input form">
                                                <textarea  style="height: 100px;" type="text" name="delevary_address" class="form-control" placeholder="Delavery Address" id="" rows="6"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="single-form form-default">
                                            <label>Payment Type</label>
                                            <div class="payment_type">
                                                <label for=""><input type="radio" name="payment_type" id="payment_type" value="1" checked> Cash On Delevary</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="single-checkbox checkbox-syyle-3">
                                            <input type="checkbox" id="checkbox-3" checked>
                                            <label for="checkbox-3"><span></span></label>
                                            <p>I accept all trems & condition</p>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="single-form button">
                                            <button type="submit" class="btn">Confirm Order</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane" id="online" role="tabpanel">
                            
                            <form action="{{ url('/pay') }}" method="POST" class="needs-validation">
                                            
                                <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="name">Full name</label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Customer Name" required>
                                        <div class="invalid-feedback">
                                            Valid customer name is required.
                                        </div>
                                    </div>
                                </div>
                
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Customer email" required>
                                        <div class="invalid-feedback">
                                            Please enter a valid email address for shipping updates.
                                        </div>
                                    </div>
    
                                    <div class="col-md-6 mb-3">
                                        <label for="mobile">Mobile</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">+88</span>
                                            </div>
                                            <input type="number" name="phone" class="form-control" id="mobile" placeholder="Mobile" required>
                                            <div class="invalid-feedback" style="width: 100%;">
                                                Your Mobile number is required.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                
                                <div class="mb-3">
                                    <label for="address">Address</label>
                                    <textarea type="text" class="form-control" name="delevary_address" rows="3" id="address" placeholder="Delivary Address" required></textarea>
                                    <div class="invalid-feedback">
                                        Please enter your shipping address.
                                    </div>
                                </div>
                
                                <div class="row">
                                    <div class="col-md-5 mb-3">
                                        <label for="country">Country</label>
                                        <select class="custom-select d-block w-100 form-control" id="country" required>
                                            <option value="">Choose...</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a valid country.
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="state">State</label>
                                        <select class="custom-select d-block w-100 form-control" id="state" required>
                                            <option value="">Choose...</option>
                                            <option value="Dhaka">Dhaka</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please provide a valid state.
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="zip">Zip</label>
                                        <input type="text" class="form-control" id="zip" placeholder="" required>
                                        <div class="invalid-feedback">
                                            Zip code required.
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="single-form form-default">
                                        <label>Payment Type</label>
                                        <div class="payment_type">
                                            <label for=""><input type="radio" name="payment_type" id="payment_type" value="2" checked>  Online</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="single-checkbox checkbox-syyle-3">
                                        <input type="checkbox" id="checkbox-3" checked>
                                        <label for="checkbox-3"><span></span></label>
                                        <p>I accept all trems & condition</p>
                                    </div>
                                </div><br>

                                <button class="btn btn-primary btn-sm btn-block" type="submit">Confirm Order</button>
                            </form> 

                        </div>
                      </div>

                </div>
            </div>

            <div class="col-lg-4">
                <div class="checkout-sidebar">

                    <div class="checkout-sidebar-price-table mt-30">
                        <h5 class="title">Shopping Cart Summary</h5>
                        <div class="sub-total-price">
                            @php($total = 0)
                            @foreach (ShoppingCart::all() as $item)
                                <div class="total-price">
                                    <p class="value">
                                        {{ $item->name }} :
                                        {{ sprintf('%d', $item->price) }} X {{ $item->qty }}
                                    </p>
                                    <p class="price">{{ sprintf('%d', $item->price * $item->qty) }}</p>
                                </div>
                                @php($total = $total + sprintf('%d', $item->price * $item->qty))
                            @endforeach
                        </div>

                        <div class="total-payable">
                            <div class="payable-price">
                                <p class="value">Subotal Price :</p>
                                <p class="price">{{ $total }}</p>
                            </div>

                            <div class="payable-price">
                                <p class="value">Tax (15%) :</p>
                                <p class="price">{{ $tax = ($total * 15)/100 }}</p>
                            </div>

                            <div class="payable-price">
                                <p class="value">Shipping Amount :</p>
                                <p class="price">{{ $shipping = 100 }}</p>
                            </div>
                            <hr>
                            <div class="payable-price">
                                <p class="value">Toatl Payable :</p>
                                <p class="price">{{$orderTotal = $total + $tax + $shipping }}</p>
                            </div>
                            <?php
                                Session::put('order_total', $orderTotal);
                                Session::put('tax_total', $tax);
                                Session::put('shipping_total', $shipping);
                            ?>
                        </div>
                        <div class="price-table-btn button">
                            <a href="javascript:void(0)" class="btn btn-alt">Checkout</a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
    
    
@endsection