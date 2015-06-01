<?php namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'products';

    protected $fillable = ['name','section_id'];


    public function scopeOfSection ( $query, $id )
    {
        return $query->where( 'section_id', '=', $id );
    }

    public function section ()
    {
        return $this->hasOne('App\Section');
    }

}
