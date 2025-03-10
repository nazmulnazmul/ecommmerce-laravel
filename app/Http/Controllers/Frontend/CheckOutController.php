<?php

namespace App\Http\Controllers\Frontend;

use Session;
use ShoppingCart;
use Illuminate\Http\Request;
use App\Models\Frontend\Order;
use App\Models\Frontend\Customer;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Frontend\OrderDetails;

class CheckOutController extends Controller
{
    public function checkOut(){

        if(Session::get('customer_id')){
            $customer = Customer::find(Session::get('customer_id'));
        }else{
            $customer = '';
        }
        return view('frontend.checkOut.check-out', compact('customer'));
    }
    
    private function orderCustomerValidation($request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:customers,email',
            'phone' => 'required|unique:customers,mobile',
            'delevary_address' => 'required',
        ]);

    }

    public function newCashOrder(Request $request){
        // return ShoppingCart::all();
        if(Session::get('customer_id')){

            $customer = Customer::find(Session::get('customer_id'));

        }else{

            $this->orderCustomerValidation($request);

            $customer = Customer::newCustomer($request);
            Session::put('customer_id', $customer->id);
            Session::put('customer_name', $customer->name);
        }
        

        $order = Order::newOrder($request, $customer->id);
        OrderDetails::newOrderDetails($order->id);
       
        return redirect()->route('complete-order')->with('message', 'Your Order Confirm Successfully. Please wait, we will contct with you soon.');
    }
    

    public function completeOrder(){
        return view('frontend.checkOut.complete-order');
    }

    
}
