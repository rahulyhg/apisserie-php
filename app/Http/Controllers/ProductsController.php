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
        $sections = Section::all()->sortBy('order');

        foreach ( $sections as $section )
        {
            $indexedSections[$section->id] = $section->name;
        }

        $groupedProducts = [];
        foreach ( $products as $product )
        {
            $letter = substr( $product->name, 0, 1 );
            if ( !isset($groupedProducts[$letter]) )
            {
                $groupedProducts[$letter] = [];
            }

            $groupedProducts[$letter][] = $product;
        }

        return view('products.index')
                ->with( 'products', $groupedProducts )
                ->with( 'sections', $indexedSections );
    }

    public function store ( CreateProductRequest $request )
    {
        $product = Product::create($request->all());

        return redirect('products')->with( 'notification', 'Product added : ' . $product->name );
    }

}
