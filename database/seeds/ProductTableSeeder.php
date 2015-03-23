<?php

use App\Section;
use App\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ProductTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run ()
  {
    DB::table('products')->delete();
    DB::table('sections')->delete();

    $cat[1] = Section::create([ 'name' => 'Rayon 1' ]);
    $cat[2] = Section::create([ 'name' => 'Rayon 2' ]);
    $cat[3] = Section::create([ 'name' => 'Rayon 3' ]);

    Product::create(['name' => 'Petates', 'section_id' => $cat[1]->id ]);
    Product::create(['name' => 'Tomates', 'section_id' => $cat[1]->id ]);
    Product::create(['name' => 'Basilic', 'section_id' => $cat[2]->id ]);
    Product::create(['name' => 'Brie',    'section_id' => $cat[3]->id ]);
  }

}
