<?php namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;

/**
 * Product model.
 *
 */
class Product extends Model
{

    protected $table = 'products';

    protected $fillable = [ 'name', 'slug', 'section_id' ];


    /**
     * One-to-Many relationship getter.
     *
     */
    public function section ()
    {
        return $this->hasOne('App\Section');
    }

}
