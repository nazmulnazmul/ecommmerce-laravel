@extends('admin.master')

@push('css')
<link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/summernote/dist/summernote-bs4.css"/>
@endpush

@section('main_content')
    <div class="row mt-3">
        <div class="col-md-8 offset-2">
        <div class="card">
           <div class="card-body">
           <div class="card-title text-success">Update Slider</div>
           <hr>
            <form action="{{ route('admin.slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="input-6">Slider Tittle Name</label>
                    <textarea name="title" class="summernoteEditor form-control form-control-rounded" id="input-6">{!! $slider->title !!}</textarea>

                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="input-6">Slider Srot Description</label>
                    {{-- <input type="text" name="sort_desc" class="description form-control form-control-rounded" id="input-6" value="{{ $slider->sort_desc }}"> --}}
                    <textarea name="sort_desc" class="description form-control form-control-rounded" id="input-6">{!! $slider->sort_desc !!}</textarea>

                    @error('sort_desc')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="input-6">Slider Photo</label>
                    <input type="file" name="photo" class="form-control form-control-rounded" onchange="previewImage(event)" id="input-6">
                    <img src="{{ asset($slider->photo) }}" id="image-preview" class="img-thumbnail mt-3" alt="" width="100px" height="100px">
                    @error('photo')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="input-6">Slider Url</label>
                    <input type="text" name="url" class="form-control form-control-rounded" value="{{ $slider->url }}" id="input-6">
                    @error('url')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="input-6">Slider Status</label>
                    <select name="slider_status" id="" class="form-control">
                        <option value="1" @if($slider->slider_status == 1)selected @endif >Active</option>
                        <option value="0"  @if($slider->slider_status == 0)selected @endif >InActive</option>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-success btn-round shadow-success px-5">Update Slider</button>
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


<script src="{{ asset('backend') }}/assets/plugins/summernote/dist/summernote-bs4.min.js"></script>
  <script>
   $('.summernoteEditor').summernote({
            height: 100,
            tabsize: 2
    });

    $('.description').summernote({
            height: 130,
            tabsize: 2
    });

  </script>


@endpush