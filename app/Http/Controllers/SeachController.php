<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use App\Models\Product;

class SeachController extends Controller{
    public function index(Request $request){
            $search = request->input('search');
            $products = Product::where([['name','like','%'.$search.'%'],['active', '=', 1]])
            ->orderBy('name')
            ->paginate(16);
        
        return view('seach');
    }
}
?>
