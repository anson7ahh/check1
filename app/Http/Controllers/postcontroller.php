<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class postcontroller extends Controller
{
    public function index()
    {
        $title = 'a';
        $content = 'b';
        return view('home', compact('title', 'content'));
    }

    public function a(Request $request)
    {
        $request = $request->all();
        dd($request);
        return view('requset');
    }
}
