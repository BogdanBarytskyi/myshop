<?php
namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class AdminProductController extends Controller{

    public function index(){
        $product = Product::all();
        return view('admin.product.index',['product'=>$product]);

    }
    public function create()
    {
        $category_db = Category::all();
        $select=array();
        foreach($category_db as $options)
        {
            $select[$options->id]=$options->name;
        }

        return view('admin.product.create',['category'=>$select]);
    }




    public function store(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'name'  => 'required',
                'price' => 'required',

            ]);

            // process the login
            if ($validator->fails()) {
                return redirect('admin/product/create')
                    ->withErrors($validator)
                    ->withInput();
            } else {
                // store
                $product = new Product;

                $product->name= $request->input('name');
                $product->slag= str_slug($request->input('name'), '-');
                $product->price= $request->input('price');
                $product->description= $request->input('description');
                $product->images= $request->input('images');
                $product->sort= $request->input('sort');
                $product->active= $request->input('active');
                $product->currency= $request->input('currency');
                $product->category_id= $request->input('category_id');
                $product->save();
                return redirect('admin/product/create');

            }
        }


    public function edit($id, Request $request)
    {
        // get the nerd
        $product = Product::find($id);
        $category_db = Category::all();
        $select=array();
        foreach($category_db as $options)
        {
            $select[$options->id]=$options->name;
        }

        return view('admin.product.edit', ['product'=>$product, 'category'=>$select]);

    }


    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'required',
            'price' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/product/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput();
        }else{
            $product = Product::find($id);

            $product->name= $request->input('name');
            $product->slag= str_slug($request->input('name'), '-');
            $product->price= $request->input('price');
            $product->description= $request->input('description');
            $product->images= $request->input('images');
            $product->sort= $request->input('sort');
            $product->active= ($request->input('active')=='on')? true : false;
            $product->currency= $request->input('currency');
            $product->category_id= $request->input('category_id');
            $product->save();
            return redirect('/admin/product/');

        }
    }


    public function destroy($id)
    {
        $product=Product::find($id);
        $product->delete();
        return redirect('admin/product');
    }


}
?>