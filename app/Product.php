<?php namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

	protected $table = 'products';

  protected $fillable = ['name','section_id'];

  public function category ()
  {
    return $this->belongsTo('Category');
  }

}
