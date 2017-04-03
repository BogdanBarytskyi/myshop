<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Product;

class ProductController extends Controller{
    public function index(){
       $products = Product::all();
       $products = Product::where('active', '=',0)->paginate(16);

        //dd($products);

       return view('products',['products'=>$products]);
    }

    public function add()
    {
        $product = new Product();
       $product->name = 'Ручка дверная  Appecs';
        $product->slag = 'Appecs';
        $product->price = 550;
        $product->description = 'apecs';
        $product->images = 'http://lorempixel.com/800/600/cats/';
        $product->sort = 3 ;
        $product->active =true ;
        $product->currency = "UAH";
        $product->category_id = 1;
        $product->save();
    }


    public function detail($slug){
         $products = Product::all();
        $product = Product::where([
           ['active', '=', 1],
            ['slag', '=', $slug]
            ]
        )->first();


       return view('product',['product'=>$product]);
    }

}
?>

