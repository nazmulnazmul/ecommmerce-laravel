@push('css')
    {{-- <style> --}}
        .shop{
            background-image: linear-gradient(to right, #ff8177 0%, #ff867a 0%, #ff8c7f 21%, #f99185 52%, #cf556c 78%, #b12a5b 100%);
        }
    {{-- </style> --}}
@endpush

<div class="preloader">
    <div class="preloader-inner">
        <div class="preloader-icon">
            <span></span>
            <span></span>
        </div>
    </div>
</div>


<header class="header navbar-area">

    <div class="topbar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="top-left">
                        <ul class="menu-top-link">
                            <li>
                                <div class="select-position">
                                    <select id="select4">
                                        <option value="0" selected>$ USD</option>
                                        <option value="1">€ EURO</option>
                                        <option value="2">$ CAD</option>
                                        <option value="3">₹ INR</option>
                                        <option value="4">¥ CNY</option>
                                        <option value="5">৳ BDT</option>
                                    </select>
                                </div>
                            </li>
                            <li>

                                <div class="select-position">
                                    <select id="select5">
                                        <option value="0" selected>English</option>
                                        <option value="1">Español</option>
                                        <option value="2">Filipino</option>
                                        <option value="3">Français</option>
                                        <option value="4">العربية</option>
                                        <option value="5">हिन्दी</option>
                                        <option value="6">বাংলা</option>
                                    </select>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

            <div class="col-lg-4 col-md-4 col-12">
                <div class="top-middle">
                    <ul class="useful-links">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="">About Us</a></li>
                        <li><a href="">Contact Us</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-12">
                <div class="top-end">
                    @if (Session::get('customer_id'))
                        <div class="user">
                            <i class="lni lni-user"></i>
                            Wellcome -  {{ Session::get('customer_name') }}
                        </div>
                        
                        <ul class="user-login">
                            <li>
                                <a href="{{ route('customer.dashbord') }}">Dashbord</a>
                            </li>

                            <li>
                                <a href="{{ route('customer.logout') }}">Logout</a>
                            </li>
                        </ul>
                    @else
                        <ul class="user-login">
                            <li>
                                <a href="{{ route('customer.login') }}">Sign In</a>
                            </li>
                            <li>
                                <a href="{{ route('customer.login') }}">Register</a>
                            </li>
                        </ul>
                    @endif
                </div>
            </div>
            </div>
        </div>
    </div>

    <div class="header-middle">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-3 col-7">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        {{-- <img src="{{ asset('frontend') }}/assets/images/logo/logo.svg" alt="Logo"> --}}
                        <h3 class="shop" style="color: #da4751cb">Online Shop</h3>
                    </a>
                </div>

                <div class="col-lg-5 col-md-7 d-xs-none">
                    <div class="main-menu-search">

                        <form action="{{ route('search-product') }}" method="GET">
                            <div class="navbar-search search-style-5">
                                <div class="search-select">
                                    <div class="select-position">
                                        <select id="select1">
                                            <option selected>All</option>
                                            @foreach ($categories as $category)
                                            {{-- dd($category); --}}
                                            <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="search-input">
                                    <input type="text" name="search" id="searchInput" value="" placeholder="Search">
                                    {{-- value="{{ Request::get('search') }}" --}}
                                </div>
                                <div class="search-btn">
                                    <button><i class="lni lni-search-alt"></i></button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            <div class="col-lg-4 col-md-2 col-5">
                <div class="middle-right-area">
                    <div class="nav-hotline">
                        <i class="lni lni-phone"></i>
                        <h3>Hotline:
                            <span>(+100) 123 456 7890</span>
                        </h3>
                    </div>

                    <div class="navbar-cart">
                        <div class="wishlist">
                            <a href="javascript:void(0)">
                                <i class="lni lni-heart"></i>
                                <span class="total-items">0</span>
                            </a>
                        </div>
                        <div class="cart-items">
                            <a href="javascript:void(0)" class="main-btn">
                                <i class="lni lni-cart"></i>
                                <span class="total-items">{{ count(ShoppingCart::all()) }}</span>
                            </a>

                        <div class="shopping-item">
                                <div class="dropdown-cart-header">
                                    <span>{{ count(ShoppingCart::all()) }} Items</span>
                                    <a href="{{ route('show-cart') }}">View Cart</a>
                                </div>
                                <ul class="shopping-list">
                                    @php($total = 0)
                                    @foreach (ShoppingCart::all() as $item)
                                        <li>
                                            <a href="" class="remove" title="Remove this item"><i class="lni lni-close"></i></a>

                                            <div class="cart-img-head">
                                                <a class="cart-img" href="product-details.html"><img src="{{ asset($item->image) }}" alt="#"></a>
                                            </div>
                                            <div class="content">
                                                <h4><a href="">{{ $item->name }}</a></h4>
                                                <p class="quantity">{{ $item->qty }} X <span class="amount">{{ sprintf('%d', $item->price) }}</span></p>
                                            </div>
                                        </li>
                                        @php($total = $total + sprintf('%d', $item->price * $item->qty))
                                    @endforeach

                                   
                                </ul>

                                <div class="bottom">
                                    <div class="total">
                                        <span>Total</span>
                                        <span class="total-amount">{{ $total }}</span>
                                    </div>
                                    <div class="button">
                                        <a href="{{ route('check-out') }}" class="btn animate">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-6 col-12">
                <div class="nav-inner">

                    <div class="mega-category-menu">
                        <span class="cat-button"><i class="lni lni-menu"></i>All Categories</span>
                        <ul class="sub-category">
                            {{-- @dump($ncategories->toArray()) --}}
                            @foreach ($categories as $category)
                                <li><a href="{{ route('product-category', $category->cat_slug) }}">{{ $category->cat_name  }}
                                    @if (count($category->subCategories) > 0)   
                                        <i class="lni lni-chevron-right"></i>
                                    @endif 
                                    </a>
                                    <ul class="inner-sub-category">
                                        @foreach ($category->subCategories as $subCategory)
                                        <li><a href="{{ route('product-sub-category', $subCategory->subCat_slug) }}">{{ $subCategory->subCat_name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </div>


                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ms-auto">
                                <li class="nav-item"><a href="{{ route('home') }}" class="active" aria-label="Toggle navigation">Home</a></li>
                                <li class="nav-item"><a href="{{ route('product-shop') }}">Shop</a></li>
                                {{-- <li class="nav-item"><a href="">Single Product</a></li> --}}
                                <li class="nav-item"><a href="{{ route('show-cart') }}">Cart</a></li>
                                <li class="nav-item"><a href="{{ route('contact') }}" aria-label="Toggle navigation">Contact Us</a></li>
                            </ul>
                        </div> 
                    </nav>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-12">
                <div class="nav-social">
                    <h5 class="title">Follow Us:</h5>
                    <ul>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-instagram"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-skype"></i></a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    {{-- <div id="ajaxRes"></div> --}}

</header>


@push('js')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $(document).ready(function(e){
        // e.preventDefault();
        $('#searchInput').on("keyup", function(){
            var inputText = $(this).val();
            // console.log(inputText);

            $.ajax({
                url: "{{ url('/product-search') }}",
                method: "GET",
                data: { text: inputText },
                dataType: "JSON",
                success: function (res) {
                    console.log(res);

            let div = '';
            $("#shop").css("display", "none");
            $("#index_home").css("display", "none");
            $("#index_home1").css("display", "none");
            $("#index_home2").css("display", "none");
            $("#index_home3").css("display", "none");
            $("#index_home4").css("display", "none");
            $("#category").css("display", "none");
            $("#subCategory").css("display", "none");



            $('#ajaxRes').empty();

            if (res.length > 0) {
                div += '<section class="trending-product section">';
                div += '<div class="container">';
                div += '<div class="row">';

                $.each(res, function (key, value) {
                    div += '<div class="col-lg-3 col-md-6 col-12">';
                    div += '<div class="single-product">';
                    div += '<div class="product-image">';
                    div += '<img src="' + value.image + '" alt="#">';
                    div += '<div class="button">';
                    div += '<a href="/product-details/' + value.id + '" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>';
                    div += '</div>'; // button
                    div += '</div>'; // product-image

                    div += '<div class="product-info">';
                    div += '<span class="category">' + value?.cat?.cat_name + '</span>';
                    div += '<h4 class="title">';
                    div += '<a href="/product-details/' + value.id + '">' + value.name + '</a>';
                    div += '</h4>';

                    div += '<div class="price">';
                    // div += '<span>&#2547; ' + parseFloat(value.selling_price).toFixed(2) + '</span>';
                    div += `<span>&#2547; ${parseInt(value.selling_price)}</span>`;
                    div += '</div>'; // price
                    div += '</div>'; // product-info
                    div += '</div>'; // single-product
                    div += '</div>'; // col
                });

                div += '</div>'; // row
                div += '</div>'; // container
                div += '</section>';
            } else {
                div += '<p>No products found.</p>';
            }
            console.log(div);
            
            $('#ajaxRes').append(div);
            },
                error: function (err) {
                    console.error('Error:', err);
                    $('#ajaxRes').html('<p>An error occurred while fetching the products.</p>');
                }
            });

            
        });
    });

</script>
@endpush