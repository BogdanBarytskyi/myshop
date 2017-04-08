<?php
namespace App\Http\Controllers;
use App\Http\Requests;
class OrderController extends Controller{
    public function index(){

        return view('order');
    }
}
?>