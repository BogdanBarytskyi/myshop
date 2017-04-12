<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Category;
use App\Models\Product;
use Session;


class ProductController extends Controller{
    public function index(){
       $category = Category::all();
       $products = Product::where('active', '=',1)->paginate(16);

        return view('products',['products'=>$products, 'category'=>$category, 'active_category'=>false]);
    }

    public function category($id){
        $category = Category::all();
        $products = Product::where([['category_id','=',$id],['active', '=',1]])->paginate(16);


        return view('products',['products'=>$products, 'category'=>$category, 'active_category'=>$id]);
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

        $product = Product::where([
           ['active', '=', 1],
            ['slag', '=', $slug]
            ]
        )->first();
        $ar_pr =array();
//
//        if (Session::has('view_product'))
//        {
//            $view_product =  Session::get('view_product');
//
//            $ar_pr =  explode(',',$view_product);
//
//
//            if(in_array($product->id,$ar_pr)==false){
//                $ar_pr[] = $product->id;
//                $view_product_sesion = implode(",",$ar_pr);
//                Session::put('view_product', $view_product_sesion);
//
//                dd($ar_pr);
//            }
//
//        }else{
//           // Session::put('view_product', $product->id);
//            $view_product =  Session::get('view_product');
//
//
//            $ar_pr =  explode(',',$view_product);
//
//            if(in_array($product->id,$ar_pr)==false){
//                $ar_pr[] = $product->id;
//                $view_product_sesion = implode(",",$ar_pr);
//                Session::put('view_product', $view_product_sesion);
//
//                dd($ar_pr);
//            }
//        }


       return view('product',['product'=>$product]);
    }

}
?>

