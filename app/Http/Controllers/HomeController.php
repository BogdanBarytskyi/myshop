<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use App\Models\Category;
use App\Models\Product;
use Session;

class HomeController extends Controller{
    public function index(){
        $category = Category::all();
        $products = Product::where('active', '=',1)->paginate(16);

        return view('home',['products'=>$products, 'category'=>$category, 'active_category'=>false]);
    }
}
?>