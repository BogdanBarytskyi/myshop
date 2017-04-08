<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Http\RedirectResponse;

use App\Http\Requests;
use App\Models\Category;
class CategoryController extends Controller
{
  public function index(){
      $category = Category::all();
      return view('admin.category.index',['category'=>$category]);

  }
  public function create(){
      return view('admin.category.create');
  }
  public function store(Request $request){
      $input = $request->all();
      $this->validate($request, [

              'name' => 'required']
      );
      $category=new Category();
      $category->name=$request->name;
      $category->save();
      return redirect('admin/category');

  }


  public function edit(){
      return view('admin.category.edit');
  }
  public function update(){
      return view('admin.category.update');
  }
  public function destory(){
      return view('admin.category.destory');
  }


}
