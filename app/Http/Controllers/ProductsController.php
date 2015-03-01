<?php namespace App\Http\Controllers;

use App\Product;

class ProductsController extends Controller {

  public function index()
  {
    $products = Product::all()->sortBy('name');

    return view('products.index', compact('products'));
  }

}
