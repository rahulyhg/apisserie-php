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
    $products = Product::all();
    $sections = Section::all();

    $grouped_products = [];

    foreach ( $sections as $section )
    {
      $grouped_products[$section->id] = $products->where( 'section_id', $section->id );
    }

    return view('print')->withProducts($grouped_products)->withSections($sections);
  }

}
