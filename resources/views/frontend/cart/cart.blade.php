@extends('frontend.master')
@section('title')
    Cart
@endsection

@section('body_section')
<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Cart</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="{{ route('home') }}"><i class="lni lni-home"></i> Home</a></li>
                    <li><a href="{{ route('product-shop') }}">Shop</a></li>
                    <li>Cart</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="shopping-cart section">
<div class="container">
<div class="cart-list-head">

<div class="cart-list-title">
<div class="row">
<div class="col-lg-1 col-md-1 col-12">
</div>
    <div class="col-lg-4 col-md-3 col-12">
        <p>Product Name</p>
    </div>
    <div class="col-lg-2 col-md-2 col-12">
        <p>Unit Price</p>
    </div>
    <div class="col-lg-2 col-md-2 col-12">
        <p>Quantity</p>
    </div>
    <div class="col-lg-2 col-md-2 col-12">
        <p>Total</p>
    </div>
    <div class="col-lg-1 col-md-2 col-12">
        <p>Remove</p>
    </div>
</div>
</div>

    @php($sum = 0)
    @foreach ($cart_products as $cart_product)
        <div class="cart-single-list">
            <div class="row align-items-center">
                <div class="col-lg-1 col-md-1 col-12">
                    <a href=""><img src="{{ $cart_product->image }}" alt="#"></a>
                </div>
                <div class="col-lg-4 col-md-3 col-12">
                    <h5 class="product-name"><a href="">
                        {{ $cart_product->name }}</a></h5>
                    <p class="product-des">
                        <span><em>Category:</em> {{ $cart_product->catgory }}</span>
                        <span><em>Brand:</em> {{ $cart_product->subcatgory }}</span>
                    </p>
                </div>
                <div class="col-lg-2 col-md-2 col-12">
                    <div class="">
                        &#2547; {{ sprintf('%d', $cart_product->price) }}
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-12">
                    {{-- <p>{{ $cart_product->qty }}</p> --}}
                    <form action="{{ route('cart-update', ['id' => $cart_product->__raw_id]) }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input class="form-control" value="{{ $cart_product->qty }}" name="qty" min="1" required>
                            <input type="submit" class="btn btn-success" value="Update">
                        </div>
                    </form>
                </div>
                <div class="col-lg-2 col-md-2 col-12">
                    <p>{{ $cart_product->price * $cart_product->qty }}</p>
                </div>
                <div class="col-lg-1 col-md-2 col-12">
                    <a class="remove-item" onclick="return confirm('Are you Sure This Item Deleted.')" href="{{ route('remove-cart', ['id' => $cart_product->__raw_id]) }}"><i class="lni lni-close"></i></a>
                </div>
            </div>   
        </div>
        @php($sum = $sum + ($cart_product->price * $cart_product->qty))
    @endforeach
</div>

<div class="row">
    <div class="col-12">
        <div class="total-amount">
            <div class="row">
                <div class="col-lg-8 col-md-6 col-12">
                    <div class="left">
                        <div class="coupon">
                            <form action="#" target="_blank">
                                <input name="Coupon" placeholder="Enter Your Coupon">
                                <div class="button">
                                    <button class="btn">Apply Coupon</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <div class="right">
                        <ul>
                            <li>Cart Subtotal<span>&#2547; {{ $sum }}</span></li>
                            <li>Tax (15%)<span>&#2547; {{ $tx = round((($sum * 15)/100)) }}</span></li>
                            <li>Shipping<span>&#2547; {{ $shipping = 100 }}</span></li>
                            <li class="last">Total Payable<span>&#2547; {{ $totalPayable = $sum + $tx + $shipping}}</span></li>
                        </ul>
                        <div class="button">
                            <a href="{{ route('check-out') }}" class="btn">Checkout</a>
                            <a href="{{ route('product-shop') }}" class="btn btn-alt">Continue shopping</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
</div>
@endsection