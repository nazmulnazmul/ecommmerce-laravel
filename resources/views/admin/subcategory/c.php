<div class="form-group">
    <label for="input-6">Category Name</label>
    <select name="cat_id" id="" class="form-control">
        <option value="">Select Category Name</option>
        @foreach ($sub_cat_info as $subCat_id)
            <option value="{{ $subCat_id->cat_id }}">{{ $subCat_id->cat_name }}<option>    
        @endforeach
    </select>
</div>



<!-- for subcategory -->
<div class="form-group">
    <label for="input-6">Category Name</label>
    <select name="cat_id" id="" class="form-control">
        <option value="">Select Category Name</option>
        @if(!empty($sub_cat_info) && is_array($sub_cat_info))
            @foreach ($sub_cat_info as $subCat)
                <option value="{{ $subCat->cat_id }}">{{ $subCat->cat_name }}</option>
            @endforeach
        @else
            <option value="">No Categories Name Available</option>
        @endif
    </select>
</div>


<div class="form-group">
    <label for="input-6">Category Name</label>
    <select name="cat_id" id="" class="form-control">
        <option value="">Select Category Name</option>
        @if(!empty($sub_cat_info) && is_array($sub_cat_info))
            @foreach ($sub_cat_info as $subCat)
                <option value="{{ $subCat->cat_id }}">{{ $subCat->cat_name }}</option>
            @endforeach
        @else
            <option value="">No Categories Name Available</option>
        @endif
    </select>
</div>