@extends('admin.master')

@section('main_content')
    <div class="row mt-3">
        <div class="col-md-6 offset-3">
        <div class="card">
           <div class="card-body">
           <div class="card-title text-success">Update Category</div>
           <hr>
            <form action="{{ route('admin.category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="input-6">Category Name</label>
                    <input type="text" name="cat_name" class="form-control form-control-rounded" value="{{ $category->cat_name }}" id="input-6" placeholder="Category Name">
                    <!-- @error('cat_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror -->
                </div>

                <div class="form-group mt-3">
                    <label for="input-6">Category Logo</label>
                    <input type="file" name="cat_image" onchange="previewImage(event)" class="form-control form-control-rounded" id="input-6" ><br>
                    <img src="{{ asset($category->cat_image) }}" id="image-preview" class="img-thumbnail" alt="" width="100px" height="100">
                </div>

                <div class="form-group mt-3">
                    <label for="input-6">Category Status</label>
                    <select name="cat_status" id="" class="form-control">
                        <option value="1" @if ($category->cat_status == 1)selected @endif>Active</option>
                        <option value="0" @if ($category->cat_status == 0)selected @endif>InActive</option>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-success btn-round shadow-success px-5">Update Category</button>
                </div>
                
          </form>
         </div>
         </div>
    </div>
        </div>
    <!-- </div> -->
@endsection

@push('js')

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

@endpush