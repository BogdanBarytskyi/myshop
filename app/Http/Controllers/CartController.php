<?php
namespace App\Http\Controllers;
use App\Http\Request;
use App\Models\Cart;
use App\Models\Product;

use Session;

class CartController extends Controller{
    public function index(){
        $total_price = 0;

        if (Session::has('cart'))
        {   $cart_id = self::CartId();
            $cart = Cart::where([
                    ['cart_id', '=', $cart_id],
                    ['order_id', '=', 0]
                ]
            )->get();


            foreach ($cart as $item){
                $total_price +=($item->price*$item->quantity);
            }
        }
        return view('cart',['cart'=>$cart,'total_price'=>$total_price]);
    }

    public function addToCart($product_id, $quantity){

        $cart_id = self::CartId();

        $product = Product::find($product_id);

        $cart = Cart::where([
                ['product_id', '=',$product_id],
                ['cart_id', '=', $cart_id],
                ['order_id', '=', 0]
            ]
        )->first();

        if(!empty($cart)){

            $cart->quantity = ($cart->quantity + $quantity);
            $cart->save();
            return response()->json([
                'cart' => $cart
            ]);
        }else{
            $newcart = new Cart();
            $newcart->product_name = $product->name;
            $newcart->quantity = $quantity;
            $newcart->price  = $product->price;
            $newcart->discount_price= 0;
            $newcart->product_id = $product->id;
            $newcart->order_id = false;
            $newcart->cart_id = $cart_id;
            $newcart->save();
            return response()->json([
                'cart' => $newcart
            ]);
        }

    }

    public function CartId(){

        if (Session::has('cart'))
        {
            $cart_id =  Session::get('cart');
        }else{
            Session::put('cart', str_random(32));
            $cart_id =  Session::get('cart');
        }

        return $cart_id;
    }
}
?>