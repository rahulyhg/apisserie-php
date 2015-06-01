<?php namespace App\Http\Controllers;

use App\Section;
use Redirect;
use Request;

class SectionsController extends Controller
{

    public function index ()
    {
        $sections = Section::all()->sortBy('name')->get();

        return view('sections.index', compact('sections'));
    }

    public function store ()
    {
        $input = Request::all();

        Section::create($input);

        return Redirect::to('sections');
    }

}
