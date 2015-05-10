<?php namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Product;
use App\Section;
use Redirect;

class ProductsController extends Controller
{

    public function index ()
    {
        $products = $this->getGroupedProducts();
        $sections = $this->getIndexedSections();

        return view('products.index')
                ->with( 'products', $products )
                ->with( 'sections', $sections );
    }

    public function edit ()
    {
        $products = Product::all()->sortBy('name');
        $sections = $this->getIndexedSections();

        return view('products.edit')
                ->with( 'products', $products )
                ->with( 'sections', $sections );
    }

    public function store ( CreateProductRequest $request )
    {
        $product = Product::create($request->all());

        return redirect('products')->with( 'notification', 'Product added : ' . $product->name );
    }

    private function getGroupedProducts ()
    {
        $products = Product::all()->sortBy('name');

        foreach ( $products as $product )
        {
            $letter = strtoupper(substr( $product->name, 0, 1 ));
            if ( !isset($groupedProducts[$letter]) )
            {
                $groupedProducts[$letter] = [];
            }

            $groupedProducts[$letter][] = $product;
        }

        return $groupedProducts;
    }

    private function getIndexedSections ()
    {
        $sections = Section::all()->sortBy('order');

        foreach ( $sections as $section )
        {
            $indexedSections[$section->id] = $section->name;
        }

        return $indexedSections;
    }

}
