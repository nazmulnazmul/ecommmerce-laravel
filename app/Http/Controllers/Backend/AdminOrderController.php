<?php

namespace App\Http\Controllers\Backend;

use PDF;
// use Dompdf\Dompdf;

use Illuminate\Http\Request;
use App\Models\Frontend\Order;

use App\Models\Frontend\Customer;
use App\Mail\InvoiceOrderMailable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Models\Frontend\OrderDetails;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allOrders = Order::orderBy('id', 'desc')->get();
        return view('admin.order.index', compact('allOrders'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }




    /**
     * Display the specified resource.
     */
    public function view(string $id)
    {
        $allOrder = Order::find($id);
        return view('admin.order.view', compact('allOrder'));
    }


    
    public function invoice(string $id)
    {
        $order = Order::find($id);
        return view('admin.order.invoice', compact('order'));
    }

    
    public function print(string $id)
    {
        $order = Order::find($id);
        $pdf = PDF::loadView('admin.order.print', compact('order'));
 
        return $pdf->stream($id.'order.pdf');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = Order::find($id);
        return view('admin.order.edit', compact('order'));
       
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id){

        $order = Order::find($id);

        if($request->order_status === 'Pendding'){
            $order->order_status = $request->order_status;
            $order->delevary_address = $request->order_status;
            $order->payment_status = $request->order_status;
            $order->save();
            return redirect()->route('admin.order.list')->with('message', 'Order Status Updated Successfully');

        }else if($request->order_status == 'Processing'){
            $order->order_status = $request->order_status;
            $order->delevary_address = $request->delevary_address;
            $order->delevary_status = $request->order_status;
            $order->payment_status = $request->order_status;
            $order->update();
            return redirect()->route('admin.order.list')->with('message', 'Order Status Updated Successfully');
            
        }else if($request->order_status == 'Complete'){
            $order->order_status = $request->order_status;
            $order->delevary_status = $request->order_status;
            $order->payment_status = $request->order_status;
            $order->save();
            return  redirect()->route('admin.order.list')->with('message', 'Order Status Updated Successfully');

        }else if($request->order_status == 'Cancel'){
            $order->order_status = $request->order_status;
            $order->delevary_status = $request->order_status;
            $order->payment_status = $request->order_status;
            $order->save();
            return redirect()->route('admin.order.list')->with('message', 'Order Status Updated Successfully');
        }

    }

    public function destroy(string $id){   
        // $order = Order::find($id);

        // if($order->order_status == "Cancel"){
        //     Order::deleteOrder($id);
        //     OrderDetails::deleteOrderDetail($id);
        //     return redirect()->route('admin.order.list')->with('message', 'Order Deleted Successfully');
        // }
        //     return redirect()->route('admin.order.list')->with('message', 'Sorry,,,Order Can not be Deleted.');

        // $order = Order::find($id);

        // if ($order && $order->order_status == "Cancel") {
        //     $order->delete(); // Delete the order instance
        //     OrderDetails::deleteOrderDetail($id); // Delete associated order details
        //     return redirect()->route('admin.order.list')->with('message', 'Order Deleted Successfully');
        // }
        

        // if ($order && $order->order_status == "Cancel") {
        //     Order::deleteOrderWithDetails($id);
        //     return redirect()->route('admin.order.list')->with('message', 'Order Deleted Successfully');
        // }
        
    }



    
    public function mailInvoice(string $id)
    {
    
        $order = Order::with('customer')->find($id);
        // dd($order, request()->all());
        try{
            Mail::to($order->customer->email)->send(new InvoiceOrderMailable($order));
            return redirect("admin/order/invoice/".$id)->with("message", "Invoice Mail has beensent to ".$order->customer->email);
        }
        catch(\Exception $e){
            return redirect("admin/order/invoice/".$id)->with("message", "Something went wrong !");
        }
        
    }

    public function sendmailInvoice($id){
    
        $order = Order::with('customer')->find($id);

        try{
            Mail::to($order->customer->email)->send(new InvoiceOrderMailable($order));
            return redirect("admin/order/list/")->with("message", "Invoice Mail has beensent to ".$order->customer->email);
        }
        catch(\Exception $e){
            return redirect("admin/order/list/")->with("message", "Something went wrong !");
        }
        
    }


    
    
}
