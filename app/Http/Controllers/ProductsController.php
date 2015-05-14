<?php namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Product;
use App\Section;
use Redirect;
use Request;
use Validator;

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



    public function update ()
    {
        $request = new CreateProductRequest();
        $rules = $request->rules();

        $product = Product::find(Request::input('id'));

        if ( $product->name === Request::input('name') )
        {
            if ( $product->section_id === Request::input('section_id') )
            {
                return redirect('products/edit');
            }

            $rules = array_except( $rules, 'name' );
        }

        $validator = Validator::make( Request::all(), $rules );

        if ($validator->fails())
        {
            return redirect('products/edit')
                    ->with( 'errors', $validator->messages() )
                    ->with( 'productId', Request::input('id') )
                    ->with( 'productName', Request::input('name') );
        }

        $affectedRows = $product->update(Request::only([ 'name', 'section_id' ]));

        if ( $affectedRows )
        {
            return redirect('products/edit')->with( 'notification', 'Product updated : ' . Request::input('name') );
        }
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
