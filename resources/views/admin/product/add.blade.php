@extends('admin.master')

@push('css')
<link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/summernote/dist/summernote-bs4.css"/>
@endpush


@section('main_content')
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title text-success">Add New Product</div>
                        <hr>
                        <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                               
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="name">Product Name</label>
                                        <input type="text" name="name" class="form-control form-control-rounded" id="product_name" placeholder="Product Name">
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="product_short_des">Product Short Description</label>
                                        <textarea type="text" name="product_short_des" id="product_short_des" class="form-control form-control"></textarea>
                                        @error('product_short_des')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="product_long_des">Product Long Description</label>
                                        <textarea name="product_long_des" rows="6" id="product_long_des" class="form-control form-control"></textarea>
                                        @error('product_long_des')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
        
                                    <div class="form-group" >
                                        <label for="product_image">Product Photo</label>
                                        <input type="file" name="image" class="form-control" id="product_image">
                                        @error('product_image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div><br>
        
                                    <div class="form-group">
                                        <label for="image_url">Product Images</label>
                                        <input type="file" name="image_url[]" id="image_url" class="form-control" multiple>
                                        @error('image_url')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <br>

                                    <div class="form-group ml-5">
                                        <label for="is_popular">Popular Product</label>
                                        <input type="checkbox" value="1" name="is_popular" id="is_popular">

                                        <label for="is_featured">Featured Product</label>
                                        <input type="checkbox" value="1" name="is_featured" id="is_featured">
                                        
                                        <label for="is_new">New Product</label>
                                        <input type="checkbox" value="1" name="is_new" id="is_new">
                                    </div>
        
                                </div>
                                

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="cat_id">Category Name</label>
                                        <select name="cat_id" id="cat_id" class="form-control">
                                            <option value="">----- Select Category Name -----</option>
                                                @foreach ($allCats_info as $cat_id)  
                                                    <option value="{{ $cat_id->id }}">{{ $cat_id->cat_name }}</option>
                                                @endforeach
                                        </select>
                                        @error('cat_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div> 

                                    <div class="form-group">
                                        <label for="sub_cat_id">SubCategory Name</label>
                                        <select name="sub_cat_id" id="sub_cat_id" class="form-control">
                                            <option value=""> ----- Select Sub Category Name ----- </option>
                                            {{-- @foreach ($allSubCats_info as $subCat_id)  
                                                <option value="{{ $subCat_id->id }}">{{ $subCat_id->subCat_name  }}</option>
                                            @endforeach --}}
                                        </select>
                                        @error('sub_cat_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="brand_id">Brand Name</label>
                                        <select name="brand_id" id="brand_id" class="form-control">
                                            <option value=""> ----- Select Brand Name ----- </option>
                                            @foreach ($allBrands as $allBrand)  
                                                <option value="{{ $allBrand->id }}">{{ $allBrand->brand_name   }}</option>
                                            @endforeach
                                        </select>
                                        @error('brand_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div> 

                                    <div class="form-group">
                                        <label for="product_quantity">Product Quantity</label>
                                        <input type="number" name="qty" class="form-control form-control-rounded" id="product_quantity" placeholder="Product Quantity">
                                        @error('product_quantity')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="product_code">Product Code</label>
                                        <input type="text" name="product_code" class="form-control form-control-rounded" id="product_code" placeholder="Product Code">
                                        @error('product_code')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="product_model">Product Model</label>
                                        <input type="text" name="product_model" class="form-control form-control-rounded" id="product_model" placeholder="Product Model">
                                        @error('product_model')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="regular_price">Product Regular Price</label>
                                        <input type="number" name="regular_price" class="form-control form-control-rounded" id="regular_price" placeholder="Product Regular Price">
                                        @error('regular_price')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="selling_price">Product Selling Price</label>
                                        <input type="number" name="selling_price" class="form-control form-control-rounded" id="selling_price" placeholder="Product Selling Price">
                                        @error('selling_price')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="product_status">Product Status</label>
                                        <select name="product_status" id="product_status" class="form-control">
                                            <option value="1">Active</option>
                                            <option value="0">InActive</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                            
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-success btn-round shadow-success px-5">Add Product</button>
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


{{-- <script>
    $('#summernoteEditor').summernote({
        height: 200,
        tabsize: 2
    });
</script> --}}



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function () {
        $("#cat_id").on("change", function () {
        let categoryId = $(this).val(); // Get the selected category ID

        // Make AJAX request
        $.ajax({
            url: "{{ url('/admin/category-by-subcategory') }}", // Backend route
            method: "GET",
            data: { id: categoryId }, // Send the selected category ID
            dataType: 'JSON', // Expect JSON response
            success: function (res) {
                if (res.success) {
                    // Clear existing options in the subcategory dropdown
                    let subCatDropdown = $("#sub_cat_id");
                    subCatDropdown.empty();

                    // Add default placeholder
                    subCatDropdown.append('<option value="" disabled selected>-- Select Sub Category --</option>');

                    // Populate the dropdown with subcategories
                    $.each(res.data, function (key, value) {
                        subCatDropdown.append(`<option value="${value.id}">${value.subCat_name}</option>`);
                    });
                } else {
                    console.error("Error: Unable to fetch subcategories");
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error: " + error);
                console.error("Response: ", xhr.responseText);
            }
        });
    });
});

</script>



@endpush