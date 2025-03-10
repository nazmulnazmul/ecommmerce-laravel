@extends('admin.master')

@push('css')
<link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/summernote/dist/summernote-bs4.css"/>
@endpush

@section('main_content')
    <div class="row mt-3">
        <div class="col-md-8 offset-2">
        <div class="card">
           <div class="card-body">
           <div class="card-title text-success">Add New Slider</div>
           <hr>
            <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="input-6">Slider Tittle </label>
                    {{-- <input type="text" name="title" class="summernoteEditor form-control form-control-rounded" id="input-6" placeholder="Slider Tittle Name"> --}}
                    <textarea type="text" name="title" class="summernoteEditor form-control form-control-rounded" id="input-6"></textarea>

                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="input-6">Slider Srot Description</label>
                    {{-- <input type="text" name="sort_desc" class="description title form-control form-control-rounded" id="input-6" placeholder="Slider Tittle Name"> --}}
                    <textarea type="text" name="sort_desc" class="description form-control form-control-rounded" id="input-6"></textarea>
                    @error('sort_desc')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="input-6">Slider Photo</label>
                    <input type="file" name="photo" class="form-control form-control-rounded" id="input-6">
                    @error('photo')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="input-6">Slider Url</label>
                    <input type="text" name="url" class="form-control form-control-rounded" id="input-6">
                    @error('url')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="input-6">Slider Status</label>
                    <select name="slider_status" id="" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">InActive</option>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-success btn-round shadow-success px-5">Add Slider</button>
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