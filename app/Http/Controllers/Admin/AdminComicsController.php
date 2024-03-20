<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artists;
use App\Models\Comics;
use App\Models\ComicsMedia;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
        $page['tags'] = Tags::all();
        return view("admin.pages.comics.create", compact("page"));
    }

    public function edit(Request $request, $comics)
    {
        $page['comics'] = Comics::where('id', '=', $comics)->first();
        $page['comicsMedia'] = ComicsMedia::where('comics_id', '=', $comics)->get();
        $page['artists'] = Artists::all();
        $page['tags'] = Tags::all();
        return view("admin.pages.comics.edit", compact("page"));
    }

    public function delete(Request $request, $comics)
    {
        $dbComics = Comics::where('id', '=', $comics)->first();
        $comicsMedia = ComicsMedia::where('comics_id', '=', $comics)->get();

        if(!$dbComics){
            return redirect()->route("comics");
        }
        $dbComics->delete();
        if (!count($comicsMedia)){
            return redirect()->route("comics");
        }
        foreach ($comicsMedia as $media){
            Storage::delete('public/'.$media->url);
            $media->delete();
        }
        return redirect()->route("comics");
    }

    public function save(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:comics',
            'artist' => 'required',
            'tags' => 'required',
            'files' => 'required'
        ]);

        $comics = Comics::create([
            'name' => $data['name'],
            "artist_id" => $data['artist'],
            "tags" => json_encode($data['tags']),
        ]);

        $comics->update([
            'media' => Hash::make($comics->name)
        ]);

        foreach ($data['files'] as $file){
            $filename = $file->store('comics/'.strtolower(str_replace(' ', '-', $comics->name)), 'public');
            ComicsMedia::create([
                'version_id' => Hash::make($comics->name),
                'url' => $filename,
                'comics_id' => $comics->id
            ]);
        }
        return redirect()->route("comics");
    }

    public function update(Request $request)
    {

    }
}
