<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
        $postsOn = \App\Post::all()->where('published', '=', 1);
        $postsOff = \App\Post::all()->where('published', '=', 0);


        return view('posts.index', ['postsOn' => $postsOn, 'postsOff' => $postsOff]);
    }


    public function create()
    {
        return view('posts.create');
    }


    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->author = $request->input('author');
        $post->published = $request->input('published');


        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'published' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('imagesPosts', $filename);
            $post->image = $filename;

        }
        else {

            $post->image = '';
        }

        $post->save();
        return redirect('posts');
    }

    public function edit($id)
    {
        $post = \App\Post::find($id);

        return view('posts.edit', ['post' => $post]);
    }

    public function update(Request $request, $id)
    {

        $post = \App\Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->author = $request->input('author');
        $post->published = $request->input('published');

        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'published' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('imagesPosts', $filename);
            $post->image = $filename;
        }

        $post->save();
        return redirect('posts');

    }

    public function delete($id)
    {
        $post = \App\Post::find($id);

        $post->delete();

        return redirect('posts');
    }
}
