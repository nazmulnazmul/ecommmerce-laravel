@extends('admin.master')

@section('main_content')
    <div class="row mt-3">
        <div class="col-md-6 offset-3">
        <div class="card">
           <div class="card-body">
           <div class="card-title text-success">Add Category</div>
           <hr>
            <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="input-6">Category Name</label>
                    <input type="text" name="cat_name" class="form-control form-control-rounded" id="input-6" placeholder="Category Name">
                    @error('cat_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="input-6">Category Photo</label>
                    <input type="file" name="cat_image" class="form-control form-control-rounded" id="input-6">
                    @error('cat_image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="input-6">Category Status</label>
                    <select name="cat_status" id="" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">InActive</option>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-success btn-round shadow-success px-5">Add Category</button>
                </div>
                
          </form>
         </div>
         </div>
    </div>
        </div>
    <!-- </div> -->
@endsection