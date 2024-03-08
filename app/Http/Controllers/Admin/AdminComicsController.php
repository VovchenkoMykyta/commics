<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artists;
use App\Models\Comics;
use Illuminate\Http\Request;

class AdminComicsController extends Controller
{
    public function index()
    {
        $page['comics'] = Comics::paginate(10);
        return view('admin.pages.comics.comics', compact("page"));
    }

    public function create()
    {
        $page['artists'] = Artists::all();
        return view("admin.pages.comics.create", compact("page"));

    }

    public function edit(Request $request, $comics)
    {

    }

    public function delete(Request $request, $comics)
    {

    }

    public function save(Request $request)
    {

    }

    public function update(Request $request)
    {

    }
}
