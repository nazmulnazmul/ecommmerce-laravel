<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use ShoppingCart;

class OrderDetails extends Model
{
    use HasFactory;

    public static function newOrderDetails($orderId){

        foreach (ShoppingCart::all() as $item) {
            
            $orderDetails = new OrderDetails();
            $orderDetails->order_id = $orderId;
            $orderDetails->product_id = $item->id;
            $orderDetails->product_name = $item->name;
            $orderDetails->product_price = $item->price;
            $orderDetails->product_qty = $item->qty;
            $orderDetails->save();

            ShoppingCart::remove($item->__raw_id);

        }
    }

    // public static function deleteOrderDetail($id){
    //     $orderDetails = OrderDetails::where('order_id', $id)->get();

    //     foreach($orderDetails as $orderDetail){
    //         $orderDetail->delete();
    //     }
    // }
}
