<?php namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Product;
use App\Section;
use Redirect;
use DB;

class PagesController extends Controller
{

  public function toPrint ()
  {
    $products = Product::all()->sortBy('name');
    $sections = Section::all()->sortBy('order');

    $grouped_products = [];

    foreach ( $sections as $section )
    {
      $grouped_products[$section->id] = $products->where( 'section_id', $section->id );
    }

    return view('print')->with( 'products', $grouped_products )
                        ->with( 'sections', $sections );
  }

}
