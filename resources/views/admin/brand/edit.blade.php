@extends('admin.master')

@section('main_content')
    <div class="row mt-3">
        <div class="col-md-8 offset-2">
        <div class="card">
           <div class="card-body">
           <div class="card-title text-success">Update Brand</div>
           <hr>
            <form action="{{ route('admin.brand.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="input-6">Brand Name</label>
                    <input type="text" name="brand_name" value="{{ $brand->brand_name }}" class="form-control form-control-rounded" id="input-6" placeholder="Brand Name">
                    @error('brand_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="input-6">Brand Photo</label>
                    <input type="file" name="brand_image" onchange="previewImage(event)" class="form-control form-control-rounded" id="input-6">
                    <img src="{{ asset($brand->brand_image) }}" class="mt-3 ml-2 img-thumbnail" id="image-preview" alt="" width="100px" height="100px">
                    @error('brand_image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- <div class="form-group mt-3">
                    <label for="input-6">Top Brand Status</label>
                    <select name="top_brand" id="" class="form-control">
                        <option value="1" @if ($brand->brand_status == 1) selected @endif>Active</option>
                        <option value="0" @if ($brand->brand_status == 0) selected @endif>InActive</option>
                    </select>
                    @error('top_brand')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div> --}}
                

                <div class="form-group mt-3">
                    <label for="input-6">Brand Status</label>
                    <select name="brand_status" id="" class="form-control">
                        <option value="1" @if ($brand->brand_status == 1) selected @endif>Active</option>
                        <option value="0" @if ($brand->brand_status == 0) selected @endif>InActive</option>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-success btn-round shadow-success px-5">Update Brand</button>
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