<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;
use App\Models\Wishlist;
use Carbon\Carbon;

use App\Models\Coupon;
use Illuminate\Support\Facades\Session;

use App\Models\ShipDivision;


class CartController extends Controller
{
    public function AddToCart(Request $request, $id){

    //     if (Session::has('coupon')) {
    //       Session::forget('coupon');
    //    }

       $product = Product::findOrFail($id);

       if ($product->discount_price == NULL) {
           Cart::add([
               'id' => $id,
               'name' => $request->product_name,
               'qty' => $request->quantity,
               'price' => $product->selling_price,
               'weight' => 1,
               'options' => [
                   'image' => $product->product_thambnail,
                   'color' => $request->color,
                   'size' => $request->size,
               ],
           ]);

           return response()->json(['success' => 'Successfully Added on Your Cart']);

       }else{

           Cart::add([
               'id' => $id,
               'name' => $request->product_name,
               'qty' => $request->quantity,
               'price' => $product->discount_price,
               'weight' => 1,
               'options' => [
                   'image' => $product->product_thambnail,
                   'color' => $request->color,
                   'size' => $request->size,
               ],
           ]);
           return response()->json(['success' => 'Successfully Added on Your Cart']);
       }

   } // end mehtod
}
