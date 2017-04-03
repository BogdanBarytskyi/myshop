<?php
namespace App\Http\Controllers;
use App\Http\Requests;
class CatalogController extends Controller{
    public function index(){

        return view('catalog');
    }
}
?>