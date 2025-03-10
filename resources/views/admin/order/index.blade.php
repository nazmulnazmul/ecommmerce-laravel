@extends('admin.master')

@push('css')

@endpush
@section('main_content')
<div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> All Orders Information</div>
            <div class="card-body">
              <div class="table-responsive">
              <div id="default-datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="default-datatable_length"><label>Show <select name="default-datatable_length" aria-controls="default-datatable" class="form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="default-datatable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="default-datatable"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="default-datatable" class="table table-bordered dataTable" role="grid" aria-describedby="default-datatable_info">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="default-datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 139px;">#Sl.</th>
                        <th class="sorting" tabindex="0" aria-controls="default-datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 225px;">Order No</th>
                        <th class="sorting" tabindex="0" aria-controls="default-datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 225px;">Order Date</th>
                        <th class="sorting" tabindex="0" aria-controls="default-datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 101px;">Customer Info</th>
                        <th class="sorting" tabindex="0" aria-controls="default-datatable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 25px;">Total Order</th>
                        <th class="sorting" tabindex="0" aria-controls="default-datatable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 25px;">Order Status</th>
                        <th class="sorting" tabindex="0" aria-controls="default-datatable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 25px;">Payment Type</th>
                        <th class="sorting" tabindex="0" aria-controls="default-datatable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 25px;">Payment Status</th>
                        <th class="sorting" tabindex="0" aria-controls="default-datatable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 84px;">Action</th>
                    </tr>
                </thead>

                <tbody>   

                    @if ($allOrders->isNotEmpty())
                        @foreach ($allOrders as $key => $allOrder)
                            
                            <tr role="row" class="odd">
                                <td>{{ $key+1 }}</td>
                                <td class="sorting_1">{{ $allOrder->id }}</td>
                               
                                <td class="sorting_1">{{ $allOrder->order_date }}</td>
                                <td class="sorting_1">{{ $allOrder->customer->name.' '.'(' .$allOrder->customer->mobile .')' }}</td>
                                <td class="sorting_1">{{ $allOrder->order_total }}</td>
                                <td class="sorting_1">{{ $allOrder->order_status }}</td>
                                <td class="sorting_1">
                                    @if ($allOrder->payment_type == 1)
                                        <span class="badge text-primary">Cash On Delivary</span>
                                    @else
                                        <span class="badge text-success">Online</span>
                                    @endif
                                </td>
                                <td class="sorting_1">{{ $allOrder->payment_status }}</td>
                                <td class="sorting_1">
                                    <a href="{{ route('admin.order.view', $allOrder->id) }}" class="btn btn-success" title="View All Data"><i class="fa-solid fa-eye"></i></a>
                                    <a href="{{ route('admin.mail.mailInvoice', $allOrder->id) }}" class="btn btn-success" title="Send Mail"><i class="fa-solid fa-envelope"></i></a>
                                    <a href="{{ route('admin.order.edit', $allOrder->id) }}"  class="btn btn-primary" title="Edit"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <a href="{{ route('admin.order.invoice', $allOrder->id) }}" class="btn btn-info" title="Show Invoice"><i class="fa-solid fa-file-invoice"></i></a>
                                    <a href="{{ route('admin.order.print', $allOrder->id) }}" target="_blank" class="btn btn-warning" title="Print PDF"><i class="fa-solid fa-print"></i></a>
                                    <a href="{{ route('admin.order.delete', $allOrder->id) }}" onclick="return confirm('Are You Sure !!')"  class="btn btn-danger" title="Delete"><i class="fa fa-trash-o"></i></a>
                                </td> 
                            </tr>
                        @endforeach
                    @else
                    <tr>
                        <td colspan="8" class="text-center">Data not found.</td>
                      </tr>
                    @endif
                </tbody>
                
              
            </table>
        </div>
    </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection

@push('js')

@endpush