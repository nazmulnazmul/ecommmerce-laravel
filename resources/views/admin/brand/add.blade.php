@extends('admin.master')

@section('main_content')
    <div class="row mt-3">
        <div class="col-md-8 offset-2">
        <div class="card">
           <div class="card-body">
           <div class="card-title text-success">Add Brand</div>
           <hr>
            <form action="{{ route('admin.brand.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group mt-3">
                    <label for="input-6">Brand Name</label>
                    <input type="text" name="brand_name" class="form-control form-control-rounded" id="input-6" placeholder="Brand Name">
                    @error('brand_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="input-6">Brand Photo</label>
                    <input type="file" name="brand_image" class="form-control form-control-rounded" id="input-6">
                    @error('brand_image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- <div class="form-group">
                    <label for="input-6">Top Brand Status</label>
                    <select name="top_brand" id="" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">InActive</option>
                    </select>
                    @error('top_brand')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div> --}}

                <div class="form-group mt-3">
                    <label for="input-6">Brand Status</label>
                    <select name="brand_status" id="" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">InActive</option>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-success btn-round shadow-success px-5">Add Brand</button>
                </div>
                
            </form>
         </div>
         </div>
    </div>
        </div>
    <!-- </div> -->
@endsection