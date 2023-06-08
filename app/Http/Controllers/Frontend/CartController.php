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

        public function AddMiniCart(){

            // Cart::destroy();
            $carts = Cart::content();
            $cartQty = Cart::count();
            $cartTotal = Cart::priceTotal();

            return response()->json(array(
                'carts' => $carts,
                'cartQty' => $cartQty,
                'cartTotal' => $cartTotal,

            ));
        } // end method


        /// remove mini cart
        public function RemoveMiniCart($rowId){
            Cart::remove($rowId);
            return response()->json(['success' => 'Product Remove from Cart']);

        } // end mehtod


        // add to wishlist mehtod

    public function AddToWishlist(Request $request, $product_id){

        if (Auth::check()) {

            $exists = Wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->first();

            if (!$exists) {
               Wishlist::insert([
                'user_id' => Auth::id(),
                'product_id' => $product_id,
                'created_at' => Carbon::now(),
            ]);
           return response()->json(['success' => 'Successfully Added On Your Wishlist']);

            }else{

                return response()->json(['error' => 'This Product has Already on Your Wishlist']);

            }

        }else{

            return response()->json(['error' => 'At First Login Your Account']);

        }

    } // end method

}
