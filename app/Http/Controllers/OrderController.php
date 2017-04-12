<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use App\Models\Order;
use Session;
use App\Models\Cart;
use App\Traits\CartTrait;


class OrderController extends Controller{

    use CartTrait;

    public function index(){
        $cart_user = Cart::where([
                ['cart_id', '=', self::CartId()],
                ['order_id', '=', 0]
            ]
        )->get();

        if(count($cart_user)==0){
            return redirect('/cart');
        }
        return view('order');
    }


    public function add(Request $request){

        $validator = Validator::make($request->all(), [
            'user_name'  => 'required',
            'user_phone' => 'required',
            'user_email' => 'required',
            'user_adres' => 'required',
            'dilivery' => 'required',
            'payment' => 'required',
        ]);


        if ($validator->fails()) {
            return redirect('/order/')
                ->withErrors($validator)
                ->withInput();
        }else{
            $Order = new Order();
            $Order->user_name = $request->input('user_name');
            $Order->user_phone = $request->input('user_phone');
            $Order->user_email = $request->input('user_email');
            $Order->user_adres = $request->input('user_adres');
            $Order->dilivery = $request->input('dilivery');
            $Order->payment = $request->input('payment');

            $Order->price = 0;
            $Order->user_id = 0;
            $Order->save();

            if($Order->id>0){


                $cart_user = Cart::where([
                        ['cart_id', '=', self::CartId()],
                        ['order_id', '=', 0]
                    ]
                )->get();
                $cart_price = 0;
                foreach ($cart_user as $item){
                    $cart_price +=($item->price * $item->quantity);

                    $Cart_id  = Cart::find($item->id);
                    $Cart_id->order_id = $Order->id;
                    $Cart_id->save();
                }

                $Order->price = $cart_price;
                $Order->save();
                return redirect('/confirmation/'.$Order->id);
            }

        }
    }
}
?>