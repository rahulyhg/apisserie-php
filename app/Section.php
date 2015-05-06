<?php namespace App;

use App\Article;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{

    protected $table = 'sections';

    protected $fillable = ['name'];

    public function products ()
    {
        return $this->hasMany('Article');
    }

}
