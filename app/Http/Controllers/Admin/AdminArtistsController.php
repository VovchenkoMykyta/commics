<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artists;
use Illuminate\Http\Request;

class AdminArtistsController extends Controller
{
    public function index()
    {
        $page['artists'] = Artists::paginate(10);
        return view("admin.pages.artists.artists", compact('page'));
    }

    public function create()
    {
        return view("admin.pages.artists.create");
    }

    public function save(Request $request)
    {
        $data = $request->validate([
            "name" => "required"
        ]);

        Artists::create($data);

        return redirect()->route('artists');

    }
}
