<?php

use App\Section;
use App\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ProductTableSeeder extends Seeder
{

    private $list =
    [
        'Fruits' =>
        [
            'Fraises',
            'Pommes',
            'Framboises',
            'Raisins rouges'
        ],

        'Légumes' =>
        [
            'Concombre',
            'Laitue',
            'Oignons verts',
            'Poivrons',
            'Tomates'
        ]
    ];




	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run ()
    {
        DB::table('products')->delete();
        DB::table('sections')->delete();

        foreach ( $this->list as $section => $products )
        {
            $cat = Section::create([ 'name' => $section ]);

            foreach ( $products as $product )
            {
                Product::create(['name' => $product, 'section_id' => $cat->id ]);
            }
        }
    }

}
