<?php

namespace App\Http\Controllers;

use App\Models\Comics;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function index(Request $request, $tag)
    {
        $comics = Comics::whereJsonContains('tags', $tag)->get();
        session()->put('comics', $comics);
        return redirect()->route('home-page');
    }
}
