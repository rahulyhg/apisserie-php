<?php namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Product;
use App\Section;
use Redirect;

class ProductsController extends Controller
{

    public function index ()
    {
        $products = Product::all()->sortBy('name');
        $sections = Section::all();

        $indexed_sections = [];

        foreach ( $sections as $section )
        {
            $indexed_sections[$section->id] = $section->name;
        }

        return view('products.index')->with( 'products', $products )->with( 'indexedSections', $indexed_sections );
    }

    public function store ( CreateProductRequest $request )
    {
        Product::create($request->all());

        return Redirect::to('products');
    }

}
