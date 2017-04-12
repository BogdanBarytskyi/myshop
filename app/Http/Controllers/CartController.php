<?php
namespace App\Http\Controllers;
use App\Http\Request;
use App\Models\Cart;
use App\Models\Product;

use App\Traits\CartTrait;
use Session;

class CartController extends Controller{

    use CartTrait;

    public function index(){
        $total_price = 0;

        if (Session::has('cart'))
        {   $cart_id = self::CartId();
            $cart = Cart::where([
                    ['cart_id', '=', $cart_id],
                    ['order_id', '=', 0]
                ]
            )->get();


            foreach ($cart as $k=> $item){
                if($item->product_id>0) {
                    $cart[$k]['product'] = Product::find($item->product_id);
                }
                $total_price +=($item->price*$item->quantity);
            }

            //dd($cart);
        }
        return view('cart',['cart'=>$cart,'total_price'=>$total_price]);
    }


    public function cart_delate($cart_id){
        $cart = Cart::find($cart_id);
        $cart->delete();

        $cart_user = Cart::where([
                ['cart_id', '=', self::CartId()],
                ['order_id', '=', 0]
            ]
        )->get();

        $total_price =0;
        foreach ($cart_user as $k=> $item){
            $total_price +=($item->price*$item->quantity);
        }


        return response()->json([
            'cart' => $cart,
            'count'=> count($cart_user),
            'sum' =>$total_price
        ]);
    }
    public function update($cart_id, $quantity){
        $cart = Cart::find($cart_id);
        $cart->quantity = $quantity;
        $cart->save();

        $cart_user = Cart::where([
                ['cart_id', '=', self::CartId()],
                ['order_id', '=', 0]
            ]
        )->get();

        $total_price =0;
        foreach ($cart_user as $k=> $item){
            $total_price +=($item->price*$item->quantity);
        }


        return response()->json([
            'cart' => $cart,
            'count'=> count($cart_user),
            'sum' =>$total_price
        ]);
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

}
?>