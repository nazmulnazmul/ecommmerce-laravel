@extends('admin.master')

@section('main_content')
{{-- 
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="text-center"> Order Basic Information</h4>
			    <div class="table-responsive">
                    <table class="table table-striped border">
                        <tr role="row" class="odd">
                            <th>Order No</th>
                            <td>{{ $allOrder->id }}</td>
                        </tr>

                        <tr>
                            <th>Order Date</th>
                            <td>{{ $allOrder->order_date }}</td>
                        </tr>

                        <tr>
                            <th>Customer InFo.</th>
                            <td>{{ $allOrder->customer->name }}</td>
                        </tr>

                        <tr>
                            <th>Order Total</th>
                            <td>&#2547; {{ $allOrder->order_total }}</td>
                        </tr>

                        <tr>
                            <th>Order Status</th>
                            <td>{{ $allOrder->order_status }}</td>
                        </tr>

                        <tr>
                            <th>Tax Total</th>
                            <td>&#2547; {{ $allOrder->tax_total }}</td>
                        </tr>

                        <tr>
                            <th>Shipping Total</th>
                            <td>&#2547; {{ $allOrder->shipping_total }}</td>
                        </tr>

                        <tr>
                            <th>Delivery Address</th>
                            <td>{{ $allOrder->delevary_address }}</td>
                        </tr>

                        <tr>
                            <th>Delivery Status</th>
                            <td>{{ $allOrder->delevary_status }}</td>
                        </tr>

                        
                        <tr>
                            <th>Payment Type</th>
                            <td>{{ $allOrder->payment_type == 1 ? 'Cash On Delivary' : 'Online'}}</td>
                        </tr>

                        <tr>
                            <th>Payment Status</th>
                            <td>{{ $allOrder->payment_status }}</td>
                        </tr>

                        <tr>
                            <th>Currency</th>
                            <td>{{ $allOrder->currency }}</td>
                        </tr>

                        <tr>
                            <th>Transaction</th>
                            <td>{{ $allOrder->transaction_id }}</td>
                        </tr>
                    </table>
                </div>
            </div>
          </div>
    </div>
    
</div> --}}

{{-- <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="text-center"> Order Customer Information</h4>
			  <div class="table-responsive">
                <table class="table table-striped border">
                    <thead>
                        <tr>
                            <th>Customer Name</th>
                            <th>Customer Email</th>
                            <th>Customer Mobile</th>
                            <th>Customer Address</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>{{ $allOrder->customer->name }}</td>
                            <td>{{ $allOrder->customer->email }}</td>
                            <td>{{ $allOrder->customer->mobile }}</td>
                            <td>{{ $allOrder->customer->address ? : 'N/A' }}</td>
                        </tr>
                    </tbody>
                </table>
             </div>
            </div>
          </div>
    </div>
</div> --}}




<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="text-center pb-2"> Order Information</h4><hr>
			  <div class="table-responsive">
                <table class="table table-striped border">
                    {{-- <thead>
                        <tr>
                            <th>Order No</th>
                            <th>Order Date</th>
                            <th>Customer InFo.</th>
                            <th>Order Total</th>
                            <th>Order Status</th>
                            <th>Payment Status</th>
                        </tr>
                    </thead> --}}

                    {{-- <tbody>
                        <tr>
                            <td>nahid</td>
                            <td>nahid</td>
                            <td>nahid</td>
                            <td>nahid</td>
                            <td>nahid</td>
                            <td>nahid</td>
                        </tr>
                    </tbody> --}}

                   <div class="col-md-8 offset-2">
                    <h5 class="text-center" style="color:green">{{ session('message') }}</h5>
                    
                        <form action="{{ route('admin.order.update', $order->id) }}" method="POST">
                            @csrf

                            <div class="row mb-3">
                                <label for="" class="col-md-3">Customer Info</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" readonly value="{{ $order->customer->name.' '.'(' .$order->customer->mobile .')' }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-md-3">Order ID</label>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" readonly value="{{ $order->id }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-md-3">Order Total</label>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" readonly value="{{ $order->order_total }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-md-3">Order Status</label>
                                <div class="col-md-9">
                                    <select name="order_status" id=""  class="form-control">
                                        {{-- <option value="">Select Order Status</option> --}}
                                        <option value="Pendding" {{ $order->order_status == 'Pendding' ? 'selected' :'' }}>Pendding</option>
                                        <option value="Processing" {{ $order->order_status == 'Processing' ? 'selected' :'' }}>Processing</option>
                                        <option value="Complete" {{ $order->order_status == 'Complete' ? 'selected' :'' }}>Complete</option>
                                        <option value="Cancel" {{ $order->order_status == 'Cancel' ? 'selected' :'' }}>Cancel</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-md-3">Delivery Address</label>
                                <div class="col-md-9">
                                    <textarea name="delevary_address" class="form-control" id="" cols="" rows="4">{{ $order->delevary_address }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-md-3"></label>
                                <div class="col-md-9">
                                    <input type="submit" class="form-control btn btn-success"  value="Order Update">
                                </div>
                            </div>

                        </form>
                   </div>

                </table>
             </div>
            </div>
          </div>
    </div>
</div>
      
@endsection



