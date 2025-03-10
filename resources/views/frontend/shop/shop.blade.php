@extends('frontend.master')
@section('title')
    Shop
@endsection

@section('body_section')

<div class="breadcrumbs">
    <div class="container">

        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                  <h1 class="page-title">Shop</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="{{ route('home') }}"><i class="lni lni-home"></i> Home</a></li>
                    <li><a href="{{ route('product-shop') }}">Shop</a></li>
                    <li><a href="{{ route('contact') }}"> Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>


<section class="product-grids section" id="shop">
    <div class="container">
        <div class="row">
            
            {{-- <div class="col-lg-3 col-12">
                <div class="product-sidebar">
                    <div class="single-widget search">
                        <h3>Search Product</h3>
                        <form action="{{ route('search-product') }}" method="GET">
                            <input type="text" name="search" value="{{ Request::get('search') }}" placeholder="Search Here...">
                            <button type="submit"><i class="lni lni-search-alt"></i></button>
                        </form>
                    </div>
                    
                    <div class="single-widget">
                        <h3>All Categories</h3>
                        @foreach ($categories as $categorie)
                            
                        <ul class="list">
                            <li>
                                <a href="product-grids.html">{{ $categorie->cat_name }} </a><span></span>
                            </li>
                        </ul>
                        @endforeach
                    </div>
                
                    
                    
                    <div class="single-widget condition">
                        <h3>Filter by Brand</h3>
                            @foreach ($brands as $key => $brand)
                                <div class="form-check">
                                    <input class="form-check-input" name="brand_filter" type="checkbox" value="{{ $brand->id }}" id="brandFilter{{ $key }}" onchange="brand_filter( this,{{ $key }})">
                                    <label class="form-check-label" for="flexCheckDefault11">
                                        {{ $brand->brand_name }} 
                                    </label>
                                </div>
                            @endforeach
                    </div>
                </div>
            </div> --}}
            @include('frontend.include.sideBar')

            <div class="col-lg-9 col-12">
                <div class="product-grids-head">
                    <div class="product-grid-topbar">
                        <div class="row align-items-center">

                            <div class="col-lg-7 col-md-8 col-12">
                                <div class="product-sorting">
                                    <label for="sorting">Sort by:</label>
                                    <select name="sort_by" id="sort_by" class="form-control" id="sorting">
                                        <option>Sort by</option>
                                        <option name="lowest_price" value="lowest_price">Low - Price</option>
                                        <option name="height_price" value="height_price">High - Price</option>
                                    </select>
                                    <h3 class="total-show-product">Showing: <span>1 - 12 items</span></h3>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-4 col-12">
                                <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    {{-- <button class="nav-link active" id="nav-grid-tab" data-bs-toggle="tab" data-bs-target="#nav-grid" type="button" role="tab" aria-controls="nav-grid" aria-selected="true"><i class="lni lni-grid-alt"></i></button> --}}
                                    {{-- <button class="nav-link" id="nav-list-tab" data-bs-toggle="tab" data-bs-target="#nav-list" type="button" role="tab" aria-controls="nav-list" aria-selected="false"><i class="lni lni-list"></i></button> --}}
                                </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                    
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-grid" role="tabpanel" aria-labelledby="nav-grid-tab">
                            <div class="row product_row">

                                @foreach ($allProducts as $allProduct)
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-product">
                                            <div class="product-image">
                                                <img src="{{ asset($allProduct->image) }}" alt="#">
                                                <div class="button">
                                                    <a href="{{ route('product-details', $allProduct->id) }}" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <span class="category">{{ $allProduct->cat->cat_name }}</span>
                                                <h4 class="title">
                                                <a href="{{ route('product-details', $allProduct->id) }}">{{ $allProduct->name }}</a>
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
                                                    <span>&#2547; {{ sprintf('%d', $allProduct->selling_price) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            {{-- {{ $allProducts->links() }} --}}


                        {{-- <div class="row">
                            <div class="col-12">
                                <div class="pagination left">
                                    <ul class="pagination-list">
                                        <li><a href="javascript:void(0)">1</a></li>
                                        <li class="active"><a href="javascript:void(0)">2</a></li>
                                        <li><a href="javascript:void(0)">3</a></li>
                                        <li><a href="javascript:void(0)">4</a></li>
                                        <li><a href="javascript:void(0)"><i class="lni lni-chevron-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

@include('frontend.search.search')
    
@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script src="jquery-3.6.0.min.js"></script> --}}
    <script src="{{ asset('frontend') }}/assets/js/jquery-3.6.0.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    $(document).ready(function(e) {

        // price ranger 
        $('.form-range').on("change", function() {
            // console.log("#input");
            
            let input = $('#input').val();
            // console.log(input);

            $.ajax({
                url: "{{ route('search.price') }}",
                method: 'GET',
                data: {
                    input: input
                },
                success: function(res) {
                    console.log(res);
                    
                    $('.product_row').empty();
                        res.products.forEach(function(product) {
                        $('.product_row').append(`
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="single-product">
                                    <div class="product-image">
                                        <img src="${product.image}" alt="Product-Image">
                                        <div class="button">
                                            <a href="/product-details/${product.id}"
                                                class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <span class="category">${product.cat.cat_name}</span>
                                        <h4 class="title">
                                            <a href="/product-details/${product.id}">${product.name}</a>
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
                                            <span>&#2547; ${Math.round(product.selling_price)}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `);
                    });
                }
            });
        });

        // sort_by
        $('#sort_by').on("change", function(e){
            // console.log("#sort_by");
            
            let sort_by = $('#sort_by').val();
            // alert(sort_by);

            $.ajax({
                url: "{{ route('sort.price') }}",
                method: 'GET',
                data: {
                    sort_by:sort_by
                },
                success:function(res){
                    // console.log("short",res);


                    $('.product_row').empty();
                    res.products.forEach(function(product) {
                        $('.product_row').append(`
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="single-product">
                                    <div class="product-image">
                                        <img src="${product.image}" alt="Product-Image">
                                        <div class="button">
                                            <a href="/product-details/${product.id}"
                                                class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <span class="category">${product.cat.cat_name}</span>
                                        <h4 class="title">
                                            <a href="/product-details/${product.id}">${product.name}</a>
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
                                            <span>&#2547; ${Math.round(product.selling_price)}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `);
                    });
                }
            });
        });

    });

     //checkbox
     function brand_filter( checkbox,key ){

           let isChecked = checkbox.checked;
           let brandId =  $('#brandFilter'+key).val();

            $.ajax({
                url: "{{ route('brand.filter') }}",
                type: "GET",
                data: {
                    id:brandId,
                    checkbox:isChecked
                },
                dataType: "JSON",
                success: function (res) {
                    // console.log(res);
                    $('.product_row').empty();
                        res.products.forEach(function(product) {
                            $('.product_row').append(`
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-product">
                                        <div class="product-image">
                                            <img src="${product.image}" alt="Product-Image">
                                            <div class="button">
                                                <a href="/product-details/${product.id}"
                                                    class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <span class="category">${product.cat.cat_name}</span>
                                            <h4 class="title">
                                                <a href="/product-details/${product.id}">${product.name}</a>
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
                                                <span>&#2547; ${Math.round(product.selling_price)}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `);
                        });
                }
            });
    }


@endpush