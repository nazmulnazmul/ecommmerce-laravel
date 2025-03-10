@extends('admin.master')

@push('css')
<link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/summernote/dist/summernote-bs4.css"/>
@endpush

@section('main_content')
    <div class="row mt-3">
        <div class="col-md-12">
        <div class="card">
           <div class="card-body">
           <div class="card-title text-success">Update Product</div>
           <hr>
            <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group mt-3">
                            <label for="product_name">Product Name</label>
                            <input type="text" name="name" value="{{ $product->name }}" class="form-control form-control-rounded" id="product_name" placeholder="Product Name">
                            @error('product_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
        
                        <div class="form-group mt-3">
                            <label for="product_short_des">Product Short Description</label>
                            <textarea name="product_short_des" id="product_short_des" class="form-control form-control">{!! $product->product_short_des !!}</textarea>
                            @error('product_short_des')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="product_long_des">Product Long Description</label>
                            <textarea name="product_long_des" id="product_long_des" rows="6" class="form-control form-control">{!! $product->product_long_des !!}</textarea>
                            @error('product_long_des')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
        
                        <div class="form-group mt-3">
                            <label for="product_image">Product Photo</label>
                            <input type="file" name="product_image" class="form-control form-control-rounded" onchange="previewImage(event)" id="product_image">
                            <img src="{{ asset($product->image) }}" class="mt-3 ml-2 img-thumbnail" id="image-preview" alt="Product Image" width="100px" height="90px">
                           
                        </div>

                        <div class="form-group ml-5 mt-3">
                            <label for="is_popular">Popular Product</label>
                            <input type="checkbox" value="1" name="is_popular" id="is_popular" @if ($product->is_popular == 1) checked @else unchecked @endif>

                            <label for="is_featured">Featured Product</label>
                            <input type="checkbox" value="1" name="is_featured" id="is_featured" @if ($product->is_featured == 1) checked @else unchecked @endif>
                            
                            <label for="is_new">New Product</label>
                            <input type="checkbox" value="1" name="is_new" id="is_new" @if ($product->is_new == 1) checked @else unchecked @endif>
                        </div>
        
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cat_id">Category Name</label>
                            <select name="cat_id" id="cat_id" class="form-control">
                                <option value="">Select Category Name</option>
                                @foreach ($all_categories as $category)
                                    <option value="{{ $category->id }}"
                                        @if ($category->id == $product->cat_id) selected @endif>{{ $category->cat_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div> 
        
                        <div class="form-group mt-3">
                            <label for="sub_cat_id">subCategory Name</label>
                            <select name="sub_cat_id" id="sub_cat_id" class="form-control">
                                <option value="">Select Category Name</option>
                                @foreach ($all_sub_category as $sub_category)
                                    <option value="{{ $sub_category->id }}"
                                    @if ($sub_category->id == $product->sub_cat_id) selected @endif>{{ $sub_category->subCat_name }}</option>
                                @endforeach
                            </select>
                        </div> 
        
                        <div class="form-group mt-3">
                            <label for="brand_id">Brand Name</label>
                            <select name="brand_id" id="brand_id" class="form-control">
                                <option value="">Select Category Name</option>
                                @foreach ($all_brand as $brand)
                                    <option value="{{ $brand->id }}"
                                    @if ($brand->id == $product->brand_id) selected @endif>{{ $brand->brand_name }}</option>
                                @endforeach
                            </select>
                        </div> 

                        <div class="form-group mt-3">
                            <label for="product_quantity">Product Quantity</label>
                            <input type="number" name="qty" class="form-control form-control-rounded" id="product_quantity" value="{{ $product->qty }}">
                            @error('product_quantity')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="product_code">Product Code</label>
                            <input type="text" name="product_code" class="form-control form-control-rounded" id="product_code" value="{{ $product->product_code }}">
                            @error('product_code')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="product_model">Product Model</label>
                            <input type="text" name="product_model" class="form-control form-control-rounded" id="product_model" value="{{ $product->product_model }}">
                            @error('product_model')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="regular_price">Product Regular Price</label>
                            <input type="number" name="regular_price" class="form-control form-control-rounded" id="regular_price" value="{{ $product->regular_price }}">
                            @error('regular_price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="selling_price">Product Selling Price</label>
                            <input type="number" name="selling_price" class="form-control form-control-rounded" id="selling_price" value="{{ $product->selling_price }}">
                            @error('selling_price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="product_status">Product Status</label>
                            <select name="product_status" id="product_status" class="form-control">
                                <option value="1"  @if ($product->product_status == 1)selected @endif>Active</option>
                                <option value="0" @if ($product->product_status == 0)selected @endif>InActive</option>
                            </select>
                        </div>

                    </div>
                    
                </div>   

                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-success btn-round shadow-success px-5">Update Product</button>
                </div>
                
          </form>
         </div>
         </div>
    </div>
        </div>
    <!-- </div> -->
@endsection

@push('js')
<script src="{{ asset('backend') }}/assets/plugins/summernote/dist/summernote-bs4.min.js"></script>
<script>
    $('#product_short_des').summernote({
             height: 100,
             tabsize: 2
     });
 
     $('#product_long_des').summernote({
             height: 130,
             tabsize: 2
     });
 
   </script>

<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('image-preview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
                preview.style.width = '100px';
                preview.style.height = '100px';
                preview.style.objectFit = 'cover';
                preview.style.border = '1px solid #ccc';
                preview.style.marginTop = '10px';
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#product_short_des').summernote({
            height:100,
        });
    });

    $(document).ready(function() {
        $('#product_long_des').summernote({
            height:200,
        });
    });
</script>
@endpush