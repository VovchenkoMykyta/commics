<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminComicsController extends Controller
{
    public function index()
    {
        return view('admin.pages.comics.comics');
    }
}
