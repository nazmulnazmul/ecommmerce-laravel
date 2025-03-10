@extends('admin.master')

@push('css')
<style>
    .word-wrap {
        word-wrap: break-word; /* Break long words if needed */
        word-break: break-word; /* Ensure word breaks in narrow spaces */
        white-space: normal; /* Allow line breaks */
        white-space:unset !important;
        {
            p b{
                white-space:unset !important; 
            }
        }
    }
</style>
@endpush

@section('main_content')

<div class="row">
    <div class="col-lg-7">
        <div class="card">
		   <!-- <div class="card-header text-uppercase text-dark">Dark Header</div> -->
            <div class="card-body">
			  <div class="table-responsive">
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">#Sl.</th>
                      <th scope="col">Items</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th>Category Name</th>
                      <td>{{ $product->cat->cat_name }}</td>
                    </tr>

                    <tr>
                        <th>SubCategory Name</th>
                        <td>{{ $product->subCat->subCat_name }}</td>
                    </tr>
                    <tr>
                        <th>Brand Name</th>
                        <td>{{ $product->brand->brand_name }}</td>
                    </tr>
                    <tr>
                        <th>Product Name</th>
                        <td>{{ $product->name }}</td>
                    </tr>
                    <tr>
                        <th>product Quantity</th>
                        <td>{{ $product->qty }}</td>
                    </tr>
                    <tr>
                        <th>product Code</th>
                        <td>{{ $product->product_code }}</td>
                    </tr>
                    <tr>
                        <th>product Model</th>
                        <td>{{ $product->product_model }}</td>
                    </tr>
                    <tr>
                        <th>product Buying Price</th>
                        <td>{{ sprintf('%d', $product->regular_price) }} &#2547;</td>
                    </tr>
                    <tr>
                        <th>product Selling Price</th>
                        <td>{{ sprintf('%d', $product->selling_price) }} &#2547;</td>
                    </tr>

                    <tr>
                        <th class="word-wrap">Product Short Description</th>
                        <td class="word-wrap">{!! $product->product_short_des !!}</td>
                    </tr>
                    
                    <tr>
                        <th>Product Long Description</th>
                        <td>{!! $product->product_long_des !!}</td>
                    </tr>

                    <tr>
                        <th>New Arrival</th>
                        <td>
                            @if ($product->is_new == 1)
                                <span class="badge bg-success">Yes</span>
                            @else
                                <span class="badge bg-danger">No</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Featured Product</th>
                        <td>
                            @if ($product->is_featured == 1)
                                <span class="badge bg-success">Yes</span>
                            @else
                                <span class="badge bg-danger">No</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Pupolar</th>
                        <td>
                            @if ($product->is_popular == 1)
                                <span class="badge bg-success">Yes</span>
                            @else
                                <span class="badge bg-danger">No</span>
                            @endif
                        </td>
                    </tr>
                    
                    <tr>
                        <th>Product Photo</th>
                        <td>
                        <img src="{{asset($product->image)}}" class="img-thumbnail" alt="Product Image" width="120px" height="90px">  
                        </td>
                    </tr>

                    <tr>
                        <th>Product status</th>
                        <td>
                            @if ($product->product_status == 1)
                                <a href="{{ route('admin.product.active', $product->id) }}" class="btn btn-success waves-effect waves-light m-1">Active</a>
                            @else
                                <a href="{{ route('admin.product.inActive', $product->id) }}" class="btn btn-danger waves-effect waves-light m-1">Inactive</a>
                            @endif
                        </td>
                    </tr>
                  </tbody>
                </table>
             </div>
            </div>
          </div>
    </div>
    <div class="col-lg-5">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                            <section class="gallery min-vh-100">
                                <h5 class="text-center">Product Gallery Photos</h5><hr>
                                <div class="container-lg">
                                    <div class="row gy-4 row-cols-1 row-cols-sm-2 row-cols-md-3">
                                        @foreach ($gallery as $img)
                                            <div class="col">
                                                <img src="{{ asset($img->image_url) }}" class="mt-2 p-1 img-thumbnail" alt="" width="140px" height="100px"><br>
                                                <a href="{{ route('admin.gallery.delete', $img->id) }}" class="btn btn-danger mt-1"><i class="fa fa-trash-o"></i></a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <form action="{{ route('admin.gallery.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mt-4">
                                        <input type="file" name="image_url[]" multiple class="form-control form-control" id="input-6">
                                        <button class="btn btn-success mt-1 form-control">Update</button>
                                    </div>
                                </form>
                            </section>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
      

@endsection



