<?php
namespace App\Http\Controllers;
use App\Http\Requests;
class CartController extends Controller{
    public function index(){

        return view('cart');
    }
}
?>