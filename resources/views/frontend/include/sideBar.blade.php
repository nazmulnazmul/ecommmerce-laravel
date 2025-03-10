<div class="col-lg-3 col-12">
    <div class="product-sidebar">
        {{-- <div class="single-widget search">
            <h3>Search Product</h3>
            <form action="{{ route('search-product') }}" method="GET">
                <input type="text" name="search" value="{{ Request::get('search') }}"
                    placeholder="Search Here...">
                <button type="submit"><i class="lni lni-search-alt"></i></button>
            </form>
        </div> --}}

        <div class="single-widget">
            <h3>All Categories</h3>
            <ul class="list">
                @foreach ($ncategories as $category)
                    <li>
                        <a href="{{ route('product-category', $category->cat_slug) }}">{{ $category->cat_name }}</a>
                    </li>
                @endforeach

            </ul>
        </div>

        <div class="single-widget range">
            <h3>Price Range</h3>

            <input type="range" id="input" class="form-range" name="range" step="1"
                min="100" max="100000" value="25" onchange="rangePrimary.value=value">
            {{-- <input type="range" id="input-right" class="form-range" name="range" step="1" min="100" max="10000" value="75" onchange="rangePrimary.value=value"> --}}
            <div class="range-inner">
                <label>TK. </label>
                <input type="text" id="rangePrimary" placeholder="100"/>
            </div>
        </div>



        <div class="single-widget">
            <h3>Filter by Brand</h3>

            {{-- @foreach ($brands as $brand)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="checkbox">
                    <label class="form-check-label" for="flexCheckDefault11">
                        <a href="{{ route('product-brand', $brand->brand_slug) }}">{{ $brand->brand_name }} </a>
                    </label>
                </div>
            @endforeach --}}

            @foreach ($brands as $key => $brand)
                <div class="form-check">
                    <input class="form-check-input" name="brand_filter" type="checkbox" value="{{ $brand->id }}" id="brandFilter{{ $key }}" onchange="brand_filter( this,{{ $key }})">
                    <label class="form-check-label" for="flexCheckDefault11">
                        {{-- <a href="">{{ $brand->brand_name }} </a> --}}
                        {{ $brand->brand_name }} 
                    </label>
                </div>
            @endforeach

    </div>

    </div>
</div>


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

        // Listen for the change event on the checkbox
            // checkbox.addEventListener("change", function (e) {
            // var isChecked = e.target.checked; // Get the checkbox state (true or false)
            // alert("Checkbox state:", isChecked);

            // // Example: Perform an AJAX request based on the checkbox state
            //     // $.ajax({
            //     //     url: "/product-search", // Adjust the URL as needed
            //     //     method: "GET",
            //     //     data: { checked: isChecked }, // Send the checkbox state
            //     //     dataType: "JSON",
            //     //     success: function (res) {
            //     //         console.log(res);
            //     //     },
            //     //     error: function (err) {
            //     //         console.error("AJAX error:", err);
            //     //     }
            //     // });
            // });


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

       

    </script>
@endpush
