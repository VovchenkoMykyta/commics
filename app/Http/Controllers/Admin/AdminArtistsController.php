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

    public function edit(Request $request, $artist)
    {
        $page['artist'] = Artists::where('id', '=', $artist)->first();
        return view("admin.pages.artists.edit", compact('page'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            "name" => "required",
            "id" => "required|exists:artists"
        ]);

        $artist = Artists::where('id', '=', $data['id'])->first();
        $artist->update(['name' => $data['name']]);

        return redirect()->route("artists");
    }

    public function save(Request $request)
    {
        $data = $request->validate([
            "name" => "required"
        ]);

        Artists::create($data);

        return redirect()->route('artists');
    }

    public function delete(Request $request, $artist)
    {
        $artist = Artists::where('id', '=', $artist)->first();
        if (!$artist){
            return redirect()->back();
        }

        $artist->delete();
        return redirect()->route("artists");
    }
}
