<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Product;
use Illuminate\Http\Request;

use ShoppingCart;

class CartController extends Controller
{
    private $product;
    public function cart(){
        $cart_products = ShoppingCart::all();
        // return $cart_products;
        return view('frontend.cart.cart', compact('cart_products'));
    }

    public function addCart($id){
        $this->product = Product::find($id);
        // return $this->product;
        ShoppingCart::add($this->product->id, $this->product->name, $this->product->qty, $this->product->selling_price,
         ['image' => $this->product->image, 'catgory' =>$this->product->cat->cat_name, 'brand' =>$this->product->brand->brand_name]);
        return redirect()->route('show-cart')->with('message', 'Product add on Cart.');
    }

    public function removeCart($id){
        ShoppingCart::remove($id);
        return redirect()->route('show-cart')->with('message', 'Cart Product Deleted Successfully.');
    }

    public function cartUpdate(Request $request, $id){
        ShoppingCart::update($id, $request->qty);
        return redirect()->route('show-cart')->with('message', 'Cart Product Updated Successfully.');
    }


}
