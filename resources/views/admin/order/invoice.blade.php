@extends('admin.master')

@push('css')
<style>
    .invoice-box {
        /* max-width: 800px; */
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }

    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }

    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }

    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }

    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }

    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }

    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }

    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.item td {
        border-bottom: 1px solid #eee;
    }

    .invoice-box table tr.item.last td {
        border-bottom: none;
    }

    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }

    /* @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }

        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    } */

    /** RTL **/
    .invoice-box.rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }

    .invoice-box.rtl table {
        text-align: right;
    }

    .invoice-box.rtl table tr td:nth-child(2) {
        text-align: left;
    }
</style>
@endpush
@section('main_content')

<a href="{{ route('admin.mail.invoice', $order->id) }}" class="btn btn-info pull-right">Send Invoice vai Mail</a><br><br><br>

<div class="row">
    <div class="col-md-10 offset-1"><br>
        <div class="invoice-box">
            
            <table cellpadding="0" cellspacing="0">
                <tr class="top">
                    <td colspan="5">
                        <table>
                            <tr>
                                <td class="title">
                                    <img src="{{ asset('backend') }}/assets/images/2.png" style="width: 30%; max-width: 130px"/>
                                </td>

                                <td>
                                    Invoice #: {{ $order->id }}<br />
                                    Order Date: {{ $order->order_date }}<br />
                                    InvoiceDate: {{ date('Y-m-d') }}
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr class="information">
                    <td colspan="5">
                        <table>
                            <tr>
                                <td>
                                    <h5><u>Delivary Information</u></h5>
                                    
                                   Name : {{ $order->customer->name }}<br />
                                   Email : {{ $order->customer->email }}</br>
                                   Address : {{ $order->delevary_address ? : 'N/A' }}<br />
                                   Mobile : {{ $order->customer->mobile ? : 'N/A' }}
                                </td>

                                <td>
                                    <h5><u>Company Information</u></h5>
                                    
                                    ABC Ltd.<br />
                                    Mirpur, Dhaka<br />
                                    example@gmail.com
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr class="heading">
                    <td>Payment Method</td>

                    <td colspan="4">Check #</td>
                </tr>

                <tr class="details">
                    <td>{{ $order->payment_type == 1 ? 'Cash' : 'Online' }}</td>

                    <td colspan="5">{{ $order->order_total }}</td>
                </tr>

                <tr class="heading">
                    <td>Product Name</td>
                    <td style="text-align: center">Product Price</td>
                    <td style="text-align: center">Product Qty</td>

                    <td style="text-align: right">Total</td>
                </tr>

                @php($sum = 0)
                    @foreach ($order->orderDetails as $key => $orderDetail)
                    <tr class="item">
                        <td>{{ $orderDetail->product_name }}</td>
                        <td style="text-align: center">&#2547; {{ $orderDetail->product_price }}</td>
                        <td style="text-align: center">{{ $orderDetail->product_qty }}</td>
                        <td style="text-align: right">&#2547; {{ $orderDetail->product_price * $orderDetail->product_qty }}</td>
                    </tr>
                    @php($sum = $sum +($orderDetail->product_price * $orderDetail->product_qty))
                @endforeach
                
                <tr class="heading">
                    <td colspan="3">Order Sub Total </td>
                    <td>&#2547; {{ $sum }}</td>
                </tr>
                
                <tr class="item">
                    <td colspan="3">Tax Amount</td>
                    <td>&#2547; {{ $order->tax_total }}</td>
                </tr>

                <tr class="item">
                    <td colspan="3">Shipping Cost</td>
                    <td>&#2547; {{ $order->shipping_total }}</td>
                </tr>

                <tr class="heading">
                    <td colspan="3">Total Payable</td>
                    <td>&#2547; {{ $order->order_total }}</td>
                </tr>

                <tr>
                    <td>
                        <br>
                        <h5>Prepared By</h5>
                        <hr>
                    </td>
                    <td  colspan="2"></td>
                    <td>
                        <br>
                        <h5 style="text-align: right">Received By</h5>
                        <hr>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    
</div>
<a href="{{ route('admin.order.print', $order->id) }}" class="btn btn-info pull-right mt-2 mr-5">Print pdf</a>


@endsection


@push('js')
    
@endpush
