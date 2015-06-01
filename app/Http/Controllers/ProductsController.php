<?php namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Product;
use App\Section;
use Redirect;
use Request;
use Validator;

/**
 * Products Controller.
 *
 */
class ProductsController extends Controller
{

    /**
     * Products listed alphabetically.
     *
     * @return View
     */
    public function index ()
    {
        $products = $this->getGroupedProducts(Product::all());
        $sections = Section::all()->sortBy('order');

        return view('products.index')
                ->with( 'products', $products )
                ->with( 'sections', $sections );
    }


    /**
     * Product list with sections filters.
     *
     * @param string $id
     * @return View
     */
    public function sections ( $slug = null )
    {
        $sections = Section::all()->sortBy('order');
        $section  = $sections->where( 'slug', $slug )->first();
        $products = $slug ? $section->products()->get() : Product::all();

        $products = $this->getGroupedProducts($products);

        return view('products.sections')
                ->with( 'products', $products )
                ->with( 'sections', $sections )
                ->with( 'slug', $slug );
    }


    /**
     * Edit products.
     *
     * @return View
     */
    public function edit ()
    {
        $products = Product::all()->sortBy('name');
        $sections = Section::all()->sortBy('order');

        return view('products.edit')
                ->with( 'products', $products )
                ->with( 'sections', $sections );
    }


    /**
     * Create a new Product.
     *
     * @param FormRequest $request
     * @return View
     */
    public function store ( CreateProductRequest $request )
    {
        $product = Product::create($request->all());

        return redirect('products')->with( 'notification', 'Product added : ' . $product->name );
    }


    /**
     * CRUD Update.
     *
     * @return View
     */
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


    /**
     * CRUD Delete.
     *
     * @return View
     */
    public function delete ( $id )
    {
        $product = Product::find($id);
        $name = $product->name;

        $product->delete();

        return redirect('products/edit')->with( 'notification', 'Product deleted : ' . $name );
    }


    /**
     * Groups products by first letter.
     *
     * @param string $id
     */
    private function getGroupedProducts ( $products )
    {
        $products->sortBy('name');

        foreach ( $products as $product )
        {
            $letter = strtoupper(substr( $product->name, 0, 1 ));
            if ( !isset($groupedProducts[$letter]) )
            {
                $groupedProducts[$letter] = [];
            }

            $groupedProducts[$letter][] = $product;
        }

        ksort($groupedProducts);

        return $groupedProducts;
    }

}
