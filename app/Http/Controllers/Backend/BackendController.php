<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Frontend\Order;
use App\Models\Frontend\Customer;
use App\Http\Controllers\Controller;

class BackendController extends Controller
{
    //
    public function index(){
        $customers = Customer::count();
        $orderCount = Order::count();
        $penddingOrder = Order::where('payment_status','pendding')->count();
        $processinggOrder = Order::where('payment_status','Processing')->count();
        $CompleteOrder = Order::where('payment_status','Complete')->count();
        $cancelOrder = Order::where('payment_status','Cancel')->count();

        $totalOrderAmount = Order::sum('order_total');
        $totalTax = Order::sum('tax_total');
        $totalRevenue = $totalOrderAmount + $totalTax;

        $totalAmount = Order::where('payment_status', 'Complete')->sum('order_total');
        $totalAmountTax = Order::where('payment_status', 'Complete')->sum('tax_total');
        $totalOrderTaxAmount = $totalAmount + $totalAmountTax;
        // dd($totalOrderTaxAmount);

        return view('admin.dashboard', compact(
            'customers', 'orderCount','penddingOrder','processinggOrder','CompleteOrder', 
            'cancelOrder','totalOrderAmount','totalTax','totalRevenue', 'totalAmount','totalAmountTax','totalOrderTaxAmount')
        );
    }




    // public function pendingOrder(){
    //     // dd('OK');

    //     $penddingOrder = Order::where('pendding')->count();
    //     return view('admin.dashboard', compact('penddingOrder'));
    // }

    // public function completeOrder(){
    //     // dd('OK');

    //     $completeOrder = Order::where('Complete')->count();
    //     return view('admin.dashboard', compact('completeOrder'));
    // }

    // public function processingOrder(){
    //     // dd('OK');

    //     $processingOrder = Order::where('Processing')->count();
    //     return view('admin.dashboard', compact('processingOrder'));
    // }

    // public function CancelOrder(){
    //     // dd('OK');

    //     $cancelOrder = Order::where('Cancel')->count();
    //     return view('admin.dashboard', compact('cancelOrder'));
    // }

    


}
