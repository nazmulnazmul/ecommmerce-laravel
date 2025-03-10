<?php

namespace App\Models\Frontend;

use App\Models\Backend\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Session;

class Order extends Model
{
    use HasFactory;

    public static function newOrder($request, $customerId) {

        $order = new Order();
        $order->customer_id = $customerId;
        $order->order_date = date('Y-m-d');
        $order->order_timestamp = strtotime(date('Y-m-d'));
        $order->order_total = Session::get('order_total');
        $order->tax_total = Session::get('tax_total');
        $order->shipping_total = Session::get('shipping_total');
        $order->delevary_address = $request->delevary_address;
        $order->payment_type = $request->payment_type;
        $order->save();
        return $order;
    }


    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function orderDetails(){
        return $this->hasMany(OrderDetails::class);
    }

    // public static function deleteOrder($id){
    //     $order = self::find($id);
    //     if ($order) {
    //         $order->delete();
    //     }
    // }

    // In the Order model
    // public static function deleteOrderWithDetails($id){
    //     $order = self::find($id);
    //     if ($order) {
    //         OrderDetails::deleteOrderDetail($id);
            
    //         $order->delete();
    //     }
    // }


}
