<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostDetailController extends Controller
{
    public function detail($id)
    {

        $post = \App\Post::find($id);

        return view('posts.postDetail', ['post' => $post]);

    }
}
