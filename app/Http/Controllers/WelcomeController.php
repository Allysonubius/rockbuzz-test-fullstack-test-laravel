<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function list()
    {
        $postsOn = \App\Post::all()->where('published', '=', 1);


        return view('welcome', ['postsOn' => $postsOn]);
    }
}
