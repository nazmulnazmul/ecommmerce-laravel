@extends('frontend.master')
@section('title')
    Category
@endsection

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #rangeValue {
            position: relative;
            text-align: center;
            width: 60px;
            font-size: 1.25em;
            color: #fff;
            background: #27a0ff;
            margin-left: 15px;
            border-radius: 25px;
            font-weight: 500;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.1), -5px -5px 10px #fff, inset 5px 5px 10px rgba(0, 0, 0, 0.1), inset -5px -5px 5px rgba(255, 255, 255, 0.05);
        }

        .middle {
            position: relative;
            width: 100%;
            max-width: 500px;
            margin-top: 10px;
            display: inline-block;
        }

        .slider {
            position: relative;
            z-index: 1;
            height: 10px;
            margin: 0 15px;
        }

        .slider>.track {
            position: absolute;
            z-index: 1;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            border-radius: 5px;
            background-color: #b5d7f1;
        }

        .slider>.range {
            position: absolute;
            z-index: 2;
            left: 25%;
            right: 25%;
            top: 0;
            bottom: 0;
            border-radius: 5px;
            background-color: #27a0ff;
        }

        .slider>.thumb {
            position: absolute;
            z-index: 3;
            width: 30px;
            height: 30px;
            background-color: #27a0ff;
            border-radius: 50%;
        }

        .slider>.thumb.left {
            left: 25%;
            transform: translate(-15px, -10px);
        }

        .slider>.thumb.right {
            right: 25%;
            transform: translate(15px, -10px);
        }

        .range_slider {
            position: absolute;
            pointer-events: none;
            -webkit-appearance: none;
            z-index: 2;
            height: 10px;
            width: 100%;
            opacity: 0;
        }

        .range_slider::-webkit-slider-thumb {
            pointer-events: all;
            width: 30px;
            height: 30px;
            border-radius: 0;
            border: 0 none;
            background-color: red;
            cursor: pointer;
            -webkit-appearance: none;
        }

        #multi_range {
            margin: 0 auto;
            background-color: #27a0ff;
            border-radius: 20px;
            margin-top: 20px;
            text-align: center;
            width: 90px;
            font-weight: 500;
            font-size: 1.25em;
            color: #fff;
        }
    </style>
@endpush


@section('body_section')

    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Category</h1>
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

    
    <section class="product-grids section" id="category">
        <div class="container">
            <div class="row">

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
                                    

                                    @if ($products && $products->isNotEmpty())
                                        @foreach ($products as $product)
                                            <div class="col-lg-4 col-md-6 col-12">
                                                <div class="single-product">
                                                    <div class="product-image">
                                                        <img src="{{ asset($product->image) }}" alt="#">
                                                        <div class="button">
                                                            <a href="{{ route('product-details', $product->id) }}"
                                                                class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
                                                        </div>
                                                    </div>
                                                    <div class="product-info">
                                                        <span class="category">{{ $product->cat->cat_name }}</span>
                                                        <h4 class="title">
                                                            <a
                                                                href="{{ route('product-details', $product->id) }}">{{ $product->name }}</a>
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
                                                            <span>&#2547;
                                                                {{ sprintf('%d', $product->selling_price) }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <h4 class="text-center mt-3" style="color: red">Sorry,, This Category Product Not
                                            Found.</h4>
                                    @endif

                                </div>
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
                    success: function(response) {

                        $('.product_row').empty();
                            response.products.forEach(function(product) {
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
                let brandId =  $('#brandFilter'+key).val()
                //  console.log(brandId);


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

       

    </script>
@endpush
