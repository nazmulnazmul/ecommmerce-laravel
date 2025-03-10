@extends('admin.master')

@section('main_content')
    <div class="row mt-3">
        <div class="col-md-6 offset-3">
        <div class="card">
           <div class="card-body">
           <div class="card-title text-success">Add SubCategory</div>
           <hr>
            <form action="{{ route('admin.subcategory.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="input-6">Category Name</label>
                    <select name="cat_id" id="" class="form-control">
                        <option value="">Select Category Name</option>
                        @foreach ($cat_info as $cat_id)  
                            <option value="{{ $cat_id->id }}">{{ $cat_id->cat_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mt-3">
                    <label for="input-6">Sub Category Name</label>
                    <input type="text" name="subCat_name" class="form-control form-control-rounded" id="input-6" placeholder="Sub Category Name">
                    @error('subCat_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="input-6">SubCategory Status</label>
                    <select name="subCat_status" id="" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">InActive</option>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-success btn-round shadow-success px-5">Add Sub Category</button>
                </div>
                
          </form>
         </div>
         </div>
    </div>
        </div>
    <!-- </div> -->
@endsection