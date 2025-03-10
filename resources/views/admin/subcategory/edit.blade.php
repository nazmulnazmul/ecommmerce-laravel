@extends('admin.master')

@section('main_content')
    <div class="row mt-3">
        <div class="col-md-6 offset-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-title text-success">Update SubCategory</div>
                    <hr>
                    <form action="{{ route('admin.subcategory.update', $sub_cat_info->id) }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="input-6">Category Name</label>
                            <select name="cat_id" id="" class="form-control">
                                <!-- <option value="">Select Category Name</option> -->
                               @foreach ($allCats as $allCat)
                                    <option value="{{$allCat->id}}" @if( $allCat->id == $sub_cat_info->cat_id) selected @endif>
                                        {{ $allCat->cat_name }}
                                    </option>
                               @endforeach
                            </select>
                        </div>

                        <div class="form-group mt-3">
                            <label for="input-6">Sub Category Name</label>
                            <input type="text" name="subCat_name" value="{{ $sub_cat_info->subCat_name }}" class="form-control form-control-rounded" id="input-6" placeholder="Sub Category Name">
                            @error('subCat_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="input-6">SubCategory Status</label>
                            <select name="subCat_status" id="" class="form-control">
                                <option value="1" @if ($sub_cat_info->subCat_status == 1)selected @endif>Active</option>
                                <option value="0" @if ($sub_cat_info->subCat_status == 0)selected @endif>InActive</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-success btn-round shadow-success px-5">Update Sub Category</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


