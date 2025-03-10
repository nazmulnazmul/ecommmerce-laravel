{{-- @extends('frontend.master')
@section('title')
    Search Product  
@endsection

@section('search_section') --}}



<section class="featured-categories section pb-0 pt-0">
    <div class="container">
        <div class="row">
            <div id="ajaxRes">

            </div>
        </div>


        {{-- <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Search Products</h2>
                </div>
            </div>
        </div> --}}

        
        {{-- <div class="row">
            
            <h4 class="text-center" style="color: red">{{ session('message') }}</h4>
        
                @foreach ($searchProduct as $featuredProduct)
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
        </div> --}}
</section>

{{-- 
@endsection --}}