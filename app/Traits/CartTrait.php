<?php
namespace App\Traits;
use Session;

trait CartTrait
{

    protected function CartId(){

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