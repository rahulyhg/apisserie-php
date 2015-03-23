<?php namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Product;
use Redirect;

class ProductsController extends Controller {

  public function index ()
  {
    $products = Product::all()->sortBy('name');

    return view('products.index', compact('products'));
  }

  public function store ( CreateProductRequest $request )
  {
    Product::create($request->all());

    return Redirect::to('products');
  }

}
