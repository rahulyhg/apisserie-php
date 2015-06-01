<?php namespace App;

use App\Article;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{

    protected $table = 'sections';

    protected $fillable = ['name'];

    public function products ()
    {
        return $this->hasMany('App\Product');
    }

    public function scopeWhereSlug ( $query, $slug )
    {
        $request->where( 'slug', '=', $slug );
    }

}
