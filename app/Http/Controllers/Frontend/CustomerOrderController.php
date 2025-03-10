<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Order;
use Illuminate\Http\Request;

use Session;


class CustomerOrderController extends Controller
{
    public function customerOrder(){

        $orders = Order::where('customer_id', Session::get('customer_id'))->get();
        // return $orders;
        return view('frontend.customer.order', compact('orders'));
    }
}
