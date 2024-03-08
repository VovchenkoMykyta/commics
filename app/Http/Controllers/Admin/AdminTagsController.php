<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tags;
use Illuminate\Http\Request;

class AdminTagsController extends Controller
{
    public function index()
    {
        $page['tags'] = Tags::paginate(10);
        return view("admin.pages.tags.index", compact("page"));
    }

    public function create()
    {
        return view("admin.pages.tags.create");
    }

    public function save(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:tags'
        ]);

        Tags::create($data);

        return redirect()->route("tags");
    }

    public function edit(Request $request, $tag)
    {
        $page['tag'] = Tags::where('id', '=', $tag)->first();
        return view("admin.pages.tags.edit", compact("page"));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'id' => 'required'
        ]);

        $tag = Tags::where('id', '=', $data['id'])->first();

        if (!$tag){
            return redirect()->route("tags");
        }

        $tag->update(['name' => $data['name']]);
        return redirect()->route("tags");
    }

    public function delete(Request $request, $tag)
    {
        $tag = Tags::where('id', '=', $tag)->first();
        if (!$tag){
            return redirect()->route("tags");
        }

        $tag->delete();
        return redirect()->route("tags");
    }
}
