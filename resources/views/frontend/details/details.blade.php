@extends('frontend.master')
@section('title')
    Product - Details
@endsection

@section('body_section')
<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Single Product</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="{{ route('home') }}"><i class="lni lni-home"></i> Home</a></li>
                    <li><a href="{{ route('product-shop') }}">Shop</a></li>
                    <li>Single Product</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<section class="item-details section">
    <div class="container">
        <div class="top-area">
            <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 col-12">
            <div class="product-images">
            <main id="gallery">
            <div class="main-img">
            <img src="{{ asset($product->image) }}" id="current" alt="#">
            </div>
            <div class="images">
                @foreach ($galleryes as $galley)
                    <img src="{{ asset($galley->image_url) }}" class="img" alt="#">
                @endforeach
            </div>
            </main>
            </div>
            </div>

                <div class="col-lg-6 col-md-12 col-12">
                    <div class="product-info">
                        <h2 class="title">{{ $product->name }}</h2>
                        <p class="category"><i class="lni lni-tag"></i>
                            Product Category:<a href="javascript:void(0)">{{$product->cat->cat_name}}</a>
                        </p>

                        <p class="category"><i class="lni lni-tag"></i>
                            Product Sub Category:<a href="javascript:void(0)">{{$product->subCat->subCat_name}}</a>
                        </p>

                        <p class="category"><i class="lni lni-tag"></i>
                            Product Brand:<a href="javascript:void(0)">{{$product->brand->brand_name}}</a>
                        </p>
                        <h3 class="price">&#2547; {{ sprintf('%d', $product->selling_price) }}<span>{{ sprintf('%d', $product->regular_price) }}</span></h3>
                        <p class="info-text"><b style="color: #000">Short Description:</b>{!! $product->product_short_des !!}</p>

                        <form action="{{ route('add-to-cart', $product->id) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group quantity">
                                        <label for="color">Quantity</label>
                                        <input type="number" name="quantity" id="color" min="1" class="form-control">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="bottom-content">
                                <div class="row align-items-end">
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="button cart-button">
                                            <button type="submit" class="btn" style="width: 100%;">Add to Cart</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="wish-button">
                                            <button type="submit" class="btn"><i class="lni lni-heart"></i> To Wishlist</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="product-details-info">
            <div class="single-block">
                <div class="row">
                    <div class="col-12">
                        <div class="info-body custom-responsive-margin">
                            <h4>Details</h4>
                            <p>{!! $product->product_long_des !!}</p>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="single-block">
                        <div class="reviews">
                            <h4 class="title">Related Product</h4>
                    
                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="single-product">
                                    <div class="product-image">
                                        <img src="" alt="#">
                                        <div class="button">
                                            <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <span class="category"> Category name</span>
                                        <h4 class="title">
                                        <a href="#">product name</a>
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
                                            <span>&#2547; </span>
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
</section>
    
    
    <div class="modal fade review-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Leave a Review</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
    <div class="row">
    <div class="col-sm-6">
    <div class="form-group">
    <label for="review-name">Your Name</label>
    <input class="form-control" type="text" id="review-name" required>
    </div>
    </div>
    <div class="col-sm-6">
    <div class="form-group">
    <label for="review-email">Your Email</label>
    <input class="form-control" type="email" id="review-email" required>
    </div>
    </div>
    </div>
    <div class="row">
    <div class="col-sm-6">
    <div class="form-group">
    <label for="review-subject">Subject</label>
    <input class="form-control" type="text" id="review-subject" required>
    </div>
    </div>
    <div class="col-sm-6">
    <div class="form-group">
    <label for="review-rating">Rating</label>
    <select class="form-control" id="review-rating">
    <option>5 Stars</option>
    <option>4 Stars</option>
    <option>3 Stars</option>
    <option>2 Stars</option>
    <option>1 Star</option>
    </select>
    </div>
    </div>
    </div>
    <div class="form-group">
    <label for="review-message">Review</label>
    <textarea class="form-control" id="review-message" rows="8" required></textarea>
    </div>
    </div>
    <div class="modal-footer button">
    <button type="button" class="btn">Submit Review</button>
    </div>
    </div>
    </div>
    </div>
</section>
@endsection