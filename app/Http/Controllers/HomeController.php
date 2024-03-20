<?php

namespace App\Http\Controllers;

use App\Models\Comics;
use App\Models\ComicsMedia;
use App\Models\Tags;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        if (session()->get('comics')){
            $page['comics'] = session()->get('comics');
            session()->forget('comics');
        }else{
            $page['comics'] = Comics::all();
        }

        $page['comics'] = self::getComicsMedia($page['comics']);

        $page['tags'] = Tags::all();
        return view('pages.home', compact('page'));
    }

    private function getComicsMedia($comics)
    {
        foreach ($comics as $comic){
            $media = ComicsMedia::where('comics_id', '=', $comic->id)->get();
            $comic->photos = $media;
        }

        return $comics;
    }
}
