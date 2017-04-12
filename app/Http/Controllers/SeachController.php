<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class SeachController extends Controller{
    public function index(Request $request){
            $search = $request->input('search');
            $products = Product::where([['name','like','%'.$search.'%'],['active', '=', 1]])
            ->orderBy('name')
            ->paginate(16);
            $category = Category::all();
        
        return view('seach',[
            'products'=>$products,
            'search'=>$search,
            'active_category'=>false,
            'category' =>$category
        ]);
    }
}
?>
