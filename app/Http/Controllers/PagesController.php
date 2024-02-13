<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about(){
        dd('about page');
    }

    public function contact(){
        return view('pages.contact');
    }

    public function artists()
    {
        dd(123);
    }
}
