<?php namespace App\Http\Controllers;

use App\Product;
use Redirect;
use Request;

class ProductsController extends Controller {

  public function index ()
  {
    $products = Product::all()->sortBy('name');

    return view('products.index', compact('products'));
  }

  public function create ()
  {
    return view('products.create');
  }

  public function store ()
  {
    $input = Request::all();

    Product::create($input);

    return Redirect::to('products');
  }

}
