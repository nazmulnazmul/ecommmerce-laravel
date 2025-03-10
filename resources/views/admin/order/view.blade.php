@extends('admin.master')

@section('main_content')

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
    
</div>

<div class="row">
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
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="text-center"> Order Product Information</h4>
			  <div class="table-responsive">
                <table class="table table-striped border">
                    <thead>
                        <tr>
                            <th>SL No</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($allOrder->orderDetails as $key => $order)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $order->product_name }}</td>
                                <td>&#2547; {{ $order->product_price }}</td>
                                <td>{{ $order->product_qty }}</td>
                                <td>&#2547; {{ $order->product_qty * $order->product_price }}</td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
             </div>
            </div>
          </div>
    </div>
</div>

      
@endsection



