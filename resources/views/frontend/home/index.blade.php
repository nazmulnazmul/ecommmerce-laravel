@extends('frontend.master')
@section('title')
    Home    
@endsection

@section('body_section')

    @include('frontend.search.search')
    

    <section class="hero-area" id="index_home">
        <div class="container">
            <div class="row">

                
                {{-- @dump($categories) --}}
                <div class="col-lg-8 col-12 custom-padding-right">
                    <div class="slider-head">
                        <div class="hero-slider">
                            @foreach ($sliders as $slider)
                                
                                <div class="single-slider" style="background-image: url({{ asset($slider->photo) }});">
                                {{-- <div class="single-slider" style="background-image: url({{ asset('forntend') }}/assets/images/hero/slider-bg1.jpg);"> --}}
                                    <div class="content">
                                        <h2>{!! $slider->title !!}</h2>
                                        <p>{!! $slider->sort_desc !!}</p>
                                        {{-- <h3><span>Now Only</span> $320.99</h3> --}}
                                        <div class="button">
                                            <a href="{{ $slider->url }}" class="btn">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-6 col-12 md-custom-padding">

                            <div class="hero-small-banner" style="background-image: url('{{ asset('forntend') }}/assets/images/hero/slider-bnr.jpg');">
                                <div class="content">
                                    <h2>
                                        <span>New line required</span>
                                        iPhone 12 Pro Max
                                    </h2>
                                    <h3>$259.99</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-6 col-12">
                            <div class="hero-small-banner style2">
                                <div class="content">
                                    <h2>Weekly Sale!</h2>
                                    <p>Saving up to 50% off all online store items this week.</p>
                                    <div class="button">
                                        <a class="btn" href="product-grids.html">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="featured-categories section" id="index_home1">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Featured Products</h2>
                    </div>
                </div>
            </div>

                <div class="row">

                    @foreach ($featuredProducts as $featuredProduct)
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="single-product">
                                <div class="product-image">
                                    <img src="{{ asset($featuredProduct->image) }}" alt="#">
                                    <div class="button">
                                        <a href="{{ route('product-details', $featuredProduct->id) }}" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <span class="category">{{ $featuredProduct->cat->cat_name }}</span>
                                    <h4 class="title">
                                    <a href="{{ route('product-details', $featuredProduct->id) }}">{{ $featuredProduct->name }}</a>
                                    </h4>
                                        <ul class="review">
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star"></i></li>
                                        <li><span>4.0 Review(s)</span></li>
                                    </ul>
                                    <div class="price">
                                        <span>&#2547; {{ sprintf('%d', $featuredProduct->selling_price) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
        </div>
    </section>


    <section class="trending-product section" id="index_home2">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Popular Product</h2>
                    </div>
                </div>
            </div>

            <div class="row">

                @foreach ($pupolarProducts as $pupolarProduct)
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-product">
                            <div class="product-image">
                                <img src="{{ asset($pupolarProduct->image) }}" alt="#">
                                <div class="button">
                                    <a href="{{ route('product-details', $pupolarProduct->id) }}" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <span class="category"> {{ $pupolarProduct->cat->cat_name }}</span>
                                <h4 class="title">
                                <a href="{{ route('product-details', $pupolarProduct->id) }}">{{ $pupolarProduct->name }}</a>
                                </h4>
                                    <ul class="review">
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star"></i></li>
                                    <li><span>4.0 Review(s)</span></li>
                                </ul>
                                <div class="price">
                                    <span>&#2547; {{ sprintf('%d', $pupolarProduct->selling_price) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>


{{-- <section class="banner section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="single-banner" style="background-image:url('assets/images/banner/banner-1-bg.jpg')">
                    <div class="content">
                        <h2>Smart Watch 2.0</h2>
                        <p>Space Gray Aluminum Case with <br>Black/Volt Real Sport Band </p>
                        <div class="button">
                            <a href="product-grids.html" class="btn">View Details</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-12">
                <div class="single-banner custom-responsive-margin" style="background-image:url('assets/images/banner/banner-2-bg.jpg')">
                    <div class="content">
                        <h2>Smart Headphone</h2>
                        <p>Lorem ipsum dolor sit amet, <br>eiusmod tempor
                        incididunt ut labore.</p>
                        <div class="button">
                            <a href="product-grids.html" class="btn">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}


    <section class="special-offer section" id="index_home3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>New Arrival</h2>
                    </div>
                </div>
            </div>

            <div class="row">

                @foreach ($newArrivals as $newArrival)
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-product">
                            <div class="product-image">
                                <img src="{{ asset($newArrival->image) }}" alt="#">
                                <div class="button">
                                    <a href="{{ route('show-cart', $newArrival->id) }}" class="btn"><i class="lni lni-cart"></i> Add to
                                    Cart</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <span class="category">{{ $newArrival->cat->cat_name }}</span>
                                <h4 class="title">
                                <a href="{{ route('product-details', $newArrival->id) }}">{{ $newArrival->name }}</a>
                                </h4>
                                <ul class="review">
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><span>5.0 Review(s)</span></li>
                                </ul>
                                <div class="price">
                                    <span>&#2547; {{ sprintf('%d', $newArrival->selling_price) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>


    <div class="brands" id="index_home4">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-12 col-12">
                    <h2 class="title">Popular Brands</h2>
                </div>
            </div>
            <div class="brands-logo-wrapper">
                <div class="brands-logo-carousel d-flex align-items-center justify-content-between">
                    @foreach ($brands as $brand)
                        <div class="brand-logo">
                            <img src="{{ asset($brand->brand_image) }}" alt="" width="80px" height="80px">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>



@endsection