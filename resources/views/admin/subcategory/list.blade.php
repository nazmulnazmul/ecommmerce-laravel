@extends('admin.master')

@section('main_content')
<div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> Category List</div>
            <div class="card-body">
              <div class="table-responsive">
              <div id="default-datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="default-datatable_length"><label>Show <select name="default-datatable_length" aria-controls="default-datatable" class="form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="default-datatable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="default-datatable"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="default-datatable" class="table table-bordered dataTable" role="grid" aria-describedby="default-datatable_info">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="default-datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 139px;">#Sl.</th>
                        <th class="sorting" tabindex="0" aria-controls="default-datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 225px;">Category Name</th>
                        <th class="sorting" tabindex="0" aria-controls="default-datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 225px;">SubCategory Name</th>
                        <th class="sorting" tabindex="0" aria-controls="default-datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 101px;">SubCategory Slug</th>
                        <th class="sorting" tabindex="0" aria-controls="default-datatable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 25px;">Status</th>
                        <th class="sorting" tabindex="0" aria-controls="default-datatable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 84px;">Action</th>
                    </tr>
                </thead>

                <tbody>   

                    @foreach ($allSubCat as $key => $subCategory)
                        
                        <tr role="row" class="odd">
                            <td>{{ $key+1 }}</td>
                            <td class="sorting_1">{{ $subCategory->category->cat_name }}</td>
                            <td class="sorting_1">{{ $subCategory->subCat_name }}</td>
                            <td class="sorting_1">{{ $subCategory->subCat_slug }}</td>
                            <td class="sorting_1">
                                @if ($subCategory->subCat_status == 1)
                                    <a href="{{ route('admin.subcategory.active', $subCategory->id) }}" class="btn btn-success waves-effect waves-light m-1">Active</a>
                                @else
                                    <a href="{{ route('admin.subcategory.inActive', $subCategory->id) }}" class="btn btn-danger waves-effect waves-light m-1">Inactive</a>
                                @endif
                            </td>
                            <td class="sorting_1">
                                <a href="{{ route('admin.subcategory.edit', $subCategory->id) }}" class="btn btn-success waves-effect waves-light m-1"> <i class="fa-regular fa-pen-to-square"></i>
                                <a href="{{ route('admin.subcategory.delete', $subCategory->id) }}" onclick="return confirm('Are You Sure !!')"  class="btn btn-danger waves-effect waves-light m-1"> <i class="fa fa-trash-o"></i>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                
                <tfoot>
                    <tr><th rowspan="1" colspan="1">#Sl.</th><th rowspan="1" colspan="1">Category Name</th><th rowspan="1" colspan="1">SubCategory Name</th><th rowspan="1" colspan="1">SubCategory Slug</th><th rowspan="1" colspan="1">Status</th><th rowspan="1" colspan="1">Action</th></tr>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- <div class="row"><div class="col-sm-12 col-md-5">
        <div class="dataTables_info" id="default-datatable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="default-datatable_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="default-datatable_previous"><a href="#" aria-controls="default-datatable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="default-datatable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="default-datatable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="default-datatable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="default-datatable" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="default-datatable" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="default-datatable" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="default-datatable_next"><a href="#" aria-controls="default-datatable" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul>
    </div> -->
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection